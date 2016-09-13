app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "pages/home.htm"
    })
    .when("/about", {
        templateUrl : "pages/about.htm"
    })
    .when("/green", {
        templateUrl : "green.htm"
    })
    .when("/blue", {
        templateUrl : "blue.htm"
    });
});