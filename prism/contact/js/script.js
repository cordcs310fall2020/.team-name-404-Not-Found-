// https://www.w3schools.com/js/js_validation.asp
function validateForm() {
    // return false;
    var isErrorFree = true;
    var fieldNames = ["firstName", "lastName", "email1", "email2", "phone", "country", "department", "feedbackType", "wayOfContact1", "wayOfContact2", "message", "receiveNotifications"];
    var fieldRequirements =[true, false, true, true, true, true, true, false, false, false, true, true];
   
    
    var fieldValues=new Array(fieldNames.length);

    for (var i = 0; i < fieldNames.length; i++) {
         fieldValues[i] = document.forms["form1"][fieldNames[i]].value;
        
        if (fieldRequirements[i] == true){
            if(fieldValues[i] == ""){

                document.getElementById(fieldNames[i]+"label").style.color = "purple";

                document.getElementById("spn" + fieldNames[i] + "Error").innerHTML = (fieldNames[i] + " is required");
                isErrorFree = false;
            }else{
                document.getElementById("spn" + fieldNames[i] + "Error").innerHTML = "";
                document.getElementById(fieldNames[i]+"label").style.color = "yellow";
                // document.getElementById(fieldNames[i]+"label").style.className = "error";

            }
        }

        var aa = document.forms["form1"]["email1"].value;
  		var bb = document.forms["form1"]["email2"].value;
  		
   		if (aa != bb) {
            document.getElementById("spnemail1Error").innerHTML = "Emails do not match";
            document.getElementById("spnemail2Error").innerHTML = "Emails do not match";
            isErrorFree = false;
        }
       
    }
    return isErrorFree;
}