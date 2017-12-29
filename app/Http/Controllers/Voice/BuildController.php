<?php

namespace App\Http\Controllers\Voice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuildController extends Controller
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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Scanner index page.
     *
     * @param Request $request
     * @return view
     */
    protected function index()
    {
        return view('voice.buildindex');
    }

    /**
     * Get scanner value and play audio.
     *
     * @param Request $request
     * @return view
     */
    protected function store(Request $request)
    {
        var_dump($request->all());exit;
        return view('voice.buildindex', [
            'audio' => url('storage/voice/' . $request->input('scan') . '.mp3'),
        ]);
    }
}
