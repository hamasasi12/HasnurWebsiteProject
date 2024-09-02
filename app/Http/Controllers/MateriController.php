<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $kursus_id)
    {
        $kursus = Kursus::findOrFail($kursus_id); // Temukan kursus berdasarkan ID
        return view('components.tableMateriCreate', compact('kursus'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $kursus_id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'link' => 'required',
        ]);

        $kursus = Kursus::findOrFail($kursus_id); // Find the Kursus or fail

        $kursus->materis()->create($request->all());

        return redirect()->route('kursuses.show', $kursus->id)
                        ->with('success', 'Materi Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $materi = Materi::findOrFail($id);
        
        return view('components.TableMateriEdit', compact('materi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'link' => 'required',
        ]);
    
        $materi = Materi::findOrFail($id);
        $materi->update($request->all());
    
        return redirect()->route('kursuses.show', $materi->kursus_id)
                        ->with('success', 'Materi Berhasil Diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $materi = Materi::findOrFail($id);
        $kursus_id = $materi->kursus_id;
        $materi->delete();

        return redirect()->route('kursuses.show', $kursus_id)
                        ->with('success', 'Materi Berhasil Dihapus.');
    }
}
