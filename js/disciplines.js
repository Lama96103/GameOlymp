$(window).on( "load", function(){
    $.ajax({url: "/php/loadDis.php"}).done(function( html ) {
        $("#publicDis").append(html);
    });
    $.ajax({url: "/php/loadPrivateDis.php"}).done(function( html ) {
        $("#privateDis").append(html);
    });
    sleep(100);
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
});

function AddDis(id){
    $.post("/php/applyDis.php",
        {
            disID: id            
    });
    sleep(10);
    DoReload();
}

function RemoveDis(id){
    $.post("/php/unapplyDis.php",
        {
            disID: id            
    });
    sleep(10);
    DoReload();
}

function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}

function DoReload(){
    location.reload();
}