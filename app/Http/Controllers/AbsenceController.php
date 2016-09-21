<?php

namespace App\Http\Controllers;

use App\Absence;
use Illuminate\Http\Request;
use App\Repositories\AbsenceRepository;
use App\Http\Requests;
use App\Http\Requests\AbsenceRequest;




use DB;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Exception\HttpResponseException;




class AbsenceController extends Controller
{


    protected $absenceRepository;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct(AbsenceRepository $absenceRepository)
    {
        $this->absenceRepository = $absenceRepository;
        $this->middleware('ajax', ['only' => 'editerUtilisateurs']);
    }



    public function index()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $absence = $this->absenceRepository->getById($id);

        return view('modifierabsence',  compact('absence'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $id ,Request $request)
    {
        $this->absenceRepository->update($id, $request->all());


    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->absenceRepository->destroy($id);

        return redirect('Listeabsence')->with('status', 'Profile deleted!');

       // return redirect()->back();
    }

    public function vueEditerUtilisateurs($id)
    {
        /*if(\Illuminate\Support\Facades\Request::ajax()) {
            //$id = Request::segment(2);
            $user = User::find($id);
            return response()->json($user);
        }
        else */

        $absence = Absence::find($id);
        return view('modifierAbsence', compact('absence'));
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'duree' => 'required|numeric',


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
            $this->absenceRepository->update( $id,$request->all());
            return response()->json();


        }

    }

    public function supprimerUtilisateurs($id)
    {


        $this->absenceRepository->destroy($id);
        return redirect('Listeabsence')->with('status', 'Profile deleted!');

    }


}
