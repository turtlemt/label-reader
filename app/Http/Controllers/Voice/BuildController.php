<?php

namespace App\Http\Controllers\Voice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TTSService;
use App\Services\VoiceService;
use \Milon\Barcode\DNS1D;

class BuildController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Build Controller
    |--------------------------------------------------------------------------
    |
    |
    |
    */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /** @var TTSService */
    protected $ttsService;

    /** @var VoiceService */
    protected $voiceService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TTSService $ttsService, VoiceService $voiceService)
    {
        $this->ttsService = $ttsService;
        $this->voiceService = $voiceService;
    }

    /**
     * Scanner index page.
     *
     * @param Request $request
     * @return view
     */
    protected function index()
    {
        return view('voice.buildIndex');
    }

    /**
     * Get scanner value and play audio.
     *
     * @param Request $request
     * @return view
     */
    protected function store(Request $request)
    {
        $storeDone = false;
        $response = $this->ttsService->getTTS($request->input('en'), 'en');
        if ($response) {
            $voice = $this->voiceService->processVoiceEn($response, $request);
            $response = $this->ttsService->getTTS($request->input('tw'), 'zh-tw');
            if ($response) {
                $voice = $this->voiceService->processVoiceTw($voice, $response, $request);
                /*$fp = fopen('storage/barcode/' . $voice->id . '.png', 'w');
                fwrite($fp, DNS1D::getBarcodePNG($voice->id, "C128A"));
                fclose($fp);*/
            }
            $storeDone = true;
        }

        if ($storeDone) {
            $alert = array('success' => array('show' => '', 'content' => $request->input('en') . ' ' . $request->input('tw') . ' saved!'));
        } else {
            $alert = array('danger' => array('show' => '', 'content' => $request->input('en') . ' ' . $request->input('tw') . ' save fail! Please try again.'));
        }

        return view('voice.buildIndex', [
            'alert' => $alert,
        ]);
    }

    /**
     * Get scanner value and play audio.
     *
     * @param Request $request
     * @return array
     */
    protected static function setTTSData()
    {
        $request = Request();
        $TTSData = array(
            'en' => $request->input('en'),
            'tw' => $request->input('tw'),
        );
        return $TTSData;
    }
}
