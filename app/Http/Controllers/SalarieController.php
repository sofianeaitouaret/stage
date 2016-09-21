<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Requests;
use App\Email;
use DB;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Exception\HttpResponseException;
use App\Http\Requests\AjouterEmployerRequest;




class SalarieController extends Controller
{

    protected $userRepository;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->middleware('ajax', ['only' => 'editerUtilisateurs']);
        $this->middleware('ajax', ['only' => 'retraite2']);
    }

    public function index()
    {
        //
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom' => 'required|min:5|max:20',
            'prenom' => 'required|between:5,20',


        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepository->getById($id);

        $conges =DB::table('conges')->where("salarie_id", $id)->get();
        $absences =DB::table('absences')->where("salarie_id", $id)->get();
        return view('showEmploye',  compact('user','conges','absences' ));

    }
    public function show2($id)
    {
        $user = $this->userRepository->getById($id);

        $conges =DB::table('conges')->where("salarie_id", $id)->get();
        $absences =DB::table('absences')->where("salarie_id", $id)->get();
        return view('showRetraite',  compact('user','conges','absences' ));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->getById($id);


        return view('modifieremploye',  compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $this->userRepository->update($id, $request->all());

    }




        /**
    public function update(AjouterEmployerRequest $request, $id)
    {
        $this->userRepository->update($id, $request->all());

        return redirect('employes');
    }*/





    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $fichier = DB::table('absences')->where('salarie_id', $id)->first();;
        $fichier2 = DB::table('conges')->where('salarie_id', $id)->first();;


        if ($fichier <> null){

            return redirect('erreur');

        }elseif ($fichier2 <> null){
            return redirect('erreur');

        }else{
            $this->userRepository->destroy($id);
            return redirect('employes')->with('status', 'Profile deleted!');

        }


    }


    public function vueEditerUtilisateurs($id)
    {
        /*if(\Illuminate\Support\Facades\Request::ajax()) {
            //$id = Request::segment(2);
            $user = User::find($id);
            return response()->json($user);
        }
        else */

        $user = Email::find($id);
        return view('employeModifier', compact('user'));
    }
    public function validator2($id, array $data)
    {

        return Validator::make($data, [
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',

        ]);

    }






    public function editerUtilisateurs($id, Request $request)
    {
        if(\Illuminate\Support\Facades\Request::ajax()){

            $validator = $this->validator($request->all());

            if ($validator->fails()) {
                $this->throwValidationException(
                    $request, $validator
                );

            }
            $this->userRepository->update($id, $request->all());
            return response()->json();


        }

    }

    public function soso(Request $request)
    {
        if(\Illuminate\Support\Facades\Request::ajax()){

            $validator = $this->validator($request->all());

            if ($validator->fails()) {
                $this->throwValidationException(
                    $request, $validator
                );
            }
            $employe = DB::table('salaries')->where([
                ['nameSalarie', '=', $request->input("nom")],
                ['prenomSalarie', '=', $request->input("prenom")],
            ])->first();

            $this->userRepository->update($employe->id, $request->all());

            return response()->json();
        }
    }
    public function supprimerUtilisateurs($id)
    {
        $fichier = DB::table('absences')->where('salarie_id', $id)->first();;
        $fichier2 = DB::table('conges')->where('salarie_id', $id)->first();;


        if ($fichier <> null){

            return redirect('erreur');

        }elseif ($fichier2 <> null){
            return redirect('erreur');

        }else{
            $this->userRepository->destroy($id);
            return redirect('employes')->with('status', 'Profile deleted!');

        }


    }
    public function retraite($id)
    {

        $user = Email::find($id);
        return view('retraite', compact('user'));
    }


    protected function validator3(array $data)
    {
        return Validator::make($data, [
            'etat' => 'required|boolean',
            'arret' => 'required|date'


        ]);
    }




    public function retraite2($id, Request $request)
    {
        if(\Illuminate\Support\Facades\Request::ajax()){

            $validator = $this->validator3($request->all());

            if ($validator->fails()) {
                $this->throwValidationException(
                    $request, $validator
                );

            }
            $this->userRepository->update2( $id,$request->all());
            return response()->json();


        }

    }

}
