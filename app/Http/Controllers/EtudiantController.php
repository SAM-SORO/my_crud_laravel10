<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Etudiant;

class EtudiantController extends Controller
{
    //
    // pour
    public function liste_etudiant(){
        //$etudiants = Etudiant::all(); //selectionne tous les etudiant qui sont dant la base de donnees
        //il faut maintenat les injectés dans cette pages
        $etudiants = Etudiant::paginate(4);
        return view('etudiant.liste', compact('etudiants'));
    }

    public function ajouter_etudiant(){
        return view('etudiant.ajouter');
    }

    public function ajouter_etudiant_traitement(Request $request){
        //on va verifier que les champs on ete ernseigner
        $request->validate([
            'nom' => 'required',
            'prenom'=> 'required',
            'classe' => 'required',
        ]);

        //a partir du model on creer un etudiant et on lui donne les valeurs de ces attributs
        $etudiant = new Etudiant();
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->classe = $request->classe;
        //on l'enregistre ensuite dans la bd
        $etudiant->save();

        //on fait une redirection pour eviter de se retrouver sur une page blanche puisque la soumission etait envoyer a traitement
        return redirect('/ajouter')->with('status','L\'étudiant à bien été enregistrer avec succès');
        //on le redirige avec un message de succès  (nous avons là une session avec le nom status)
    }

    public function update_etudiant($id){
        //rechercher l'etudiant en question au moyen de son identiifant
        $etudiant = Etudiant::find($id); //representer par un objet
        return view('etudiant.update', compact('etudiant'));
    }

    public function update_etudiant_traitement(Request $request){
        //on va verifier que les champs on ete ernseigner
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'classe' => 'required',
        ]);
        //a partir du model on trouve l'etudiant et on lui donne les nouvelles valeurs
        $etudiant = Etudiant::find($request->id);
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->classe = $request->classe;
        //on l'enregistre ensuite dans la bd
        $etudiant->update();

        //on fait une redirection pour eviter de se retrouver sur une page blanche puisque la soumission etait envoyer a traitement
        return redirect('/etudiant')->with('status','L\'étudiant à bien été modifier avec succès');
        //on le redirige avec un message de succès  (nous avons là une session avec le nom status)
    }

    public function delete_etudiant_traitement($id){
        $etudiant = Etudiant::find($id);
        $etudiant->delete();
        return redirect('/etudiant')->with('status', 'L\'Etudiant à bien été supprimer avec succès');
    }
}
