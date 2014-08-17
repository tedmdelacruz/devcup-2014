app.controller('AppController', ['$scope', '$http',
    function ($scope, $http) {
        $scope.queryResult = false;
        $scope.errors = [];
        $scope.user = {};
        $scope.repo = {};
        $scope.data = [];
        $scope.results = [];

        // Callback hell
        $scope.getUser = function() {
            $scope.user = {};
            $scope.repos = [];

            $http.get('getUser/' + $scope.query)
                .success(function(data) {
                    $scope.user = data;
                    $scope.queryResult = true;
                    $scope.errors = [];

                    $http.get('getRepos/' + $scope.query)
                        .success(function(data) {
                            $scope.errors = [];
                            $scope.repos = data;
                        })
                        .error(function(data) {
                            $scope.errors.push("Failed to retrieve user repositories");
                        });
                })
                .error(function(data) {
                    $scope.errors.push("Failed to retrieve user");
                });
        };

        $scope.fetchCommitDates = function(repo) {
            $scope.repo = repo;
            $http.get('fetchCommitDates/' + $scope.user.login + '/' + $scope.repo.name)
                .success(function(data) {
                    $scope.commitDates = data;
                    $scope.errors = [];
                    $scope.repos = [];

                    if ($scope.commitDates.length > 0) {
                        return;
                    }

                    // I'm sorry
                    var i = 0;
                    for (i in $scope.commitDates) {
                        $http.get('analyze/' + $scope.commitDates[i])
                            .success(function(data) {
                                $scope.results.push(data);
                            })
                            .error(function(data) {
                                $scope.errors.push("Error occured while analyzing commit. Please try again later");
                            });
                    }
                })
                .error(function(data) {
                    $scope.errors.push("Error occured while fetching commits. Please try again later");
                });
        };
    }
]);
