app.controller('UserController', function ($scope) {
  $scope.users = [
    {
        'name': 'Juan dela Cruz',
        'username': 'jdelacruz',
        'desc': 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam explicabo voluptas molestias eius dolores fuga, eveniet quisquam quo, ratione excepturi corporis quos pariatur hic id eligendi commodi obcaecati quidem itaque?'
    },
    {
        'name': 'Ted Mathew dela Cruz',
        'username': 'tedmdelacruz',
        'desc': 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam explicabo voluptas molestias eius dolores fuga, eveniet quisquam quo, ratione excepturi corporis quos pariatur hic id eligendi commodi obcaecati quidem itaque?'
    }
  ];
});

console.log('controller');
