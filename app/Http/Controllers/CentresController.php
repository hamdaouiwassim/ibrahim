<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Centre;
use App\Reservation;
use App\User;
use App\Historique;
use App\Horraire;
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
        if (auth()->user()->roles == "Patient"){
          
            return view('patients.centres.afficher')->with('centre',$centre);
        }else{
            return view('professionels.centres.afficher')->with('centre',$centre);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CentresController  $centresController
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $centre = Centre::find($id);
        return view('professionels.centres.modifier')->with('centre',$centre);
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
        $centre = Centre::find( $request->input("idcentre"));
        $centre->nom = $request->input("nom");
        $centre->description = $request->input("description");
        $centre->ville = $request->input("ville");
        $centre->adresse = $request->input("adresse");
        $centre->type = $request->input("type");
        $centre->region = $request->input("region");
        $centre->update();  
        return redirect("/user/me/centres");
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
        $reservations = Reservation::where('idcentre',$id)->get();
        foreach($reservations as $r){
            $r->delete();
        }
        $horraires = Horraire::where('idcentre',$id)->get() ;
        foreach($horraires as $h){
            $h->delete();
        }
        return redirect()->back();

    }
    public function mescentres(){
            
            return view('professionels.centres.mescentres')->with('centres',auth()->user()->professionel->centres);
    }
    public function cherchercentre(Request $request){

       

        $ville = $request->input('ville');
        $type = $request->input('type');
        $region = $request->input('region');
        $criteres = "";

        if ( $ville != "" && $type != "" && $region != "" ){
            $criteres = " ville = ".$ville." , type =".$type." , region =".$region;
            $centres = Centre::where('etat','VALIDE')
                    ->where('ville','LIKE','%'.$ville.'%')
                    ->where('type',$type)
                    ->where('region','LIKE','%'.$region.'%')
                    ->get();
        }else if ( $ville != "" && $type != "" ){
            $criteres = " ville = ".$ville." , type =".$type;
                    $centres = Centre::where('etat','VALIDE')
                    ->where('ville','LIKE','%'.$ville.'%')
                    ->where('type',$type)
                    ->get();
        }else if ( $ville != "" && $region != "" ) {
                    $criteres = " ville = ".$ville." , region =".$region;
                    $centres = Centre::where('etat','VALIDE')
                    ->where('ville','LIKE','%'.$ville.'%')
                    ->where('region','LIKE','%'.$region.'%')
                    ->get();
        }else if ( $type != "" && $region != "" ) {
            $criteres = " type = ".$type." , type =".$region;
            $centres = Centre::where('etat','VALIDE')
                    ->where('type',$type)
                    ->where('region','LIKE','%'.$region.'%')
                    ->get();
        }
        else if ( $type != "" ) {
            $criteres = " type = ".$type;
            $centres = Centre::where('etat','VALIDE')
                    ->where('type',$type)
                    
                    ->get();
        }
        else if (  $region != "" ) {
            $criteres = " region = ".$region;
            $centres = Centre::where('etat','VALIDE')
                   
                    ->where('region','LIKE','%'.$region.'%')
                    ->get();
        }
        else {
            $criteres = " ville = ".$ville;
            $centres = Centre::where('etat','VALIDE')
                    ->where('ville',$ville)
                    ->get();
        }
        $message = auth()->user()->name ." a chercher un centre avec ".$criteres;

        $h = new Historique();
        $h->message = $message;
        $h->save();

      
                            //dd($centres);
                            return view('patients.centres.liste')->with('centres',$centres);
                            //dd($centres);
    }
    public function admincentres(){
        $centres = Centre::where('etat','NON VALIDE')->get();
        return view('Admins.centres')->with('centres',$centres);
    }

    public function AccepterCentre($id){
        $centre = Centre::find($id);
        $centre->etat = "VALIDE";
        $centre->update();
        return redirect("/admin/centres");
    }

    public function RefuserCentre($id){
        $centre = Centre::find($id);
        $centre->etat = "REFUE";
        $centre->update();
        return redirect("/admin/centres");
    }

    public function adminreservations(){
        $reservations = Reservation::all();
        return view('Admins.reservations')->with('reservations',$reservations);
      
    }

    public function adminhistoriques(){
        $historiques = Historique::all();
        return view('Admins.historiques')->with('historiques',$historiques);
      
    }

    public function adminprofessionels(){
        $professionels = User::where('roles','Professionel')
                            
                            ->get();
        return view('Admins.professionels')->with('professionels',$professionels);
      
    }
    public function patientsCentres(){
        $centres = Centre::Where('etat','VALIDE')->get();
        return view('patients.centres.liste')->with('centres',$centres);
    }

    public function patientsReservations(){
        $reservations = Reservation::Where('idpatient',auth()->user()->patient->id )->orderBy('updated_at','DESC')->get();
        return view('patients.reservations.liste')->with('reservations',$reservations);
    }


    /*
    public function AccepterCentre($id){
        $centre = Centre::find($id);
        $centre->etat = "VALIDE";
        $centre->update();
        return redirect("/admin/centres");
    }

    public function RefuserCentre($id){
        $centre = Centre::find($id);
        $centre->etat = "REFUE";
        $centre->update();
        return redirect("/admin/centres");
    }
    */
    public function DropAllCentres(){
            $centres = auth()->user()->professionel->centres;
            //dd($centres);
            foreach($centres as $centre){
                $centre->delete();

            }
             return redirect()->back();
    }
    public function DropHorraire($id){

        $h = Horraire::find($id);
        $h->delete();

        return redirect()->back();

    }
}
