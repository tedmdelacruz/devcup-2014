app.controller('AppController', ['$scope', '$http',
    function ($scope, $http) {
        $scope.queryResult = false;
        $scope.errors = [];
        $scope.infos = [];
        $scope.user = {};
        $scope.repo = {};
        $scope.commits = [];

        // Callback hell
        $scope.getUser = function() {
            $scope.user = {};
            $scope.repos = [];
            $scope.infos = [];
            $scope.errors = [];
            $scope.infos.push("Fetching user...");

            $http.get('getUser/' + $scope.query)
                .success(function(data) {
                    $scope.user = data;
                    $scope.queryResult = true;
                    $scope.errors = [];
                    $scope.infos = [];
                    $scope.commits = [];
                    $scope.repos = [];
                    $scope.infos.push("Fetching user...");

                    $http.get('getRepos/' + $scope.query)
                        .success(function(data) {
                            $scope.errors = [];
                            $scope.infos = [];
                            $scope.repos = data;
                        })
                        .error(function(data) {
                            $scope.infos = [];
                            $scope.errors.push("Failed to retrieve user repositories");
                        });
                })
                .error(function(data) {
                    $scope.infos = [];
                    $scope.errors.push("Failed to retrieve user");
                });
        };


        function analyze(i) {
            $http.get('analyze/' + $scope.commits[i].date)
                .success(function(data) {
                    $scope.commits[i].results = data;
                })
                .error(function(data) {
                    $scope.errors.push("Error occured while analyzing commit. Please try again later");
                });
        }

        $scope.fetchCommits = function(repo) {
            $scope.repo = repo;
            $scope.infos.push("Fetching repository commits...");
            $http.get('fetchCommits/' + $scope.user.login + '/' + $scope.repo.name)
                .success(function(data) {
                    $scope.commits = data;
                    $scope.errors = [];
                    $scope.repos = [];
                    $scope.infos = [];
                    $scope.infos.push("Crunching data...");

                    if ($scope.commits.length < 1) {
                        return;
                    }

                    // I'm sorry
                    var i = 0;
                    for (i in $scope.commits) {
                        analyze(i);
                    }
                    $scope.infos = [];
                })
                .error(function(data) {
                    $scope.errors.push("Error occured while fetching commits. Please try again later");
                });
        };
    }
]);
