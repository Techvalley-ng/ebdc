function login (errorcode=0){
	//............................................. login box ...................
	// $.validator.addMethod("numberwithdass", function(value, element) {
	// 	  return this.optional(element) || value == value.match(/^[\d]*$/);
	// });
	$.validator.addMethod("center_vall", function(value, element) {
   
     return this.optional(element) || /^\d{4}-\d{4}-\d{4}$/.test(value);

    });
	
	$("#ebdclogin").validate({
		
		onkeyup: false,
		onfocusout: false,
		focusInvalid: false,
		focusCleanup: true,
		rules: {
			username: {
				required: true,
				minlength: 6
			},
			password: {
				required: true,
				minlength: 8
			},
			CenterNumber:{
				required: true,
				minlength: 12,
				center_vall: true
				
			}
		},
		showErrors: function(errorMap, errorList) {
			var  filederror = Object.keys(errorMap);
			var i = 0;
			var length_data = filederror.length;
			if(length_data>0){
				$(".login-header").html("Entry Error").css("background-color","#cc0000");
			}
			while (i <= length_data) {
				
				$("input[name='"+filederror[i]+"']").css("border-color","#cc0000");
				i++;
			}	
			// this.defaultShowErrors();
			
			// window.alert(length_data);
		
		}
	});
        
       //login fialed eror code is 4044
       if(errorcode==4044){
       			$('.login').shake();
        		$(".login-header").html("Login failed").css("background-color","#cc0000");
        		
       }
       else if(errorcode==2202){
                
        		$(".login-header").html("Logout successful").css("background-color","#cc0000");
        		$('.login').shake();
        		
        		
        		
       }
    setTimeout(function(){
    	$(".login-header").html("ebdc MIS").css("background-color","#28d");
    }, 10000);   
}


function menuclick (){
      $(document).click(function(e){
		    var result = e.target.tagName.toLowerCase();
		    var attrdata = $(result).attr('id');
		    // var cureentlocation = window.location.href;
		    if(attrdata=="menu"){
		     $(".panel").addClass("panel-display");
		    
		    } else {
		        $(".panel").removeClass("panel-display")
		        
		    }
	});
}



function askonsubmit(submitid,massage) {
	$(submitid).submit(function( event ) {
		if(confirm(massage)){
			
		}else{
			event.preventDefault();
		}
	});
	
}

function codecheck(code){
	if(code==""){
		//window.alert("new click");
	}
	else if(code==2172018){
		window.alert("transaction was successfull");
	}
	else if(code==2172020){
		window.alert("Transaction Error!!!!!");	
	}else if(code==2172021){
		window.alert("Transaction Error!!!!!: Account Is Balanced");	
	}else if(code==2172022){
		window.alert("Transaction Error!!!!!: Insufficient Money");	
	}else if(code==7342018){
		window.alert("Error 7342018");		
	}else if (code== 5555){
		$(".tem-tiltle").html("YOU HAVE SUCCESSFULLY ADD A NEW CURRENCY").css("background-color","#cc0000");
        $('.tem-tiltle').shake();
	}else if (code== 5557){
		$(".tem-tiltle").html("YOU HAVE AN ERROR WHILE ADDING A NEW CURRENCY").css("background-color","#cc0000");
        $('.tem-tiltle').shake();
	}
}

function resetstyle(wsalect,htmldata,bgcolor){
	setTimeout(function(){
    	$(wsalect).html(htmldata).css("background-color",bgcolor);
    }, 10000); 
}

