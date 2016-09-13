<?php include("include/header.php");?>
<body ng-app="Myapp">
<div id="art-main" >
    <div class="cleared reset-box"></div>
<div class="art-bar art-nav">
<div class="art-nav-outer">
<div class="art-nav-wrapper">
<div class="art-nav-inner">
	<ul class="art-hmenu">
		<li>
			<a href="#/" class="active">Home</a>
		</li>	
		<li>
			<a href="#about">About</a>
		</li>	
	</ul>
</div>
</div>
</div>
</div>
<div class="cleared reset-box"></div>
<div class="art-header">
        <div class="art-header-position">
            <div class="art-header-wrapper">
                <div class="cleared reset-box"></div>
                <div class="art-header-inner">
                <div class="art-logo" ng-controller="Logoctrl">
                                 <h1 class="art-logo-name"><a href="#">{{headline}}</a></h1>
                                                 <h2 class="art-logo-text">{{slogan}}</h2>
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

</body>
</html>
