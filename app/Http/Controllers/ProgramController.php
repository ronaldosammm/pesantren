<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class ProgramController extends Controller
{
    public function index()
{
    $program = Program::all();

    return view('admin.programAdmin.index', compact('program'));
}

   public function create()
{
    return view('admin.programAdmin.create');
}

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_program' => 'required',
            'deskripsi_program' => 'required',
            'durasi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();

            $gambar->move(public_path('uploads/program'), $namaGambar);

            $data['gambar'] = $namaGambar;
        }

        Program::create($data);

        return redirect()->route('program.index')
            ->with('success', 'Program berhasil ditambahkan');
    }

    public function edit($id)
    {
        $program = Program::findOrFail($id);

        return view('admin.program.edit', compact('program'));
    }

    public function update(Request $request, $id)
    {
        $program = Program::findOrFail($id);

        $data = $request->validate([
            'nama_program' => 'required',
            'deskripsi_program' => 'required',
            'durasi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();

            $gambar->move(public_path('uploads/program'), $namaGambar);

            $data['gambar'] = $namaGambar;
        }

        $program->update($data);

        return redirect()->route('program.index')
            ->with('success', 'Program berhasil diupdate');
    }

    public function destroy($id)
    {
        $program = Program::findOrFail($id);

        $program->delete();

        return redirect()->route('program.index')
            ->with('success', 'Program berhasil dihapus');
    }

    public function userProgram()
{
    $program = Program::all();

    return view('user.program', compact('program'));
}

public function home()
{
    $program = Program::all();

    return view('user.index', compact('program'));
}

}