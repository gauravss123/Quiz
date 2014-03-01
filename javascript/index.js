//Hide error messages which are to be displayed
$(document).ready(function () {
			var i;
			for(i=1;i<=5;i++)
				{
				var k='#'+i;
				$(k).hide();}
    
			});
//function for validating user input
$("#fo").on("submit", validateFormOnSubmit);
function validateFormOnSubmit(event) {
	var reason = "";

   reason += validateEmpty(this.fname,1);
   reason += validateLength(this.contact,3);
     
  if (reason != "") {
    event.preventDefault();
  }
  //return true;
  }
//function to validate field is not empty  
function validateEmpty(fld,k) {
	var error="";
    var no = "#"+k;
    if (fld.value.length ==0) {
        fld.style.background = 'Yellow'; 
		var error ="Error";
		var w = (.35)*window.innerWidth;
		$("#43").width(w);
		$(no).show();
    }
	else {
        fld.style.background = 'White';
		$(no).hide();
	}
	return error;
}
//function to validate contact number is not less than 10 digits
function validateLength(fld,k) {
	var error="";
	var no = "#"+k;
    if (fld.value.length <10) {
        fld.style.background = 'Yellow'; 
		var error ="Error";
		var w = (.52)*window.innerWidth;
		$("#43").width(w);
		$(no).show();
    }
	else {
        fld.style.background = 'White';
		$(no).hide();
	}
    return error;  
}
//function to allow only numeric values to be entered in contact field	
   function IsNumeric(e) {
   var specialKeys = new Array();
        specialKeys.push(8); //Backspace
	specialKeys.push(9); //Tab
	specialKeys.push(35); // Home
        specialKeys.push(36); //End
        specialKeys.push(37); // Left Arrow
        specialKeys.push(39); //Right Arrow
        specialKeys.push(46); // Delete
	
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57)||specialKeys.indexOf(keyCode) != -1 );
           
            return ret;
        }
	function resize(){
	
	}