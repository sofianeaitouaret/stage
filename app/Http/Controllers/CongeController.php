<?php

namespace App\Http\Controllers;

use App\Conge;
use Illuminate\Http\Request;
use App\Repositories\CongeRepository;
use App\Http\Requests;
use App\Http\Requests\CongeRequest;
use App\Repositories\UserRepository;
use DB;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Exception\HttpResponseException;
use App\Http\Requests\AjouterEmployerRequest;


class CongeController extends Controller
{


    protected $congeRepository;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct(CongeRepository $congeRepository)
    {
        $this->congeRepository = $congeRepository;
        $this->middleware('ajax', ['only' => 'editerUtilisateurs']);
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'debut' => 'required|date',
            'fin' => 'required|date|after:debut',
            'duree' => 'required|numeric'

        ]);
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
        $conge = $this->congeRepository->getById($id);

        return view('modifierCongee',  compact('conge'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CongeRequest $request, $id)
    {
        $this->congeRepository->update($id, $request->all());

        return redirect('Liste_conge');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->congeRepository->destroy($id);

        return redirect()->back();
    }

    public function vueEditerUtilisateurs($id)
    {
        /*if(\Illuminate\Support\Facades\Request::ajax()) {
            //$id = Request::segment(2);
            $user = User::find($id);
            return response()->json($user);
        }
        else */

        $conge = Conge::find($id);
        return view('ModifierCongee', compact('conge'));
    }

    public function validator2($id, array $data)
    {

        return Validator::make($data, [
            'debut' => 'required|date',
            'fin' => 'required|date|after:debut',
            'duree' => 'required|numeric'

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
            $this->congeRepository->update($id, $request->all());
            return response()->json();


        }

    }



    public function supprimerUtilisateurs($id)
    {


        $this->congeRepository->destroy($id);
        return redirect('Liste_conge')->with('status', 'Profile deleted!');

    }
}
