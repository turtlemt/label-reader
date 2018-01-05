<?php

namespace App\Services;

use App\Voice;
use Illuminate\Http\Request;

class VoiceService
{
    public function processVoiceEn($ttsResponse, $request)
    {
        $voice = new Voice;
        $voice = $voice->where('text_en', $request->input('en'))->first();
        if (null != $voice) {
            $voice->delete();
        }
        $voice = new Voice;
        $voice->text_en = $request->input('en');
        $voice->save();

        $fp = fopen('storage/voice/' . $voice->id . '_en.mp3', 'w');
        fwrite($fp, $ttsResponse);
        fclose($fp);
        $voice->file_en = $voice->id . '_en.mp3';
        $voice->save();

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
    }
}
