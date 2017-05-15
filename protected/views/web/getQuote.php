<?php
/* @var $this WebController */
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    @import url(https://fonts.googleapis.com/css?family=PT+Mono);
    @import url(https://fonts.googleapis.com/css?family=Lobster);

    body {
        background-color: #2196F3;
        color: white;
    }

    .button {
        font-weight: 100;
        padding: 1em 1.25em;
        width: 200px;
        color: white;
        border-radius: 5px;
        overflow: hidden;
        z-index: 0;
        cursor: pointer;
    }
    .button:hover{
        color:#fee2e2
    }
    .button.raised {
        -moz-transition: all 0.1s;
        -o-transition: all 0.1s;
        -webkit-transition: all 0.1s;
        transition: all 0.1s;
        background: #0c84e4;
        box-shadow: 0px 1px 1px #085a9b;
    }
    .button.raised:active {
        background: #0c7dd8;
        box-shadow: 0px 1px 1px #063e6b;
    }

    #generate-button {
        font-family: 'PT Mono';
        margin-top: 50px;
        margin-bottom: 50px;
    }
    .title{
        font-family: 'PT Mono';
    }

    .box {
        background-color: #26A69A;
        color: #fee2e2;
        border-radius: 2px;
        padding: 1em;
        box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
    }

    .quote {
        font-size: 40px;
        font-family: 'Lobster';
        text-align: right;
    }

    .author {
        font-size: 30px;
        font-family: 'Lobster';
        text-align: right;
    }
    #overlay {
        position: fixed;
        height: 100%;
        width: 100%;
        left: 0;
        top: 0;
        bottom: 0;
        right: 0;
        background: #000;
        opacity: 0.8;
        filter: alpha(opacity=80);
    }
    #loading {
        position: absolute;
        top: 30%;
        left: 40%;
    }

</style>
<div class="container">
    <div class="row">
        <div class="col-xs-8 col-xs-offset-3     center">
            <img src="<?= Yii::app()->baseUrl . '/images/logo.png' ?>" class="img-responsive">
        </div>
    </div>
</div>


<h1 class="text-center title">Encuentra y guarda las mejores Frases de famosos</h1>
<br/>
<br/>
<div class="container">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            <div class="box">
                <div class="quote">
                    <span id="quote_en"></span>
                </div>
                <div class="author"><span class="author_name"></span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="btn button raised center-block"  id="generate-button">
    NUEVA FRASE
</div>

<div class="container">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            <div class="box">
                <h6>Versión en español</h6>
                <div class="quote">
                    <span id="quote_es_1"></span>
                </div>
                <div class="author"><span  class="author_name"></span>
                </div>
            </div>
        </div>
    </div>
</div>

<br/>
<br/><br/>
<br/>

<div class="container">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            <div class="box">
                <h6>Versión en español alternativa</h6>
                <div class="quote">
                    <span id="quote_es_2"></span>
                </div>
                <div class="author"><span  class="author_name"></span>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.12.1/TweenMax.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    doIt();
    function doIt() {
        var url = '<?= Yii::app()->createUrl($this->id) ?>'
        $.ajax({
            url: url + '/getQuote',
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
                $.get(url + '/translate', {text: data.quote.en}, function (texts) {
                    $("#quote_es_1").text("\"" + texts[0] + "\"");
                    $("#quote_es_2").text("\"" + texts[1] + "\"");
                }, 'json');
            },
            error: function (err) {
                console.log(err);
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
</script>