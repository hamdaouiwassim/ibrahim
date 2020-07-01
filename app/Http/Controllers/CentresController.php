<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Centre;
class CentresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view("professionels.centres.ajouter");
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
        $centre = new Centre();
        $centre->nom = $request->input("nom");
        $centre->description = $request->input("description");
        $centre->ville = $request->input("ville");
        $centre->adresse = $request->input("adresse");
        $centre->type = $request->input("type");
        $centre->region = $request->input("region");
        $centre->etat = "NON VALIDE";
        $centre->iduser = auth()->user()->professionel->id;
        $centre->save();  
        return redirect("/user/me/centres");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CentresController  $centresController
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $centre = Centre::find($id);
        return view('professionels.centres.afficher')->with('centre',$centre);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CentresController  $centresController
     * @return \Illuminate\Http\Response
     */
    public function edit(CentresController $centresController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CentresController  $centresController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CentresController $centresController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CentresController  $centresController
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $centre = Centre::find($id);
        $centre->delete();
        return redirect()->back();

    }
    public function mescentres(){
            
            return view('professionels.centres.mescentres')->with('centres',auth()->user()->professionel->centres);
    }
    public function cherchercentre(Request $request){

        $nomcentre = $request->input('nomcentre');
        $type = $request->input('type');
        $region = $request->input('region');


        $centres = Centre::where('etat','VALIDE')
                            ->where('nom','LIKE','%'.$nomcentre.'%')
                            ->get();
                            return view('patients.centres.liste')->with('centres',$centres);
                            //dd($centres);
    }


}
