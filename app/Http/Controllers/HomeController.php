<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alphaolomi\Mrz\MrzParser;

class HomeController extends Controller
{
    // index
    public function index()
    {
        return view('index');
    }

    // decode
    public function decode(Request $request)
    {
        $this->validate($request, [
            'data' => 'required|string',
        ]);
        $data = $request->input('data');

        session(['data' => $data]);

        $mrzParser = new MrzParser();

        $mrzData = $mrzParser->parseMRZ($data);

        $data = json_encode($mrzData, JSON_PRETTY_PRINT);

        return view('index', ['data' => $data]);
    }
}
