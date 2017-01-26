app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "pages/home.htm"
    })
    .when("/about", {
        templateUrl : "pages/about.htm"
    })
    .when("/contact", {
        templateUrl : "pages/contact.htm"
    })
    .when("/registration", {
        templateUrl : "pages/registration.htm"
    });
});