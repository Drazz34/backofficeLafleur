<?php

namespace App\Http\Controllers;

use App\Models\Unite;
use Illuminate\Http\Request;

class UniteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unites = Unite::orderBy('id')->get();

        return view('unites.index', ['unites' => $unites]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unites = Unite::all();
        return view('unites.create', compact('unites'));
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

            $unite = new Unite();
            $unite->nom = $nom;
            $unite->save();

            return redirect()->route('unites.show', $unite->id);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $unite = Unite::find($id);
        $articles = $unite->articles;
        return view('unites.show', compact('unite', 'articles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $unite = Unite::find($id);
        
        return view('unites.edit', compact('unite'));
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

            $unite = Unite::find($id);
            $unite->nom = $nom;
            $unite->save();

            return redirect()->route('unites.show', $unite->id);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unite = Unite::findOrFail($id);
        $unite->delete();
        return redirect()->route('unites.index');
    }
}
