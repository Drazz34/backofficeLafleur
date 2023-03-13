<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commandes = Commande::orderBy('id')->get();

         // Récupérer toutes les commandes en cours et passées
         $commandesLivrees = Commande::where('date_livraison_souhaitee', '<', Carbon::today())->orderBy('date_livraison_souhaitee', 'asc')->get();
         // Récupérer toutes les commandes à venir
         $commandesAVenir = Commande::where('date_livraison_souhaitee', '>=', Carbon::today())->orderBy('date_livraison_souhaitee', 'asc')->get();
 

        return view('commandes.index', compact('commandes', 'commandesLivrees', 'commandesAVenir'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $commande = Commande::find($id);
        $articles = $commande->articles;
       
        return view('commandes.show', compact('commande', 'articles'));
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
        //
    }
}
