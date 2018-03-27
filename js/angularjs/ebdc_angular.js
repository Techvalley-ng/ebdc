var ebdc = angular.module('Ebdcapp', ['ui.router','ngSanitize']);

//########################################################## ROUTES ###############
ebdc.config(function($stateProvider, $urlRouterProvider){
    $urlRouterProvider.otherwise("/login/");
    $stateProvider
			.state('login', {
				url: '/login/:errorcode',
				views: {
				     'login': {
				        controller: 'Loginprocess', 
                    	templateUrl:"/template/login.php"
                    }
                    
				}
				
			})
		.state('home', {
				url: '/home/:page',
				views: {
					'login': {
						template:"<div></div>"	
					},
				     'topbar': {
				       controller: 'Topbar', 
                       templateUrl:"/template/topbar.php"
                    },
                    'pagedata': {
				       controller: 'Tabs', 
                       templateUrl:"/template/controller.php"
                    }
                    
				}
				
			})
		.state('maketransaction', {
				url: '/maketransaction/:page/:deposit_id/:outgoing/:incoming/:codestatues',
				views: {
					'login': {
						template:"<div></div>"	
					},
					'topbar': {
				       controller: 'Topbar', 
                       templateUrl:"/template/topbar.php"
                    },
				     'pagedata': {
				       controller: 'Transaction',     
                       templateUrl:"/template/maketransaction.php"
                    }
                     
				} 
				
			})
		.state('tabsreport', {
				url: '/tabsreport/:deposit_id',
				views: {
					'login': {
						template:"<div></div>"	
					},
				     'topbar': {
				       controller: '', 
                       templateUrl:"/template/topbarreport.php"
                    },
                    'pagedata': {
				       controller: 'Tabsreport', 
                       templateUrl:"/template/tabsreport.php"
                    }
                    
				}
				
			})
	.state('newcurrency', {
				url: '/addcurrency/:page/:code',
				views: {
					'login': {
						template:"<div></div>"	
					},
				     'topbar': {
				       controller: 'Topbar', 
                       templateUrl:"/template/topbar.php"
                    },
                    'pagedata': {
				       controller: 'Newcurrency', 
                       templateUrl:"/template/addcurrency.php"
                    }
                    
				}
				
			})
	.state('marchcurrency', {
				url: '/matchcurrency/:page/:code',
				views: {
					'login': {
						template:"<div></div>"	
					},
				     'topbar': {
				       controller: 'Topbar', 
                       templateUrl:"/template/topbar.php"
                    },
                    'pagedata': {
				       controller: 'Marchcurrency', 
                       templateUrl:"/template/matchcurrency.php"
                    }
                    
				}
				
			})
	.state('makedeposit', {
				url: '/makedeposit/:page/:code',
				views: {
					'login': {
						template:"<div></div>"	
					},
				     'topbar': {
				       controller: 'Topbar', 
                       templateUrl:"/template/topbar.php"
                    },
                    'pagedata': {
				       controller: 'Makedeposit', 
                       templateUrl:"/template/makedeposit.php"
                    }
                    
				}
				
			})
	.state('TransactionReport', {
				url: '/generalreport/:page',
				views: {
					'login': {
						template:"<div></div>"	
					},
				     'topbar': {
				       controller: 'Topbar', 
                       templateUrl:"/template/topbar.php"
                    },
                    'pagedata': {
				       controller: 'TransactionReport', 
                       templateUrl:"/template/transactionreport.php"
                    }
                    
				}
				
			})
	.state('Loans', {
				url: '/loan/:page/:code',
				views: {
					'login': {
						template:"<div></div>"	
					},
				     'topbar': {
				       controller: 'Topbar', 
                       templateUrl:"/template/topbar.php"
                    },
                    'pagedata': {
				       controller: 'Loans', 
                       templateUrl:"/template/loan.php"
                    }
                    
				}
				
			});		
});

ebdc.controller('Loginprocess', function($scope,$stateParams){
	var errorcode = $stateParams.errorcode;
	login(errorcode);
});

ebdc.controller('Topbar',["$scope","$http","$stateParams", function($scope,$http,$stateParams){
	//getting uerdata
	$http.get('/severside/dataquery/userdata.php').then(function successCallback(response) {
		$scope.userinfo=response.data;
	},function errorCallback(response) {
	    // called asynchronously if an error occurs
	    // or server returns response with an error status.
	    window.alert(response);
	  });
	 //get page name
	 $scope.pagename=$stateParams.page;
	  
	 //function that allow the clicks
	 menuclick();
	 
}]);	


ebdc.controller('Tabs',["$scope","$http", function($scope,$http){
	$scope.$on('LOAD',function(){$scope.loading=true});
	$scope.$on('UNLOAD',function(){$scope.loading=false});
	
	$scope.$emit('LOAD');
	$http.get('/severside/dataquery/tabs.php').then(function successCallback(response) {
		$scope.tab=response.data;
		$scope.$emit('UNLOAD');
	},function errorCallback(response) {
	    // called asynchronously if an error occurs
	    // or server returns response with an error status.
	    window.alert(response);
	  });
	  
	  ////working with forms
	  //$scope.submitForm = function() {
	  //	window.alert("formsub");
	  //}
	
}]);
ebdc.controller('Transaction',["$scope","$stateParams",function($scope,$stateParams){
	$scope.deposit_id	= $stateParams.deposit_id;
	$scope.pagename 	= $stateParams.page;
	$scope.outgoing 	= $stateParams.outgoing; 
	$scope.incoming 	= $stateParams.incoming; 
	$scope.collecting = 0;
	$scope.rate = 0;
	// askonsubmit("#maketransaction","Are You Sure You Want To Make This Transaction?")
	var code = $stateParams.codestatues;
	codecheck(code); 
	
	
	jQuery.validator.addMethod("lettersonly", function(value, element) {
		return this.optional(element) || /^[a-z," "]+$/i.test(value);
	}, "Letters only please"); 
	$("#maketransaction").validate({
	  	debug: true,
	  	onclick: false,
	  	onkeyup: false,
		onfocusout: false,
		focusInvalid: false,
		focusCleanup: true,
	  	rules: {
	  		Customername: {
	  			required: true,
	  			lettersonly: true
	  			
	  		},
	  		Amount: {
	  			required: true,
	  			digits: true
	  		},
	  		rate: {
	  			required: true,
	  			number: true 
	  		}
	  	},
	  	showErrors: function(errorMap, errorList) {
	  		var keys = Object.keys(errorMap);
	  		if(keys==""){
	  			//val is good
	  		}else{
	  			
	  		$(".tem-tiltle").html("PLEASE CHECK YOUR DATA ENTRY ").css("background-color","#cc0000");
    		$('.tem-tiltle').shake();
    		resetstyle(".tem-tiltle","Enter Customer Information To Make Transaction: ","");
	  		}
	  	},
	  	submitHandler: function(form) {
	  		if(confirm("Are You Sure You Want To Make This Transaction?")){
	  			$(".tem-tiltle").html("PROCESSING FORM PLEASE WAIT").css("background-color","#00004d");
	  			$('.tem-tiltle').shake();
	  			form.submit();
	  		}else{
	  			form.preventDefault();
	  		}
	  	}
	  	
	  }); 	  
	 
	
}]);

ebdc.controller('Tabsreport',["$scope","$stateParams","$http",function($scope,$stateParams,$http){
	var deposit_id=$stateParams.deposit_id;
	$scope.$on('LOAD',function(){$scope.loading=true});
	$scope.$on('UNLOAD',function(){$scope.loading=false});
	$scope.$emit('LOAD');
	$http.get('/severside/dataquery/tabsreportcash.php?deposit_id='+deposit_id).then(function successCallback(response) {
		
		$scope.totalCash =response.data; 
	},function errorCallback(response) {
	    // called asynchronously if an error occurs
	    // or server returns response with an error status.
	    window.alert(response);
	  });
	  
	  $http.get('/severside/dataquery/tabsreporttransfar.php?deposit_id='+deposit_id).then(function successCallback(response) {
		
		$scope.totaltransfar =response.data;
	},function errorCallback(response) {
	    // called asynchronously if an error occurs
	    // or server returns response with an error status.
	    window.alert(response);
	  });
	  
	  $http.get('/severside/dataquery/tabsreport.php?deposit_id='+deposit_id).then(function successCallback(response) {
		$scope.tabsreport =response.data;
		$scope.$emit('UNLOAD');
	},function errorCallback(response) {
	    // called asynchronously if an error occurs
	    // or server returns response with an error status.
	    window.alert(response);
	  }); 
}]);
ebdc.controller('Newcurrency',["$scope","$http","$stateParams", function($scope,$http,$stateParams){
	$scope.$on('LOAD',function(){$scope.loading=true});
	$scope.$on('UNLOAD',function(){$scope.loading=false});
	$scope.$emit('LOAD');
	
	//geting the list of the json data
	var code =$stateParams.code;
	$http.get('/js/json/currency.json').then(function successCallback(response) {
		
		$scope.addcurrency =response.data; 
		
		},function errorCallback(response) {
	    // called asynchronously if an error occurs
	    // or server returns response with an error status.
	    window.alert("Error Loading Currency Data for List");
	  }); 
	  codecheck(code);
	  resetstyle(".tem-tiltle","Add New Currency ","");
	  
	  $http.get('/severside/dataquery/currency_list.php').then(function successCallback(response) {
		
		$scope.currency_list =response.data;
		$scope.$emit('UNLOAD');
		
		},function errorCallback(response) {
	    // called asynchronously if an error occurs
	    // or server returns response with an error status.
	    window.alert("Error Loading Currency Data for List");
	  }); 
	  
	  $("#addnewcurrecny").validate({
	  	debug: true,
	  	onclick: false,
	  	onkeyup: false,
		onfocusout: false,
		focusInvalid: false,
		focusCleanup: true,
	  	rules: {
	  		money: {
	  			required: true
	  		}
	  	},
	  	showErrors: function(errorMap, errorList) {
	  		var keys = Object.keys(errorMap);
	  		if(keys==""){
	  			//val is good
	  		}else{
	  		$(".tem-tiltle").html("YOU HAVE NOT SELECTED ANY CURRENCY").css("background-color","#cc0000");
    		$('.tem-tiltle').shake();
	  		}
	  	},
	  	submitHandler: function(form) {
	  		if(confirm("ARE YOU SURE YOU WANT TO ADD A NEW CURRENCY ")){
	  			$(".tem-tiltle").html("PROCESSING FORM PLEASE WAIT").css("background-color","#00004d");
	  			$('.tem-tiltle').shake();
	  			form.submit();
	  		}else{
	  			form.preventDefault();
	  		}
	  	}
	  }); 	  
	  
	
}]);

ebdc.controller('Marchcurrency',["$scope","$http","$stateParams", function($scope,$http,$stateParams){
	$scope.$on('LOAD',function(){$scope.loading=true});
	$scope.$on('UNLOAD',function(){$scope.loading=false});
	$scope.$emit('LOAD');
	$http.get('/severside/dataquery/currency_list.php').then(function successCallback(response) {
		$scope.currency_list =response.data;
		},function errorCallback(response) {
	    window.alert("Error Loading Currency Data for List");
	  }); 
	  $scope.change = function() {
	  };
	  
	  
	  $("#mdothis").validate({
	  	debug: true,
	  	onclick: false,
	  	onkeyup: false,
		onfocusout: false,
		focusInvalid: false,
		focusCleanup: true,
		rules: {
			outgoing:{
				required: true	
			},
			incoming:{
				required: true	
			}
		},
	  	showErrors: function(errorMap, errorList) {
	  		// this.defaultShowErrors();
	  		var keys = Object.keys(errorMap);
	  		if(keys==""){
	  			//val is good
	  			
	  		}else{
	  		$(".tem-tiltle").html("YOU HAVE NOT SELECTED ANY CURRENCY").css("background-color","#cc0000");
    		$('.tem-tiltle').shake();
	  		}
	  	},
	  	submitHandler: function(form) {
	  		if(confirm("ARE YOU SURE YOU WANT TO ADD A NEW CURRENCY ")){
	  			$(".tem-tiltle").html("PROCESSING FORM PLEASE WAIT").css("background-color","#00004d");
	  			$('.tem-tiltle').shake();
	  			form.submit();
	  		}else{
	  			form.preventDefault();
	  		}
	  	}
	  }); 
	  
	  //getting the list from the server
	  $http.get('/severside/dataquery/match_list.php').then(function successCallback(response) {
		$scope.match_list_database =response.data;
		$scope.$emit('UNLOAD');
		
		},function errorCallback(response) {
	    window.alert("Error Loading Currency Data for List");
	  }); 
	  
	  var code =$stateParams.code;
	  codecheck(code);
	  resetstyle(".tem-tiltle","Match Two Currency For Transaction","#00004d");
	  
	  
}]);	
ebdc.controller('Makedeposit',["$scope","$http","$stateParams", function($scope,$http,$stateParams){
	  var code =$stateParams.code;
	  codecheck(code);
	  resetstyle("#amounterror","Make deposits on Transaction","#00004d");
	//geting the march list for list menue
	$http.get('/severside/dataquery/match_list.php').then(function successCallback(response) {
		$scope.match_list_database =response.data;
		},function errorCallback(response) {
	    window.alert("Error Loading Currency Data for List");
	  });
	$http.get('/severside/dataquery/deposit_list.php').then(function successCallback(response) {
		$scope.deposit_list =response.data;
		},function errorCallback(response) {
	    window.alert("Error Loading Currency Data for List");
	  });  
	  
	  $scope.deposit_analysis='<div class="row"><div class="col"><h1>PLEASE SELECT TRANSACTION DEPOSIT FOR A CURRENCY IN THE LIST MENU TO MAKE DEPOSIT</hi></div></div>';
	  $scope.change = function() {
        var selectedItem_id = $scope.selectedItem;
        	if(selectedItem_id == ""){
        		//nothing has been selected
        		$scope.deposit_analysis='<div class="row"><div class="col"><h1>PLEASE SELECT TRANSACTION DEPOSIT FOR A CURRENCY IN THE LIST MENU TO MAKE DEPOSIT</hi></div></div>';
        	}else{
        		$scope.$on('LOAD',function(){$scope.loading=true});
				$scope.$on('UNLOAD',function(){$scope.loading=false});
				$scope.$emit('LOAD');
        		$scope.deposit_analysis='<div class="col-md-12" ng-show="loading"> <img src="image/Preloader_3.gif" class="img-fluid img-thumbnail rounded mx-auto d-block"></img> </div>';
        		$scope.curTemplate = "";
        		//an iteam have been selected
        		// $scope.deposit_analysis='<h1>HI</hi>';
        		$http.get('/severside/dataquery/deposit_analysis.php?martch_id='+selectedItem_id).then(function successCallback(response) {
					$scope.deposit_analysis_data =response.data;
					$scope.$emit('UNLOAD');
					$scope.curTemplate = "/template/template_data.html";
					$scope.deposit_analysis	='';
					
				},function errorCallback(response) {
				    // called asynchronously if an error occurs
				    // or server returns response with an error status.
				    window.alert(response);
				  }); 

        	}
      };
      
      //validaing the form
      $("#checkout").validate({
	  	debug: true,
	  	ignore: "not:hidden",
	  	rules: {
			currencydeposit_id:{
				required: true
				
				}
	  		},
	  	showErrors: function(errorMap, errorList) {
	  		// this.defaultShowErrors();
	  		var keys = Object.keys(errorMap);
	  		if(keys==""){
	  			//val is good
	  			
	  		}else{
	  		$("#amounterror").html("SORRY YOU CAN’T CHECK OUT THIS TRANSACTION").css("background-color","#cc0000");
    		$('#amounterror').shake();
	  		}
	  	},	
      	submitHandler: function(form) {
	  		if(confirm("ARE YOU SURE YOU WANT TO CHECK-OUT THIS TRANSACTION")){
	  			$("#amounterror").html("PROCESSING FORM PLEASE WAIT").css("background-color","#00004d");
	  			$('#amounterror').shake();
	  			form.submit();
	  		}else{
	  			form.preventDefault();
	  		}
      	}
      });
      
      $("#checkin").validate({
	  	debug: true,
	  	onclick: false,
	  	onkeyup: false,
		onfocusout: false,
		focusInvalid: false,
		focusCleanup: true,
		rules: {
			amount:{
				required: true,
				minlength: 2,
				number: true
			}
		},
		showErrors: function(errorMap, errorList) {
	  		// this.defaultShowErrors();
	  		var keys = Object.keys(errorMap);
	  		if(keys==""){
	  			//val is good
	  			
	  		}else{
	  		$("#amounterror").html("PLEAS ENTER A CORRECT AMOUNT VALUE").css("background-color","#cc0000");
    		$('#amounterror').shake();	
	  		}
	  	},
    	submitHandler: function(form) {
	  		if(confirm("ARE YOU SURE YOU WANT TO CHECK-IN THIS TRANSACTION")){
	  			$("#amounterror").html("PROCESSING FORM PLEASE WAIT").css("background-color","#00004d");
	  			$('#amounterror').shake();
	  			form.submit();
	  		}else{
	  			form.preventDefault();
	  		}
      	}
      });
      
	  
}]);

ebdc.controller('TransactionReport',["$scope","$http","$stateParams", function($scope,$http,$stateParams){
		
	dateselector ();
	$http.get('/severside/dataquery/match_list.php').then(function successCallback(response) {
		$scope.match_list_database =response.data;
		},function errorCallback(response) {
	    window.alert("Error Loading Currency Data for List");
	  });
	  
	  $scope.change = function() {
	  	$("#from").val("");
	  	$("#to").val("");
	  };
	  $("#generaterport").click(function(){
	  	var selectedItem_id = $scope.selectedItem;
	  	var datefrom		= $scope.from;
	  	var dateto			= $scope.to;
	  	if(datefrom==undefined || dateto==undefined){
	  		$(".tem-tiltle").html("YOU HAVE TO SELECT DATE").css("background-color","#cc0000");
	  		$('.tem-tiltle').shake();
	  		resetstyle(".tem-tiltle","Generate Transaction Report","#00004d");
	  	}else {
	  		
	  		if(confirm("ARE YOU SURE YOU WANT TO GENERATE REPORT FROM: "+ datefrom +" TO:"+dateto)){
		  		$scope.$on('LOAD',function(){$scope.loading=true});
				$scope.$on('UNLOAD',function(){$scope.loading=false});
				$scope.$emit('LOAD');
				
				$http.get('/severside/dataquery/TransactionReport.php?martch_id='+selectedItem_id+'&datefrom='+datefrom+'&dateto='+dateto).then(function successCallback(response) {
					$scope.transactionreportdata =response.data;
					$scope.$emit('UNLOAD');
				},function errorCallback(response) {
				    window.alert(response);
				  }); 
				
		  		//$scope.$emit('UNLOAD');
		  	}else{
		  		// window.alert("no");
		  	}	
	  	}
	  	
	 
	  });
	  
}]);	  
ebdc.controller('Loans',["$scope","$http","$stateParams", function($scope,$http,$stateParams){
	var code = $stateParams.code;
	codecheck(code);
	$("#loan").validate({
	  	debug: true,
	  	onclick: false,
	  	onkeyup: false,
		onfocusout: false,
		focusInvalid: false,
		focusCleanup: true,
		rules: {
			personname:{
				required: true
			},
			loaninfo:{
				required: true
			}
		},
		showErrors: function(errorMap, errorList) {
	  		// this.defaultShowErrors();
	  		var keys = Object.keys(errorMap);
	  		if(keys==""){
	  			//val is good
	  			
	  		}else{
	  		$(".tem-tiltle").html("PLEAS ENTER LOAN INFORMATION").css("background-color","#cc0000");
    		$('.tem-tiltle').shake();
    		resetstyle(".tem-tiltle","Add Your Loan List (Reminder)","#00004d");
	  		}
	  	},
    	submitHandler: function(form) {
	  		if(confirm("ARE YOU WANT TO ADD THIS NEW LAON")){
	  			$(".tem-tiltle").html("PROCESSING FORM PLEASE WAIT").css("background-color","#00004d");
	  			$('.tem-tiltle').shake();
	  			resetstyle(".tem-tiltle","Add Your Loan List (Reminder)","#00004d");
	  			form.submit();
	  		}else{
	  			form.preventDefault();
	  		}
      	}
	});
	
	$http.get('/severside/dataquery/loan_list.php').then(function successCallback(response) {
					$scope.loanlist =response.data;
					$scope.$emit('UNLOAD');
				},function errorCallback(response) {
				    window.alert(response);
				  }); 
	$scope.submit = function(event) {
		if(confirm("ARE YOU WANT TO DELETE LAON")){
	  			$(".tem-tiltle").html("PROCESSING FORM PLEASE WAIT").css("background-color","#00004d");
	  			$('.tem-tiltle').shake();
	  			resetstyle(".tem-tiltle","Add Your Loan List (Reminder)","#00004d");
	  		}else{
	  			event.preventDefault();
	  		}	
	};			  
				  
	// $("#let").submit(function(event) {
	// 	window.alert("hello");
	// 	if(confirm("ARE YOU WANT TO DELETE LAON")){
	//   			$(".tem-tiltle").html("PROCESSING FORM PLEASE WAIT").css("background-color","#00004d");
	//   			$('.tem-tiltle').shake();
	//   			resetstyle(".tem-tiltle","Add Your Loan List (Reminder)","#00004d");
	//   		}else{
	//   			event.preventDefault();
	//   		}	
	// });
	
	
}]);

