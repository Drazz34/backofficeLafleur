<?php

namespace App\Http\Controllers;

use App\Models\EspeceVegetale;
use Illuminate\Http\Request;

class EspeceVegetaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $especesVegetales = EspeceVegetale::orderBy('id')->get();

        return view('especesVegetales.index', ['especesVegetales' => $especesVegetales]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $especesVegetales = EspeceVegetale::all();
        return view('especesVegetales.create', compact('especesVegetales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->validate([
            'nom' => 'required|string|max:45|min:2'
        ])) {
            $nom = $request->input('nom');

            $especeVegetale = new EspeceVegetale();
            $especeVegetale->nom = $nom;
            $especeVegetale->save();

            return redirect()->route('especesVegetales.show', $especeVegetale->id);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $especeVegetale = EspeceVegetale::find($id);
        $articles = $especeVegetale->articles;
        return view('especesVegetales.show', compact('especeVegetale', 'articles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $especeVegetale = EspeceVegetale::find($id);
        
        return view('especesVegetales.edit', compact('especeVegetale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->validate([
            'nom' => 'required|string|max:45|min:2'
        ])) {
            $nom = $request->input('nom');
            $especeVegetale = EspeceVegetale::find($id);
            $especeVegetale->nom = $nom;
            $especeVegetale->save();
            return redirect()->route('especesVegetales.show', $especeVegetale->id);
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
        $especeVegetale = EspeceVegetale::findOrFail($id);
        $especeVegetale->delete();
        return redirect()->route('especesVegetales.index');
    }
}
