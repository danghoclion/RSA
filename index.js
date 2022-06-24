function showKey() {
    var http = new XMLHttpRequest();
    http.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            var myobj = JSON.parse(this.responseText);
            $('#soa').val(myobj[0]);
            $('#sob').val(myobj[1]);
            $('#son').val(myobj[2]);
            $('#son1').val(myobj[2]);
            console.log(myobj);
        }
    };
http.open("POST", "taokhoa.php", true);
http.send();
}

$(document).ready( function() {
    $("#mahoa").click(function(){
        var banro = $("#txtbanro").val();
        var sob = $("#sob").val();
        var son = $("#son").val();
        $.post("./mahoa.php",
        {
        txt: banro,
        keyb: sob,
        keyn: son
        },
        function(data){
            var response = JSON.parse(data);
            document.getElementById("txtbanma").value = response;
            console.log(response);
        });
});
});

$(document).ready( function() {
    $("#file").click(function(){
        $.post("./readfile.php",
        {
        },
        function(data){
            var response = JSON.parse(data);
            document.getElementById("txtbanro").value = response;
            console.log(response);
        });
});
});

$(document).ready( function() {
    $("#giaima").click(function(){
        var banro = $("#txtbanma").val();
        var banro1 = banro.split(',');
        var soa = $("#soa").val();
        var son = $("#son").val(); 
        $.post("./giaima.php",
        {
            txt: banro1,
            keya: soa,
            keyn: son
        },
        function(data){
            var response = JSON.parse(data);
            document.getElementById("txtbangoc").value = response;
            console.log(response);
        });
});
});

$(document).ready( function() {
  $("#refesh").click(function() {
    document.getElementById("soa").value = "";
    document.getElementById("sob").value = "";
    document.getElementById("son").value = "";
    document.getElementById("son1").value = "";
    document.getElementById("txtbanro").value = "";
    document.getElementById("txtbanma").value = "";
    document.getElementById("txtbangoc").value = "";
  })
})