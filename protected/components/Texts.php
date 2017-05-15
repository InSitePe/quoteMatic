<?php

class Texts {

    public function toImg($text, $font = "trebuchet", $fcolor = "000000", $size = "14", $bcolor = "", $type = "png") {
        $url = "http://api.img4me.com/";

        return Yii::app()->curl->get($url, [
                    'text'   => $text,
                    'font'   => $font,
                    'fcolor' => $fcolor,
                    'size'   => $size,
                    'bcolor' => $bcolor,
                    'type'   => $type]
        );
    }

    public function toFancy($text) {
        $url      = "https://ajith-Fancy-text-v1.p.mashape.com/text";
        Yii::app()->curl->setHeaders([
            "X-Mashape-Key" => "9YWmyzD7BTmshYfnzfIf1D5PE9Hep1ZxNC2jsnyS3aUY3FlzFO",
            "Content-Type"  => "application/x-www-form-urlencoded",
            "Accept"        => "application/json"
        ]);
        $raw      = Yii::app()->curl->get($url, ['text' => $text]);
        $response = json_decode($raw, true);
        return $response['fancytext'];
    }

}
