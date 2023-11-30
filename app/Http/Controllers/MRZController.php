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
        try {
            $size = $request->input('size') ?? 'td1';
            // Validate the input data here
            $type = $request->input('type') ?? "P";

            $country = $request->input('country') ?? 'Tanzania';
            $documentNumber = $request->input('document_number');

            $birthDate = $request->input('birth_date');
            $birthDate = date("dmy", strtotime($birthDate));

            $gender = $request->input('gender');
            $expirationDate = $request->input('expiration_date');
            $expirationDate = date("dmy", strtotime($expirationDate));

            $nationality = $request->input('nationality') ?? 'Tanzania';

            $lastName = $request->input('last_name');
            $firstName = $request->input('first_name');

            // Use a service or library to generate the MRZ based on the input
            // $mrz = new Mrz("I", "Tanzania", "D23148958907", date("dmy",strtotime("1999-10-14")), "M", date("dmy",strtotime("2030-12-31")), "TZA", "OLOMI", "ALPHA");

            $mrz = new Mrz($type, $country, $documentNumber, $birthDate, $gender, $expirationDate, $nationality, $lastName, $firstName);
            $code =  $mrz->TD1CodeGenerator();

            // $code = nl2br($code);
        } catch (\Throwable $th) {
            $code =  $th->getMessage();
        }

        return view('generate', ['code' => $code]);
    }
}
