$(function(){
    $("#health").change(function(){
        var st = this.checked;
        if(st){
            $("#bildung").prop("disabled", false);
            $("#entspannung").prop("disabled", false);
            $("#ernaehrung").prop("disabled", false);
            $("#fitness").prop("disabled", false);
            $("#schwangerschaft").prop("disabled", false);
            $("#diverses").prop("disabled", false);
        }
        else {
            $("#bildung").prop("disabled", true);
            $("#entspannung").prop("disabled", true);
            $("#ernaehrung").prop("disabled", true);
            $("#fitness").prop("disabled", true);
            $("#schwangerschaft").prop("disabled", true);
            $("#diverses").prop("disabled", true);
        }
    });

    $("#prim").change(function(){
        var st = this.checked;
        if(st){
            $("#bildung").prop("disabled", false);
            $("#notfall").prop("disabled", false);
            $("#vorsorge").prop("disabled", false);
            $("#diverses").prop("disabled", false);
        }
        else {
            $("#bildung").prop("disabled", true);
            $("#notfall").prop("disabled", true);
            $("#vorsorge").prop("disabled", true);
            $("#diverses").prop("disabled", true);
        }
    });

    $("#sek").change(function(){
        var st = this.checked;
        if(st){
            $("#bildung").prop("disabled", false);
            $("#behandlung").prop("disabled", false);
            $("#notfall").prop("disabled", false);
            $("#diverses").prop("disabled", false);
        }
        else {
            $("#bildung").prop("disabled", true);
            $("#behandlung").prop("disabled", true);
            $("#notfall").prop("disabled", true);
            $("#diverses").prop("disabled", true);
        }
    });

    $("#patients").change(function(){
        var st = this.checked;
        if(st){
            $("#asthma").prop("disabled", false);
            $("#blutdruck").prop("disabled", false);
            $("#depresion").prop("disabled", false);
            $("#diabetes").prop("disabled", false);
            $("#hautkrankheiten").prop("disabled", false);
            $("#diverses").prop("disabled", false);
            $("#kinderkrankheiten").prop("disabled", false);
            $("#krebs").prop("disabled", false);
            $("#kreislaufkrankheiten").prop("disabled", false);
            $("#schlaf").prop("disabled", false);
            $("#diverses").prop("disabled", false);
        }
        else {
            $("#asthma").prop("disabled", true);
            $("#blutdruck").prop("disabled", true);
            $("#depresion").prop("disabled", true);
            $("#diabetes").prop("disabled", true);
            $("#hautkrankheiten").prop("disabled", true);
            $("#diverses").prop("disabled", true);
            $("#kinderkrankheiten").prop("disabled", true);
            $("#krebs").prop("disabled", true);
            $("#kreislaufkrankheiten").prop("disabled", true);
            $("#schlaf").prop("disabled", true);
            $("#diverses").prop("disabled", true);
        }
    });

    $("#prof").change(function(){
        var st = this.checked;
        if(st){
            $("#bildung").prop("disabled", false);
            $("#leitlinien").prop("disabled", false);
            $("#notfall").prop("disabled", false);
            $("#diverses").prop("disabled", false);
        }
        else {
            $("#bildung").prop("disabled", true);
            $("#leitlinien").prop("disabled", true);
            $("#notfall").prop("disabled", true);
            $("#diverses").prop("disabled", true);
        }
    });

});