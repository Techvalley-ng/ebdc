var ebdc = angular.module('Ebdcapp', ['ui.router']);

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
				url: '/maketransaction/:deport_id/:outgoing/:incoming/:codestatues',
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
				url: '/tabsreport/:deport_id',
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
		
		window.alert(response.data)
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
	$scope.deport_id =$stateParams.deport_id; 
	$scope.outgoing =$stateParams.outgoing; 
	$scope.incoming =$stateParams.incoming; 
	$scope.collecting = 0;
	$scope.rate = 0;
	askonsubmit("#maketransaction","Are You Sure You Want To Make This Transaction?")
	var code = $stateParams.codestatues;
	 codecheck(code);
	 
	
}]);

ebdc.controller('Tabsreport',["$scope","$stateParams","$http",function($scope,$stateParams,$http){
	var deposit_id=$stateParams.deport_id;
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
	  resetstyle(".tem-tiltle","Add New Currency ","#00004d");
	  
	  $http.get('/severside/dataquery/currency_list.php').then(function successCallback(response) {
		
		$scope.currency_list =response.data;
		$scope.$emit('UNLOAD');
		
		},function errorCallback(response) {
	    // called asynchronously if an error occurs
	    // or server returns response with an error status.
	    window.alert("Error Loading Currency Data for List");
	  }); 
	
}]);

ebdc.controller('Marchcurrency',["$scope","$http","$stateParams", function($scope,$http,$stateParams){
	$http.get('/severside/dataquery/currency_list.php').then(function successCallback(response) {
		
		$scope.currency_list =response.data;
		$scope.$emit('UNLOAD');
		
		},function errorCallback(response) {
	    // called asynchronously if an error occurs
	    // or server returns response with an error status.
	    window.alert("Error Loading Currency Data for List");
	  }); 
}]);	


