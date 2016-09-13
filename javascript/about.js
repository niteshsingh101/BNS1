app.controller('Myctrl', function($scope, $http){
$http.get("api/about.php").then(function(response) {
/*$scope.headline='Dummy Heading Text';
$scope.slogan='Dummy Slogan text';*/
$scope.abtcontent=response.data;
  });
});
