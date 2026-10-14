<?php
namespace App\Http\Controllers;

use App\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        return response()->json(Staff::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_staff' => 'required|string',
            'jabatan' => 'required|string',
            'nomor_kontak' => 'required|string',
            'email' => 'required|email|unique:staff,email',
        ]);

        $staff = Staff::create($request->all());
        return response()->json($staff, 201);
    }

    public function show($id)
    {
        $staff = Staff::findOrFail($id);
        return response()->json($staff);
    }

    public function update(Request $request, $id)
    {
        $staff = Staff::findOrFail($id);

        $request->validate([
            'nama_staff' => 'required|string',
            'jabatan' => 'required|string',
            'nomor_kontak' => 'required|string',
            'email' => 'required|email|unique:staff,email,' . $id . ',id_staff',
        ]);

        $staff->update($request->all());
        return response()->json($staff);
    }

    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();

        return response()->json(['message' => 'Staff berhasil dihapus']);
    }
}
