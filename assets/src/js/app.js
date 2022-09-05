$(document).ready(function() {

    /*var lazyLoadInstance = new LazyLoad({
        elements_selector: ".lazy"
        // ... more custom settings?
    });*/

	var cookieText = $('.cookie-message').text();
	$('#cookies-eu-accept').on('click', function(e) {
		var uniqueId = generateToken(64);
		var url = window.location.href;
		$.ajax({
            url: '/logCookie',
            type: 'POST',
            data: {
                uniqueId: uniqueId,
                url: url,
                text: cookieText
            },
            dataType: 'json',
            success: function (data) {
                setCookie('randomToken', uniqueId, 2000);
            }
        })
    });

   

});


function generateToken(length){
    var a = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890".split('');
    var b = [];  
    for (var i = 0; i < length; i++) {
        var j = (Math.random() * (a.length - 1)).toFixed(0);
        b[i] = a[j];
    }
    return b.join('');
}

function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function eraseCookie(name) {   
    document.cookie = name+'=; Max-Age=-99999999;';  
}