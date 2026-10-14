<?php
namespace App\Http\Controllers;

use App\Poli;
use Illuminate\Http\Request;


   class PoliController extends Controller
{
    public function index()
    {
        return response()->json(Poli::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_poli' => 'required|string|max:100',
        ]);

        $poli = Poli::create($validated);
        return response()->json($poli, 201);
    }

    public function show($id)
    {
        $poli = Poli::find($id);
        if (!$poli) {
            return response()->json(['message' => 'Poli tidak ditemukan'], 404);
        }
        return response()->json($poli);
    }

    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'nama_poli' => 'required|string|max:255',
    ]);

    $poli = Poli::find($id);
    if (!$poli) {
        return response()->json(['message' => 'Poli tidak ditemukan'], 404);
    }

    $poli->nama_poli = $validated['nama_poli'];
    $poli->save();

    return response()->json(['message' => 'Poli berhasil diperbarui']);
}

    public function destroy($id)
    {
        $poli = Poli::find($id);
        if (!$poli) {
            return response()->json(['message' => 'Poli tidak ditemukan'], 404);
        }

        $poli->delete();
        return response()->json(['message' => 'Poli berhasil dihapus']);
    }
}