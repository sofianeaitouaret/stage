<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class ContratController extends Controller
{
public function store(Request $request)
{



            $id = DB::table('salaries')->insertGetId(
                [
                    'nameSalarie' => $request->input('Nom'),
                    'nameSalarie' => $request->input('Prénom'),
                    'NSS' => $request->input('Nss')
                ]
            );

            DB::table('numero')->insert(
                [
                    'dateRecrutement' => $request->input('Date de recrutement'),
                    'typeContrat' => $request->input('numero'),

                    'ID_Client' => $id,

                ]
            );



            return response()->json("succes");
        }


}
