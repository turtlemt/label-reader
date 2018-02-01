<?php

namespace App\Http\Controllers\Scanner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\VoiceService;

class HomeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Home Controller
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
    /** @var VoiceService */
    protected $voiceService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct(VoiceService $voiceService)
     {
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
        return view('scanner.index');
    }

    /**
     * Get scanner value and play audio.
     *
     * @param Request $request
     * @return view
     */
    protected function store(Request $request)
    {
        $voiceId = $request->input('scan') - config('app.barcode_starter');
        $voice = $this->voiceService->getVoice($voiceId);
        $voice = $this->voiceService->setDelay($voice);
        return view('scanner.index', [
            'voice' => $voice,
        ]);
    }
}
