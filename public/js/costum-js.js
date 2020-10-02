// image preview

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$("#categoryImage").change(function() {
    readURL(this);
});

$("#productImage").change(function() {
    readURL(this);
});


// navbar toogle button
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

$(document).ready(function() {
    $('#sidebar-wrapper .collapse:first').addClass('show');
});

$(document).ready(function(){
    var myClass = 1;
    $("a.nav-link").click(function(){
        var myClass = jQuery(this).attr("class");
    });
});

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

$(".nav-link").click(function(e) {
    var myId = jQuery(this).attr("aria-controls");
    document.cookie = "activeCategory="+myId;
});
