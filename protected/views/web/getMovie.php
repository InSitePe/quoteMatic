<?php
/* @var $this WebController */
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?= Yii::app()->baseUrl ?>/css/style.css">
<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Sancreek' rel='stylesheet' type='text/css'>

<div class="container">
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <span data-text="quoteMatic" class="dashed-shadow hello">quoteMatic</span>
            <br />
        </div>
    </div>
</div>
<br>
<div class="container">
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
<script src="<?= Yii::app()->baseUrl ?>/js/movie.js"></script>