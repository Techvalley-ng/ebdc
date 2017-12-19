// JavaScript File
//............................... SETING UP ANGULAR JS ..................
var ebdc = angular.module('Ebdcapp', ['ui.router']);

ebdc.config(function($stateProvider, $urlRouterProvider){
    $urlRouterProvider.otherwise("/login");
    $stateProvider
 
			.state('login', {
				url: '/login',
				views: {
				     'ebdcview': {
				        controller: 'EbdcController', 
                       templateUrl:"/template/login.php"
                    }
                    
				}
				
			})
			.state('home', {
				url: '/home',
				views: {
				     'ebdcview': {
				       controller: 'EbdcController',     
                       templateUrl:"/template/controller.php"
                    }
                     
				} 
				
			})
			.state('maketransaction', {
				url: '/maketransaction',
				views: {
				     'ebdcview': {
				       controller: 'CreportController',     
                       templateUrl:"/template/maketransaction.php"
                    }
                     
				} 
				
			})
			.state('c_report', {
				url: '/creport',
				views: {
				     'ebdcview': {
				       controller: 'CreportController',     
                       templateUrl:"/template/c_report.php"
                    }
                     
				} 
				
			})
			.state('addcurrency', {
				url: '/addcurrency',
				views: {
				     'ebdcview': {
				       controller: 'CreportController',     
                       templateUrl:"/template/addcurrency.php"
                    }
                     
				} 
				
			})
			.state('matchcurrency', {
				url: '/matchcurrency',
				views: {
				     'ebdcview': {
				       controller: 'CreportController',     
                       templateUrl:"/template/matchcurrency.php"
                    }
                     
				} 
				
			})
			.state('transactionreport', {
				url: '/transactionreport',
				views: {
				     'ebdcview': {
				       controller: 'CreportController',     
                       templateUrl:"/template/transactionreport.php"
                    }
                     
				} 
				
			})
			.state('makedeport', {
				url: '/makedeport',
				views: {
				     'ebdcview': {
				       controller: 'CreportController',     
                       templateUrl:"/template/makedeport.php"
                    }
                     
				} 
				
			})
			.state('deportsreports', {
				url: '/deportsreports',
				views: {
				     'ebdcview': {
				       controller: 'CreportController',     
                       templateUrl:"/template/deportreport.php"
                    }
                     
				} 
				
			});
    
	    
});
ebdc.controller('EbdcController', function($scope){
	//............................................. login box ...................
	 $("#ebdc-login").submit(function( event ) {
        	var username = $("input[name='username']").val();
        	var password = $("input[name='password']").val();
        	// window.alert(username);
        	if(username == ""){
        		$('.login').shake();
        		$(".login-header").css("background-color","#cc0000");
        		$(".login-header").html("username error");
        		$("input[name='username']").focus();
        		event.preventDefault();
        	}
        	else if(password==""){
        		$('.login').shake();
        		$(".login-header").css("background-color","#cc0000");
        		$(".login-header").html("password error");
        		$("input[name='password']").focus();
        		event.preventDefault();	
        	}
        	else {
        		if((username=="Majiya") && (password="Majiya")){
        				
        		}
        		else{
        			$('.login').shake();
        			$(".login-header").html("data error");
        			event.preventDefault();	
        		}
        	}
        });
        
        
     //............................................. login box ................... 
    
     $(document).click(function(e){
		    var result = e.target.tagName.toLowerCase();
		    // var cureentlocation = window.location.href;
		    if(result=="i"){
		     $(".panel").addClass("panel-display");
		    
		    } else {
		         $(".panel").removeClass("panel-display")
		    }
	}); 
     
        
});

ebdc.controller('CreportController', function($scope){
	// window.alert("welcome to currency report center");
});




