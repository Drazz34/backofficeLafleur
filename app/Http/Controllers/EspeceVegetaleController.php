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
        $especeVegetale = EspeceVegetale::find($id);
        $articles = $especeVegetale->articles;
        return view('especesVegetales.show', compact('especeVegetale', 'articles'));
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
        $especeVegetale = EspeceVegetale::findOrFail($id);
        $especeVegetale->articles()->detach(); // Supprime les articles associées à la $especeVegetale
        $especeVegetale->delete(); // Supprime la $especeVegetale
        return redirect()->route('especesVegetales.index');
    }
}
