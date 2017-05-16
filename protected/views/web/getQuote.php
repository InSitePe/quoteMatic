<?php
/* @var $this WebController */
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Insite Group">
    <meta name="description" content="Free Quotes">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= Yii::app()->baseUrl ?>/css/style.css">

    <meta property="og:url" content="<?= Yii::app()->baseUrl ?>" />
    <meta property="og:title" content="QuoteMatic!" />
    <meta property="og:image" content="<?= Yii::app()->baseUrl ?>/images/logo.png" />
    <meta property="og:description" content="Quotes for Everyone" />

    <title>quoteMatic</title>
</head>

<div class="container">
    <div class="row">
        <div class="col-xs-8 col-xs-offset-3">
            <img src="<?= Yii::app()->baseUrl . '/images/logo.png' ?>" class="img-responsive">
        </div>
    </div>
</div>
<br>

<div class="container" style="display: none">
    <ul>
        <li><a class="active" href="famous">Frases de Famosos</a></li>
        <li><a href="movies">Frases de Peliculas</a></li>
        <li><a href="chuck">Chuck Norris</a></li>
        <li><a href="trump">Donalp Trump</a></li>
    </ul>
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
                <div class="fb-share-button" 
                     data-href="<?= Yii::app()->baseUrl ?>" 
                     data-layout="button" data-caption="caption caption"
                     data-size="small" data-mobile-iframe="false">
                    <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= Yii::app()->baseUrl ?>&amp;src=sdkpreparse">
                        Compartir
                    </a>
                </div>
                <div class="author"><span class="author_name"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="fb-root"></div>


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
<br/>
<br/>
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
<script src="<?= Yii::app()->baseUrl ?>/js/quotes.js"></script>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.9&appId=335117643494133";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>