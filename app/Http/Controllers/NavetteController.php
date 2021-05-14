<?php

namespace App\Http\Controllers;

use App\Outlet;
use App\Navette;
use Illuminate\Http\Request;

class NavetteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('manage_navette');


        $navetteQuery = Navette::query();
        $navetteQuery->where('name', 'like', '%'.request('q').'%');
        $navettes = $navetteQuery->paginate(10);

        return view('navettes.index', compact('navettes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', new Navette);

        $listEtab = Outlet::all();

        return view('navettes.create',compact('listEtab'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Outlet);

        $newNavette = $request->validate([
            'name'      => 'required|max:60',
            'etabA_id'  => 'nullable|integer',
            'etabB_id'  => 'nullable|integer',
        ]);

        $newNavette['creator_id'] = auth()->id();

        $navette = Navette::create($newNavette);

        return redirect()->route('navettes.show', $navette);
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Navette $navette
     * @return \Illuminate\Http\Response
     */
    public function show(Navette $navette)
    {
        return view('navettes.show', compact('navette'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Navette $navette)
    {
        $this->authorize('update', $navette);
        $listEtab = Outlet::all();

        return view('navettes.edit', compact('navette','listEtab'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Navette $navette)
    {
        $this->authorize('update', new Outlet);

        $newNavette = $request->validate([
            'name'      => 'required|max:60',
            'etabA_id'  => 'nullable|integer',
            'etabB_id'  => 'nullable|integer',
        ]);

        $newNavette['creator_id'] = auth()->id();

        $navette->update($newNavette);

        return redirect()->route('navettes.show', $navette);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Navette $navette)
    {
        $this->authorize('delete', $navette);

        $request->validate(['navette_id' => 'required']);

        if ($request->get('navette_id') == $navette->id && $navette->delete()) {
            return redirect()->route('navettes.index');
        }

        return back();
    }


}
