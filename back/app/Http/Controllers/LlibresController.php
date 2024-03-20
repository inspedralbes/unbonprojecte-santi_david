<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Llibre;

class LlibresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Llibre::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titol' => 'required|string',
            'autor' => 'required|string',
            'any' => 'required|integer',
            'editorial' => 'required|string',
            'pagines' => 'required|integer',
            'isbn' => 'required|string',
            'imatge' => 'required|string',
            'sinopsis' => 'required|string'
        ]);

        return Llibre::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Llibre::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $llibre = Llibre::findOrFail($id);
        $llibre->update($request->all());
        return $llibre;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Llibre::destroy($id);
    }
}
