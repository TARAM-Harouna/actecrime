<?php
namespace App\Http\Controllers;

use App\Models\TypeActe;
use Illuminate\Http\Request;

class TypeActeController extends Controller
{
    /**
     * Display a listing of the type actes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeActes = TypeActe::all();
        return view('pages.typeacte', compact('typeActes'));
    }

    /**
     * Show the form for creating a new type acte.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type_actes.create');
    }

    /**
     * Store a newly created type acte in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation des données reçues du formulaire
        $validatedData = $request->validate([
            'nom' => 'required',
        ]);

        // Création du type acte avec les données validées
        TypeActe::create($validatedData);

        return redirect()->route('acte_crimes.index')->with('success', 'Le type acte a été créé avec succès.');
    }
}

