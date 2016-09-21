<?php

namespace App\Http\Controllers;

use App\Email;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\AjouterEmployerRequest;
use App\Http\Requests\AbsenceRequest;
use Validator;
use Illuminate\Http\Exception\HttpResponseException;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');


    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bureaux= DB::table('bureaux')->get();
        $salaries = DB::table('salaries')->get();
        return view ("acceuil", compact("bureaux","salaries" ));

    }



    public function index2()
    {
        $gradess = DB::table('salaries')->get();

        return view('employes', compact("gradess"));
    }
    public function retraités()
    {
        $gradess = DB::table('salaries')->get();

        return view('employes2', compact("gradess"));
    }

    public function index3()
    {

        $grades = DB::table('absences')->get();
        $grades2 = DB::table('salaries')->get();
        return view ("absence", compact("grades","grades2"));

    }

    public function bureau()
    {
        $services = DB::table('services')->get();
        return view ("AjouterBureau", compact("services" ));
    }

    public function bureau2(BureauRequest $request)
    {

        DB::table('bureaux')->insert(
            [
                'nomBureau' => $request->input('nom'),

                'service_id' =>$request->input('service'),
            ]
        );
        return redirect("Ajouter_un_bureau");
    }


    public function index4()
    {

        $salaries = DB::table('salaries')->get();

        return view('certificatDeTravail',compact("salaries"));
    }

    public function index44(Request $request)
    {

        $results = DB::table('salaries')->where([
            ['nameSalarie', '=', $request->input("nom")],
            ['prenomSalarie', '=', $request->input("prenom")],
        ])->first();

        return view('document',compact("results"));
    }
    public function index5()
    {

        $salaries = DB::table('salaries')->get();

        return view('atestationDeTravail',compact("salaries"));
    }

    public function index55(Request $request)
    {

        $results = DB::table('salaries')->where([
            ['nameSalarie', '=', $request->input("nom")],
            ['prenomSalarie', '=', $request->input("prenom")],
        ])->first();

        return view('document2',compact("results"));
    }




    public function ajouter()
    {
        $bureaux= DB::table('bureaux')->get();
        $grades = DB::table('grades')->get();
        $contrats = DB::table('contracts')->get();

return view('ajouterEmploye',compact("grades","bureaux","contrats" ));

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom' => 'required|min:5|max:20',
            'prenom' => 'required|between:5,20',
            'nss' => 'required|numeric|unique:salaries,NSS',
            'lieu' => 'required|min:5|max:250',
            'date' => 'required|date',
            'recrutement' => 'required|date|after:date'

        ]);
    }






    public function ajouter2(Request $request)
    {
        if(\Illuminate\Support\Facades\Request::ajax()) {
            $validator = $this->validator($request->all());

            if ($validator->fails()) {
                $this->throwValidationException(
                    $request, $validator
                );

            }


            $salarie = DB::table('salaries')->insertGetId(
                [
                    'nameSalarie' => $request->input('nom'),
                    'prenomSalarie' => $request->input('prenom'),
                    'NSS' => $request->input('nss'),
                    'dateNaissance' => $request->input('date'),
                    'lieuNaissance' => $request->input('lieu'),
                    'dateRecrutement' => $request->input('recrutement'),
                    'grade_id' => $request->input('grade'),
                    'bureau_id' => $request->input('bureau'),
                    'contract_id' => $request->input('typecontrat'),

                ]
            );
            return response()->json();


        }





        return redirect("Ajouter_employe");


    }


    public function printe()
    {
        $conges = DB::table('conges')->get();
        $salaries = DB::table('salaries')->get();
        return view ("printConge", compact("conges","salaries" ));

    }

    public function printe2()
    {
        $absences = DB::table('absences')->get();
        $salaries = DB::table('salaries')->get();
        return view ("document3", compact("absences","salaries"));

    }








}
