<?php

namespace App\Services;

use App\Voice;
use Illuminate\Http\Request;

class VoiceService
{
    public function processVoiceEn($ttsResponse, $request)
    {
        self::checkExist($request);
        if (!$ttsResponse) {
            $voice = new Voice;
            //$voice->text_en = $request->input('en');
            $voice->save();
        } else {
            $voice = new Voice;
            $voice->text_en = $request->input('en');
            $voice->save();

            $fp = fopen('storage/voice/' . $voice->id . '_en.mp3', 'w');
            fwrite($fp, $ttsResponse);
            fclose($fp);
            $voice->file_en = $voice->id . '_en.mp3';
            $voice->save();
        }

        return $voice;
    }

    public function processVoiceTw($voice, $ttsResponse, $request)
    {
        $voice->text_tw = $request->input('tw');
        $fp = fopen('storage/voice/' . $voice->id . '_tw.mp3', 'w');
        fwrite($fp, $ttsResponse);
        fclose($fp);
        $voice->file_tw = $voice->id . '_tw.mp3';
        $voice->save();

        return $voice;
    }

    public function getAllVoices()
    {
        $voice = new Voice;
        $voices = $voice->all();
        foreach ($voices as $key => $voice) {
            $voices[$key]->barcode = config('app.barcode_starter') + $voice->id;
        }

        return $voices;
    }

    public function getVoicesById($ids)
    {
        $voice = new Voice;
        $voices = $voice->find($ids);
        foreach ($voices as $key => $voice) {
            $voices[$key]->barcode = config('app.barcode_starter') + $voice->id;
        }

        return $voices;
    }

    public function getVoice($voiceId)
    {
        $voice = new Voice;
        return $voices = $voice->where('id', $voiceId)->first();
    }

    public function setDelay($voice)
    {
        $length = strlen($voice->text_en);
        if ($length > 10) {
            $voice->delay = 3000;
        } else {
            $voice->delay = 2000;
        }
        return $voice;
    }

    protected static function checkExist($request)
    {
        $voice = new Voice;
        $voice = $voice->where('text_en', $request->input('en'))->first();
        if (null != $voice) {
            unlink('storage/voice/' . $voice->id . '_en.mp3');
            unlink('storage/voice/' . $voice->id . '_tw.mp3');
            $voice->delete();
        }
    }
}
