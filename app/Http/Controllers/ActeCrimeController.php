<?php

namespace App\Http\Controllers;

use App\Models\ActeCrime;
use Illuminate\Http\Request;

class ActeCrimeController extends Controller
{
    /**
     * Display a listing of the acte crimes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acteCrimes = ActeCrime::all();
        return view('pages.tables', compact('acteCrimes'));
    }

    /**
     * Show the form for creating a new acte crime.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('acte_crimes.create');
    }

    /**
     * Store a newly created acte crime in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation des données reçues du formulaire
        $validatedData = $request->validate([
            'typeacte_id' => 'required|exists:typeactes,id',
            'commentaire' => 'nullable',
            'lieu' => 'required',
            'region' => 'required',
            'date' => 'required|date',
            'heure' => 'required',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
        ]);

        // Création de l'acte crime avec les données validées
        ActeCrime::create($validatedData);

        return redirect()->route('acte_crimes.index')->with('success', 'L\'acte crime a été créé avec succès.');
    }
}
