<?php include("include/header.php");?>

<div class="art-header">
        <div class="art-header-position">
            <div class="art-header-wrapper">
                <div class="cleared reset-box"></div>
                <div class="art-header-inner" ng-controller="Logoctrl">
                <div class="art-logo" ng-repeat="conf in headings">
                                 <h1 class="art-logo-name"><a href="#">{{conf.title}}</a></h1>
                                                 <h2 class="art-logo-text">{{conf.content}}</h2>
                                </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="cleared reset-box"></div>
    <div ng-controller="Myctrl" ng-view></div>
    <div class="cleared"></div>
    
    <div class="cleared"></div>
</div>

<script>var app= angular.module('Myapp', ["ngRoute"]);</script>
<script src="javascript/config.js"></script>
<script src="javascript/about.js"></script>
<script src="javascript/route.js"></script>
<script src="javascript/controllers.js"></script>
<script src="javascript/registration.js"></script>
<script src="javascript/user-registration.js"></script>

</body>
</html>
