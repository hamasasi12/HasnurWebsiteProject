<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use Illuminate\Http\Request;

class KursusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kursuses = Kursus::latest()->get();
        return view('components.tableView', compact('kursuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.tableTambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'durasi' => 'required|integer',
        ]);

        Kursus::create($request->all());

        return redirect()->route('kursuses.index')
                        ->with('success', 'Kursus Berhasil Dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kursus = Kursus::findOrFail($id);
        $materis = $kursus->materis;
        return view('components.tableShow', compact('kursus', 'materis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kursus = Kursus::findOrFail($id);
        return view('components.tableEdit', compact('kursus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'durasi' => 'required|integer',
        ]);

        $kursus = Kursus::findOrFail($id);
        $kursus->update($request->all());

        return redirect()->route('kursuses.index')
                        ->with('success', 'Kursus Berhasil Diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kursus = Kursus::findOrFail($id);

        $kursus->delete();
    
        return redirect()->route('kursuses.index')
                        ->with('success', 'Kursus Berhasil Didelete.');
    }
}
