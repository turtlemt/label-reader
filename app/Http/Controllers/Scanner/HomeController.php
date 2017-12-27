<?php

namespace App\Http\Controllers\Scanner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('scanner.index', [
            'audio' => '',
        ]);
    }

    /**
     * Get scanner value and play audio.
     *
     * @param Request $request
     * @return view
     */
    protected function store(Request $request)
    {
        return view('scanner.index', [
            'audio' => url('storage/voice/' . $request->input('scan') . '.mp3'),
        ]);
    }
}
