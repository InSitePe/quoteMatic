<?php

class Translator {

    public function doRequest($text, $lang = "en-es") {
        $token         = "trnsl.1.1.20170514T230320Z.a2537f58d90845f5.10f954c89dabd14293daa97ad4177f9a091921ab";
        $url           = "https://translate.yandex.net/api/v1.5/tr.json/translate";
        $raw           = Yii::app()->curl->get($url, ['key' => $token, 'text' => $text, 'lang' => $lang]);
        $response      = json_decode($raw, true);
        $translatedTex = "";
        if (isset($response['code']) && $response['code'] == 200) {
            $translatedTex = $response['text'][0];
        }
        return $translatedTex;
    }

    public function alterRequest($text, $source = "en", $target = "es") {
        Yii::app()->curl->setHeaders([
            "X-Mashape-Key" => "9YWmyzD7BTmshYfnzfIf1D5PE9Hep1ZxNC2jsnyS3aUY3FlzFO",
            "Content-Type"  => "application/x-www-form-urlencoded",
            "Accept"        => "application/json"
        ]);

        $url = "https://systran-systran-platform-for-language-processing-v1.p.mashape.com/";
        $url .= "translation/text/translate";

        $raw           = Yii::app()->curl->get($url, ['source' => $source, 'target' => $target, 'input' => $text]);
        $response      = json_decode($raw, true);
        $translatedTex = "";

        if (isset($response['outputs'][0]))
            if (isset($response['outputs'][0]['output']))
                $translatedTex = $response['outputs'][0]['output'];

        return $translatedTex;
    }

    public function google($text) {
        $url  = "https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=es&dt=t&q=" . urlencode($text);
        $translatedTex = json_decode(file_get_contents($url));
        return $translatedTex[0][0][0];
    }

}
