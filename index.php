<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="stylesheet/css/ebdc.css">
<link rel="stylesheet" href="stylesheet/css/bootstrap.min.css">
<link rel="stylesheet" href="stylesheet/css/fam.css">
<link rel="stylesheet" href="stylesheet/css/jqueryui.min.css">
<title>EBDC</title>
</head>
<body ng-app="Ebdcapp">
    
<div ui-view="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <br><br><br><br><br><br><br><br>
                <img src="image/Preloader_3.gif" class="img-fluid img-thumbnail rounded mx-auto d-block"></img>
            </div>
        </div>
    </div>
</div>

<div ui-view="topbar"></div>
<div ui-view="pagedata"></div>


<script src="/js/jquery.js"></script>    
<script src="/js/popper.js"></script>
<script src="/js/angularjs/angular.js"></script> 
<script src="/js/angularjs/angularroute.js"></script>
<script src="/js/angularjs/angularuirouter.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery-ui.min.js"></script>
<script src="/js/shake.js"></script>
<script src="/js/jquery.validate.min.js"></script>
<script src="/js/angularjs/ebdc_angular.js"></script>
<script src="/js/angularjs/angular-sanitize.js"></script>
<script src="/js/ebdc.js"></script>
  
</body>
</html>
