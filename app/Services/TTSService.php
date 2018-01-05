<?php

namespace App\Services;

use Ixudra\Curl\Facades\Curl;

class TTSService
{
    public function getTTS($sendData, $tl)
    {
        $sendData = urlencode($sendData);
        //echo 'https://translate.google.com/translate_tts?ie=UTF-8&q=' . $sendData . '&tl=' . $tl . '&client=tw-ob';exit;
        $response = Curl::to('https://translate.google.com/translate_tts?ie=UTF-8&q=' . $sendData . '&tl=' . $tl . '&client=tw-ob')
        ->withHeader('Referer: http://translate.google.com/')
        ->withHeader('User-Agent: stagefright/1.2 (Linux;Android 5.0)')
        ->get();
        if ($response) {
            return $response;
        } else {
            return false;
        }

        /*const fs = require('fs');
        const request = require('request');
        const text = 'Hello World';

        const options = {
            url: `https://translate.google.com/translate_tts?ie=UTF-8&q=${encodeURIComponent(text)}&tl=en&client=tw-ob`,
            headers: {
                'Referer': 'http://translate.google.com/',
                'User-Agent': 'stagefright/1.2 (Linux;Android 5.0)'
            }
        }*/
    }
}
