//disable refresh button on browser
function disableF5(e) { if ((e.which || e.keyCode) == 116) e.preventDefault(); };
$(document).on("keydown", disableF5);

 //disable control + F5 and control + R
 document.onkeydown = function() {    
    switch (event.keyCode) { 
        case 116 : //F5 button
            event.returnValue = false;
//alert('refresh blocked');
            event.keyCode = 0;
            return false; 
        case 82 : //R button
            if (event.ctrlKey) {
//alert('refresh blocked');				
                event.returnValue = false; 
                event.keyCode = 0;  
                return false; 
            } 
			case 16 : //F11 button
            if (event.ctrlKey) {
//alert('refresh blocked');				
                event.returnValue = false; 
                event.keyCode = 0;  
                return false; 
            }
			case 12 : //F11 button
            if (event.ctrlKey) {
//alert('refresh blocked');				
                event.returnValue = false; 
                event.keyCode = 0;  
                return false; 
            }
			case 13 : //F11 button
            if (event.ctrlKey) {
//alert('refresh blocked');				
                event.returnValue = false; 
                event.keyCode = 0;  
                return false; 
            }
			case 15 : //F11 button
            if (event.ctrlKey) {
//alert('refresh blocked');				
                event.returnValue = false; 
                event.keyCode = 0;  
                return false; 
            }
			case 19 : //F11 button
            if (event.ctrlKey) {
//alert('refresh blocked');				
                event.returnValue = false; 
                event.keyCode = 0;  
                return false; 
            }
			case 21 : //F11 button
            if (event.ctrlKey) {
//alert('refresh blocked');				
                event.returnValue = false; 
                event.keyCode = 0;  
                return false; 
            }
    }
}

// disable refresh
window.onbeforeunload = function() {
		return;
}
window.onload = function() {
		//alert('Do not use refresh button during test');
		return;
}

//Disable f12 and developer console
$(document).keydown(function(event){
    if(event.keyCode==123){
    return false;
   }
else if(event.ctrlKey && event.shiftKey && event.keyCode==73){        
      return false;  //Prevent from ctrl+shift+i
   }
});