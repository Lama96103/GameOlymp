$(window).on( "load", function(){
    SetBreaker();
    $.ajax({url: "/php/loadPrivateMatch.php"}).done(function( html ) {
        $("#privateMatch").append(html);
    });
});

window.onresize = function(event) {
    SetBreaker();
};

function SetBreaker(){
    var width = $(document).width();
    var breaker = document.getElementById("breaker");
    var breaker2 = document.getElementById("breaker2");
    
    if(width >= 750){
        breaker.classList.remove('w-100');
        breaker2.classList.remove('w-100');
    }else{
        breaker.classList.add('w-100');
        breaker2.classList.add('w-100');
    }
}