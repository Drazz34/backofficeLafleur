<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\EspeceVegetale;
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
        $especesVegetales = EspeceVegetale::all(); // Récupère toutes les espèces végétales
        return view('articles.create', compact('especesVegetales')); // Passe la variable $especesVegetales à la vue
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->validate([
            'nom' => 'required|string|max:45|min:2',
            'prix_unitaire' => 'required|min:1',
            'espece_vegetale' => 'required'
        ])) {
            $nom = $request->input('nom');
            $prix_unitaire = $request->input('prix_unitaire');
            $espece_vegetale_id = $request->input('espece_vegetale');
            $article = new Article();
            $article->nom = $nom;
            $article->prix_unitaire = $prix_unitaire;
            $article->especeVegetale()->associate(EspeceVegetale::find($espece_vegetale_id));
            $article->save();
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
        $article = Article::find($id);
        $article->with('categories')->get();

        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Article::destroy($id);
        return redirect()->route('articles.index');
    }
}
