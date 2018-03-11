$(window).on( "load", function(){
    SetBreaker();
    $.ajax({url: "/php/index/loadPrivateMatch.php"}).done(function( html ) {
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

function editMatch(id){
    document.getElementById("homeLabelModal").innerHTML = 'YOU';
    document.getElementById("guestLabelModal").innerHTML = 'YOUR OPPONENT';
    document.getElementById("toEditModal").value = id;
    $('#editModal').modal('show');
}

function confirmMatch(id){
    $.post("/php/index/confirmMatch.php",
        {
            matchId: id            
    });
    sleep(100);
    location.reload();
}

function declineMatch(id){
    $.post("/php/index/declineMatch.php",
        {
            matchId: id            
    });
    sleep(100);
    location.reload();
}

function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}