<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alphaolomi\Mrz\Mrz;

class MRZController extends Controller
{

    public function __construct(
        public $types = [
            "I" => "Identity card",
            "P" => "Passport",
        ]
    ) {
    }
    public function index()
    {
        return view('generate');
    }

    public function generate(Request $request)
    {
        // Validate the input data here
        $type = $request->input('type');
        $country = $request->input('country');
        $documentNumber = $request->input('document_number');
        $birthDate = $request->input('birth_date');
        $gender = $request->input('gender');
        $expirationDate = $request->input('expiration_date');
        $nationality = $request->input('nationality');
        $lastName = $request->input('last_name');
        $firstName = $request->input('first_name');

        // Use a service or library to generate the MRZ based on the input
        // $mrz = new Mrz("I", "Tanzania", "D23148958907", date("dmy",strtotime("1999-10-14")), "M", date("dmy",strtotime("2030-12-31")), "TZA", "OLOMI", "ALPHA");

        $mrz = new Mrz($type, $country, $documentNumber, $birthDate, $gender, $expirationDate, $nationality, $lastName, $firstName);

        $code =  $mrz->TD1CodeGenerator();

        return view('generate', ['code' => $code]);
    }
}
