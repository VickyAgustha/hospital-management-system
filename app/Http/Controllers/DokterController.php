<?php
namespace App\Http\Controllers;

use App\Dokter;

use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        return response()->json(Dokter::all());
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_dokter' => 'required|string|max:255',
            'spesialis' => 'required|string|max:255',
            'nomor_kontak' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        $dokter = Dokter::create($validatedData);

        return response()->json([
            'message' => 'Dokter berhasil ditambahkan',
            'data' => $dokter
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_dokter' => 'required|string|max:255',
            'spesialis' => 'required|string|max:255',
            'nomor_kontak' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        $dokter = Dokter::find($id);
        if (!$dokter) {
            return response()->json(['message' => 'Dokter tidak ditemukan'], 404);
        }

        $dokter->update($validated);

        return response()->json(['message' => 'Dokter berhasil diperbarui']);
    }

    public function destroy($id)
    {
        $dokter = Dokter::find($id);
        if (!$dokter) {
            return response()->json(['message' => 'Dokter tidak ditemukan'], 404);
        }

        $dokter->delete();

        return response()->json(['message' => 'Dokter berhasil dihapus']);
    }
}