<?php

class Jokes {

    public function getChuck($cat = "") {
        $url      = "https://api.chucknorris.io/jokes/random";
        $raw      = Yii::app()->curl->get($url, ['category' => $cat]);
        $response = json_decode($raw, true);

        return [
            'en' => $response['value'],
            'es' => [
                Translator::doRequest($response['value']),
                Translator::alterRequest($response['value'])
            ]
        ];
    }

    public function getTrump() {
        $url      = "https://api.tronalddump.io/random/quote";
        $raw      = Yii::app()->curl->get($url, []);
        $response = json_decode($raw, true);

        return [
            'appeared_at' => $response['appeared_at'],
            'quote'       => [
                'en' => $response['value'],
                'es' => [
                    Translator::doRequest($response['value']),
                    Translator::alterRequest($response['value'])
                ]
            ],
            'source'      => $response['_embedded']['source'][0]['url']
        ];
    }

}
