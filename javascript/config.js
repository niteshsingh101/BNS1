app.controller('Logoctrl', function($scope, $http){
$http.get("api/heading.php").then(function(response) {
/*$scope.headline='Dummy Heading Text';
$scope.slogan='Dummy Slogan text';*/
$scope.headings=response.data;
  });
});
