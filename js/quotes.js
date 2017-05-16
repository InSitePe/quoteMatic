doIt();
function doIt() {
    $.ajax({
        url: 'web/getQuote',
        type: 'GET',
        dataType: 'json',
        beforeSend: function () {
            loading();
            $("#quote_es_1").html('<i class="fa fa-2x fa-spinner fa-spin" aria-hidden="true"></i>');
            $("#quote_es_2").html('<i class="fa fa-2x fa-spinner fa-spin" aria-hidden="true"></i>');
        },
        success: function (data) {
            $("#quote_en").text("\"" + data.quote.en + "\"");
            $(".author_name").text("- " + data.author);
            $('#overlay').remove();
            $("meta[property='og:description']").remove();
            $('head').append("<meta property='og:description' content='" + data.quote.en + "'>");
            $.get('web/translate', {text: data.quote.en}, function (texts) {
                $("#quote_es_1").text("\"" + texts[0] + "\"");
                $("#quote_es_2").text("\"" + texts[1] + "\"");
            }, 'json');
        },
        error: function (err) {
            console.dir(err);
        }
    });
}
function loading() {
    // add the overlay with loading image to the page
    var over = '<div id="overlay">' +
            '<img id="loading" src="https://s-media-cache-ak0.pinimg.com/originals/d9/93/3c/d9933c4e2c272f33b74ef18cdf11a7d5.gif">' +
            '</div>';
    $(over).appendTo('body');
}
var $button = $('#generate-button');
$button.on('click', function () {
    var duration = 0.3, delay = 0.08;
    TweenMax.to($button, duration, {scaleY: 1.6, ease: Expo.easeOut});
    TweenMax.to($button, duration, {scaleX: 1.2, scaleY: 1, ease: Back.easeOut, easeParams: [3], delay: delay});
    TweenMax.to($button, duration * 1.25, {scaleX: 1, scaleY: 1, ease: Back.easeOut, easeParams: [6], delay: delay * 3});
    doIt();
});