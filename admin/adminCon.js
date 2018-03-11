$(window).on( "load", function(){
   $.ajax({url: "loadAdminDis.php"}).done(function( html ) {
        $("#startDisSelect").append(html);
        
   });
    
    $.ajax({url: "loadAdminDisRun.php"}).done(function( html ) {
        $("#nextRoundSelect").append(html);
        
   });
    
    
});