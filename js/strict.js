$(document).ready(function () {
	
		//disable text selection
	   $("body").css("-webkit-user-select","none");
       $("body").css("-moz-user-select","none");
       $("body").css("-ms-user-select","none");
       $("body").css("-o-user-select","none");
       $("body").css("user-select","none");

	   //$('body').disableSelection();
	   
	// Right Click disabled on Complete webpage webpage only
	$(document).on("contextmenu",function(e){
	 //alert('Right click disabled');
	 return false;
	 });

	// disable developer mode in chrome
	//Object.defineProperty(console, '_commandLineAPI', { get : function() { throw 'Nooo!' } })
	 
	//Disable full page
    $("body").on("contextmenu",function(e){
        return false;
    });
	
	 //Disable mouse right click
    $("body").on("contextmenu",function(e){
        return false;
    });
    
    //Disable part of page
    $("#response_here").on("contextmenu",function(e){
        return false;
    });
	
	 //Disable full page
    $('body').bind('cut copy paste', function (e) {
        e.preventDefault();
    });
    
    //Disable part of page
    $('#response_here').bind('cut copy paste', function (e) {
        e.preventDefault();
    });
	
	 //Disable div part of page
    $('div').bind('cut copy paste', function (e) {
        e.preventDefault();
    });
	
	//Disable cut copy paste
    $('body').bind('cut copy paste', function (e) {
        e.preventDefault();
    });
	
	 //Disable div part of page
    $('.container').bind('cut copy paste', function (e) {
        e.preventDefault();
    });
	

   
   
});