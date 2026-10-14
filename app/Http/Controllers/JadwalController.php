<?php

namespace App\Http\Controllers;

use App\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::with('dokter')->get();
        return response()->json($jadwals)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required|string',
            'jam_masuk' => 'required|date_format:H:i',
            'jam_keluar' => 'required|date_format:H:i|after:jam_masuk',
            'id_dokter' => 'required|exists:dokter,id_dokter'
        ]);

        $jadwal = Jadwal::create($request->all());
        
        return response()->json($jadwal, 201)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }

    public function show($id)
    {
        $jadwal = Jadwal::with('dokter')->findOrFail($id);
        return response()->json($jadwal)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'hari' => 'required|string',
            'jam_masuk' => 'required|date_format:H:i',
            'jam_keluar' => 'required|date_format:H:i',
            'id_dokter' => 'required|exists:dokter,id_dokter'
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->all());
        
        return response()->json($jadwal)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }

    public function destroy($id)
{
    try {
        $jadwal = Jadwal::where('id_jadwal', $id)->firstOrFail();
        $jadwal->delete();

        return response()->json(null, 204);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Gagal menghapus jadwal',
            'error' => $e->getMessage()
        ], 500);
    }
}
}