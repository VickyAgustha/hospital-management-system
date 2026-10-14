<?php
namespace App\Http\Controllers;

use App\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        return response()->json(Pasien::all());
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $pasien = Pasien::create($data);
        return response()->json($pasien, 201);
    }

    public function show($id)
    {
        return response()->json(Pasien::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->all());
        return response()->json($pasien);
    }

    public function destroy($id)
    {
        Pasien::destroy($id);
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
