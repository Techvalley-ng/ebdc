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
       else if(errorcode==2203){
                
        		$(".login-header").html("Your Bills is due").css("background-color","#cc0000");
        		$('.login').shake();
        		
       }
       else if(errorcode==2202){
                
        		$(".login-header").html("Logout successful").css("background-color","#cc0000");
        		$('.login').shake();
        		
       }
       else if(errorcode==2204){
       	$(".login-header").html("ACCESS REVOKE PLEASE LOGIN AGAIN").css("background-color","#cc0000");
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
	}else if (code== 5556){
		$(".tem-tiltle").html("DUPLICATE ENTRY OF CURRENCY").css("background-color","#cc0000");
        $('.tem-tiltle').shake();
	}else if(code==8888){
		$(".tem-tiltle").html("THIS MARCH HAS ALREADY BEEN DONE").css("background-color","#cc0000");
        $('.tem-tiltle').shake();
	}else if (code==8881){
		$(".tem-tiltle").html("YOU HAVE SUCCESSFULLY ADDED A NEW CURRENCY MARCH ").css("background-color","#cc0000");
        $('.tem-tiltle').shake();
	}
	else if (code==8882){
		$(".tem-tiltle").html("ERROR WHILE ADDING NEW MARCH").css("background-color","#cc0000");
        $('.tem-tiltle').shake();
        
	}else if (code==7777){
		$("#amounterror").html("YOU HAVE SUCCESSFULLY CHECK-IN AN AMOUNT INTO THE SELECTED TRANSACTION").css("background-color","#cc0000");
        $('#amounterror').shake();
	}else if (code==7778){
		$("#amounterror").html("ERROR WHILE CHECKING-IN").css("background-color","#cc0000");
        $('#amounterror').shake();
	}else if (code==7779){
		$("#amounterror").html("ERROR WHILE CHECKING-OUT").css("background-color","#cc0000");
        $('#amounterror').shake();
	}else if (code==7710){
		$("#amounterror").html("ERROR CANT UPDATE THE DEPORT TABLE").css("background-color","#cc0000");
        $('#amounterror').shake();
	}else if (code==7711){
		$("#amounterror").html("YOU HAVE SUCCESSFULLY CHECK-OUT THE AMOUNT FOR THE SELECTED TRANSACTION").css("background-color","#cc0000");
        $('#amounterror').shake();
	}else if (code==7712){
		$("#amounterror").html("YOU HAVE SUCCESSFULLY CHECK-IN THE AMOUNT FOR THE SELECTED TRANSACTION").css("background-color","#cc0000");
        $('#amounterror').shake();
	}
	else if (code==9991){
		$(".tem-tiltle").html("YOU HAVE SUCCESSFULLY ADDED A NEW LOAN").css("background-color","#cc0000");
        $('.tem-tiltle').shake();
	}
	else if (code==9992){
		$(".tem-tiltle").html("ERROR WHILE ADDING NEW LOAN").css("background-color","#cc0000");
        $('.tem-tiltle').shake();
	}
	else if (code==9993){
		$(".tem-tiltle").html("YOU HAVE SUCCESSFULLY DELETE A LOAN").css("background-color","#cc0000");
        $('.tem-tiltle').shake();
	}
	else if (code==9994){
		$(".tem-tiltle").html("ERROR WHILE DELETING NEW LOAN").css("background-color","#cc0000");
        $('.tem-tiltle').shake();
	}
	
	
}

function resetstyle(wsalect,htmldata,bgcolor){
	setTimeout(function(){
    	$(wsalect).html(htmldata).css("background-color",bgcolor);
    }, 10000); 
}

function dateselector (){
	  $( function() {
    var dateFormat = "yy-mm-dd",
      from = $("#from")
        .datepicker({
          dateFormat: 'yy-mm-dd',
          changeMonth: true,
          numberOfMonths: 1
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        numberOfMonths: 1
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
}

function reminderofloan(){
	// setInterval(function(){
	// 	window.alert("WE WISH TO REMIND ON YOUR LOANS IF THEY HAVE NOT BEEN COLLECTED, IF YES PLEASE DELETE IT FROM THE LOAN LIST ");	
	// },10000);
	
}
reminderofloan();
