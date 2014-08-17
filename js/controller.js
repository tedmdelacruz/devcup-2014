app.controller('AppController', ['$scope', '$http',
    function ($scope, $http) {
        $scope.queryResult = false;

        $scope.getUser = function() {
            $http.get('getUser/' + $scope.query)
                .success(function(data) {
                    $scope.user = data;
                    $scope.queryResult = true;

                    $http.get('getRepos/' + $scope.query)
                        .success(function(data) {
                            $scope.repos = data;
                        })
                        .error(function(data) {
                            $scope.reposErrorMsg = "Failed to retrieve repositories";
                        });
                })
                .error(function(data) {
                    $scope.reposErrorMsg = "Failed to retrieve users";
                });
        };
    }
]);
