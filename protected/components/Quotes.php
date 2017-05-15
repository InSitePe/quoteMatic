<?php

class Quotes {

    public function get($cat = "famous", $count = 1, $translate = false) {
        Yii::app()->curl->setHeaders([
            "X-Mashape-Key" => "9YWmyzD7BTmshYfnzfIf1D5PE9Hep1ZxNC2jsnyS3aUY3FlzFO",
            "Content-Type"  => "application/x-www-form-urlencoded",
            "Accept"        => "application/json"
        ]);
        $url      = "https://andruxnet-random-famous-quotes.p.mashape.com/";
        $raw      = Yii::app()->curl->get($url, ['cat' => $cat, 'count' => $count]);
        $quotes   = json_decode($raw, true);
        $response = [];
        if (!isset($quotes['message'])) {
            if (isset($quotes[0])) {
                foreach ($quotes as $quote) {
                    if ($translate) {
                        $translate = [
                            'es' => [
                                Translator::doRequest($quotes['quote']),
                                Translator::alterRequest($quotes['quote'])
                            ]
                        ];
                    }
                    $response[] = [
                        'quote'  => [
                            'en' => $quote['quote'],
                        ],
                        $translate,
                        'author' => $quote['author'],
                    ];
                }
            } else {
                if ($translate) {
                    $translate = [
                        'es' => [
                            Translator::doRequest($quotes['quote']),
                            Translator::alterRequest($quotes['quote'])
                        ]
                    ];
                }
                $response[] = [
                    'quote'  => [
                        'en' => $quotes['quote'],
                        $translate,
                    ],
                    'author' => $quotes['author'],
                ];
            }
        }
        return $response;
    }

}
