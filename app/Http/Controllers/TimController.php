<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tim;

class TimController extends Controller
{
    // ADMIN INDEX
    public function index()
    {
        $tim = Tim::all();

        return view('admin.TimAdmin.index', compact('tim'));
    }

    // FORM CREATE
    public function create()
    {
        return view('admin.TimAdmin.create');
    }

    // STORE DATA
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        if ($request->hasFile('foto')) {

            $foto = $request->file('foto');

            $namaFoto = time() . '.' . $foto->getClientOriginalExtension();

            $foto->move(public_path('uploads/tim'), $namaFoto);

            $data['foto'] = $namaFoto;
        }

        Tim::create($data);

        return redirect()->route('tim.index')
            ->with('success', 'Data tim berhasil ditambahkan');
    }

    // FORM EDIT
    public function edit($id)
    {
        $tim = Tim::findOrFail($id);

        return view('admin.TimAdmin.edit', compact('tim'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        $tim = Tim::findOrFail($id);

        $data = $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        if ($request->hasFile('foto')) {

            $foto = $request->file('foto');

            $namaFoto = time() . '.' . $foto->getClientOriginalExtension();

            $foto->move(public_path('uploads/tim'), $namaFoto);

            $data['foto'] = $namaFoto;
        }

        $tim->update($data);

        return redirect()->route('tim.index')
            ->with('success', 'Data tim berhasil diupdate');
    }

    // DELETE DATA
    public function destroy($id)
    {
        $tim = Tim::findOrFail($id);

        $tim->delete();

        return redirect()->route('tim.index')
            ->with('success', 'Data tim berhasil dihapus');
    }

    // USER PAGE
    public function userTim()
    {
        $tim = Tim::all();

        return view('user.aboutUs', compact('tim'));
    }
}