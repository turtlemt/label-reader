<?php

namespace App\Http\Controllers\Voice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\VoiceService;

class ListController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | List Controller
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
        $voices = $this->voiceService->getAllVoices();
        return view('voice.listIndex', [
            'voices' => $voices,
        ]);
    }

    /**
     * Get scanner value and play audio.
     *
     * @param Request $request
     * @return view
     */
    protected function create(Request $request)
    {
        $voices = $this->voiceService->getVoicesById($request->input('checklabel'));

        return view('voice.listLabel', [
            'voices' => $voices,
        ]);
    }
}
