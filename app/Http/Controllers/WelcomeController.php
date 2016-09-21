<?php

namespace App\Http\Controllers;

use App\Absence;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Http\Requests;
use App\Http\Requests\AbsenceRequest;
use App\Http\Requests\CongeRequest;
use App\Http\Requests\ServiceRequest;
use App\Http\Requests\BureauRequest;
use App\Http\Requests\GradeRequest;
use App\Http\Requests\ContratRequest;

class WelcomeController extends Controller
{
    //
    public function indexx()
    {
        $bureaux= DB::table('bureaux')->get();
        $grades = DB::table('grades')->get();
        return view ("contrat", compact("grades","bureaux" ));
    }
    public function indexx2(Request $request)
    {

                $salarie = DB::table('salaries')->insertGetId(
                    [
                        'nameSalarie' => $request->input('nom'),
                        'prenomSalarie' => $request->input('prenom'),
                        'NSS' => $request->input('nss'),
                        'dateNaissance' => $request->input('date'),
                        'lieuNaissance' => $request->input('lieu'),
                        'grade_id' => $request->input('grade'),
                        'bureau_id' => "1",




                    ]
                );

            DB::table('contracts')->insert(
                [
                    'dateRecrutement' => $request->input('recrutement'),
                    'typeContrat' =>$request->input('typecontrat'),
                    'salarie_id' => $salarie,
                ]
            );


        return redirect('contrat');
    }



    public function index()
    {
        $grades = DB::table('salaries')->get();
        return view ("conge", compact("grades" ));
    }

    public function index2(CongeRequest $request)
    {

        $results = DB::table('salaries')->where([
            ['nameSalarie', '=', $request->input("nom")],
            ['prenomSalarie', '=', $request->input("prenom")],
        ])->first();
        if ($results == null){
            return view('erreur2');

        }else{

        $grade = DB::table('grades')->where( 'id', $results->grade_id )->first();




        $nom = $request->input("nom");
        $prenom = $request->input("prenom");

        DB::table('conges')->insert(
            [
                'dateDebut' => $request->input('debut'),
                'dateFin' =>$request->input('fin'),
                'duree' => $request->input('duree'),
                'salarie_id' => $results->id,
            ]
        );
        $dateDebut = $request->input('debut');
        $dateFin = $request->input('fin');
        $duree = $request->input('duree');


        return view('TitreDeConge',compact("conges","nom","prenom","dateDebut","dateFin","duree","grade"));}

    }

    public function signaler()
    {
        $grades = DB::table('salaries')->get();
        return view ("signaler", compact("grades" ));
    }

    public function signaler2(AbsenceRequest $request)
    {
        $results = DB::table('salaries')->where([
            ['nameSalarie', '=', $request->input("id")],
            ['prenomSalarie', '=', $request->input("prenom")],
        ])->first();

        if ($results == null){

            return view('erreur2');

        }else{

        DB::table('absences')->insert(
            [
                'dateDebut' => $request->input('debut'),
                'duree' =>$request->input('duree'),
                'salarie_id' =>$results->id,
            ]
        );
        return redirect("Listeabsence");}
    }


    public function listeConge()
    {
        $conges = DB::table('conges')->get();
        $salaries = DB::table('salaries')->get();

        return view ("listeConge", compact("conges","salaries" ));
    }

    public function listeConge2()
    {
        $conges = DB::table('conges')->get();
        $salaries = DB::table('salaries')->get();
        return view ("listeCongesEnCours", compact("conges","salaries" ));
    }


    public function erreur()
    {

        return view ("erreur");
    }

    public function parBureau()
    {
        $bureaux= DB::table('bureaux')->get();
        $salaries = DB::table('salaries')->get();
        $conges = DB::table('conges')->get();
        return view ("salariesParBureau", compact("bureaux","salaries","conges" ));
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

    public function service()
    {

        return view ("AjouterService");
    }

    public function service2(ServiceRequest $request)
    {
        // $salaries = DB::table('salaries')->where("nameSalarie", $request->input("id"))->first();




        DB::table('services')->insert(
            [
                'nomService' => $request->input('nom'),
                'nmbrAgents' =>$request->input('nbre'),

            ]
        );
        return redirect("Ajouter_un_service");
    }

    public function grade()
    {

        return view ("AjouterGrade");
    }

    public function grade2(GradeRequest $request)
    {

        DB::table('grades')->insert(
            [
                'nomGrade' => $request->input('nom'),

            ]
        );
        return redirect("Ajouter_un_grade");
    }
    public function contrat()
    {

        return view ("AjouterContrat");
    }

    public function contrat2(ContratRequest $request)
    {

        DB::table('contracts')->insert(
            [
                'typeContrat' => $request->input('type'),
                'modeleleContrat' =>$request->input('model'),
                'nomContrat' =>$request->input('nom')
            ]
        );
        return redirect("Ajouter_un_contrat");
    }

    public function date()
    {

        return view ("Date");
    }
    public function validator(array $data)
    {

        return Validator::make($data, [
            'datedebut' => 'required|date',


        ]);

    }
    public function date2(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );

        }
        $debut =$request->input('datedebut');
            $fin =$request->input('datefin') ;
        $grades = DB::table('absences')->get();
        $grades2 = DB::table('salaries')->get();
        return view ("AbsencesParDate", compact("grades","grades2","debut","fin"));
    }


}










