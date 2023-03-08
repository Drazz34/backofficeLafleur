<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use App\Models\Couleur;
use App\Models\EspeceVegetale;
use App\Models\Unite;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::orderBy('id')->get();

        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        $especesVegetales = EspeceVegetale::all(); // Récupère toutes les espèces végétales
        $couleurs = Couleur::all();
        $unites = Unite::all();
        return view('articles.create', compact('especesVegetales', 'couleurs', 'unites', 'categories')); // Passe la variable $especesVegetales... à la vue
    }


    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
     {
         if ($request->validate([
             'nom' => 'required|string|max:45|min:2',
             'prix_unitaire' => 'required|min:1',
             'espece_vegetale' => 'required',
             'couleur' => 'required',
             'quantite_dispo' => 'required',
             'unite' => 'required',
             'categories.*' => 'numeric|exists:lf_categories,id' // validation des catégories sélectionnées
         ])) {
             $nom = $request->input('nom');
             $prix_unitaire = $request->input('prix_unitaire');
             $categories = $request->input('categories');
             $espece_vegetale_id = $request->input('espece_vegetale');
             $couleur_id = $request->input('couleur');
             $quantite = $request->input('quantite_dispo');
             $unite_id = $request->input('unite');
     
             $article = new Article();
             $article->nom = $nom;
             $article->prix_unitaire = $prix_unitaire;
             $article->especeVegetale()->associate(EspeceVegetale::find($espece_vegetale_id));
             $article->couleur()->associate(Couleur::find($couleur_id));
             $article->quantite_dispo = $quantite;
             $article->unite()->associate(Unite::find($unite_id));
             $article->save();
     
             $article->categories()->sync($categories);
     
             return redirect()->route('articles.show', $article->id);
         } else {
             return redirect()->back();
         }
     }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $article = Article::find($id);
        // $article->with('categories')->get();
        // $article->with('especeVegetale')->get(); // Nom de la fonction dans le modèle Article

        $article = Article::find($id);

        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::find($id);
        
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->validate([
            'quantite' => 'required'
        ])) {
            $quantite = $request->input('quantite');
            $article = Article::find($id);
            $article->quantite_dispo += $quantite;
            $article->save();
            return redirect()->route('articles.show', $article->id);
        } else {
            return redirect()->back();
        }
        die;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        $article->categories()->detach(); // Supprime les catégories associées à l'article
        $article->delete(); // Supprime l'article
        return redirect()->route('articles.index');
    }
}