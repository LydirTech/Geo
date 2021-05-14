<?php

namespace App\Http\Controllers;

use App\Chauffeur;
use App\Navette;
use Illuminate\Http\Request;

class ChauffeurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('manage_chauffeur');

        $chauffeurQuery = Chauffeur::query();
        $chauffeurQuery->where('name', 'like', '%'.request('q').'%');
        $chauffeurs = $chauffeurQuery->paginate(10);

        return view('chauffeurs.index', compact('chauffeurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', new Chauffeur);

        $listNavet = Navette::all();

        return view('chauffeurs.create',compact('listNavet'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Chauffeur);

        $newChauffeur = $request->validate([
            'name'      => 'required|max:60',
            'num_tel'  => 'nullable|integer',
            'navette_id'  => 'nullable|integer',
        ]);

        $newChauffeur['creator_id'] = auth()->id();

        $chauffeur = Chauffeur::create($newChauffeur);

        return redirect()->route('chauffeurs.index', $chauffeur);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chauffeur  $chauffeur
     * @return \Illuminate\Http\Response
     */
    public function show(Chauffeur $chauffeur)
    {
        return view('chauffeurs.show', compact('chauffeur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chauffeur  $chauffeur
     * @return \Illuminate\Http\Response
     */
    public function edit(Chauffeur $chauffeur)
    {
        $this->authorize('create', new Chauffeur);

        $listNavet = Navette::all();

        return view('chauffeurs.edit',compact('listNavet','chauffeur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chauffeur  $chauffeur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chauffeur $chauffeur)
    {
        $this->authorize('update', new Chauffeur);

        $newChauffeur = $request->validate([
            'name'      => 'required|max:60',
            'num_tel'  => 'nullable|integer',
            'navette_id'  => 'nullable|integer',
        ]);

        $newChauffeur['creator_id'] = auth()->id();

        $chauffeur->update($newChauffeur);

        return redirect()->route('chauffeurs.index', $chauffeur);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chauffeur  $chauffeur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Chauffeur $chauffeur)
    {
        $this->authorize('delete', $chauffeur);

        $request->validate(['chauffeur_id' => 'required']);

        if ($request->get('chauffeur_id') == $chauffeur->id && $chauffeur->delete()) {
            return redirect()->route('chauffeurs.index');
        }

        return back();
    }
}
