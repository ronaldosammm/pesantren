<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Program;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /* =========================================================
       PUBLIK
       ========================================================= */

    // Tampilkan form pendaftaran publik
    public function create()
    {
        $program = Program::all();
        return view('user.pendaftaran', compact('program'));
    }

    // Simpan pendaftaran dari form publik
    public function store(Request $request)
    {
        $validated = $this->validatePendaftaran($request);
        $validated['dokumen'] = $this->handleUpload($request);

        Pendaftaran::create($validated);

        return back()->with('success', 'Pendaftaran berhasil dikirim. Tim kami akan menghubungi Anda melalui email atau WhatsApp.');
    }

    /* =========================================================
       ADMIN
       ========================================================= */

    // Daftar seluruh pendaftar, dengan filter status opsional
    public function index(Request $request)
    {
        $query = Pendaftaran::with('program')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $pendaftaran = $query->paginate(10)->withQueryString();

        return view('admin.pendaftaran.index', compact('pendaftaran'));
    }

    // Tampilkan form tambah pendaftar (input manual oleh admin)
    public function adminCreate()
    {
        $program = Program::all();
        return view('admin.pendaftaran.create', compact('program'));
    }

    // Simpan pendaftar baru yang diinput admin
    public function adminStore(Request $request)
    {
        $validated = $this->validatePendaftaran($request);
        $validated['dokumen'] = $this->handleUpload($request);
        $validated['status'] = $request->input('status', 'baru');
        $validated['catatan_admin'] = $request->input('catatan_admin');

        Pendaftaran::create($validated);

        return redirect()->route('pendaftaran.index')->with('success', 'Data pendaftar berhasil ditambahkan.');
    }

    // Tampilkan form edit pendaftar
    public function edit($id)
    {
        $item = Pendaftaran::findOrFail($id);
        $program = Program::all();
        return view('admin.pendaftaran.edit', compact('item', 'program'));
    }

    // Update data pendaftar (termasuk status & catatan admin)
    public function update(Request $request, $id)
    {
        $item = Pendaftaran::findOrFail($id);

        $validated = $this->validatePendaftaran($request);
        $validated['status'] = $request->validate([
            'status' => 'required|in:baru,diproses,diterima,ditolak',
        ])['status'];
        $validated['catatan_admin'] = $request->input('catatan_admin');

        if ($request->hasFile('dokumen')) {
            if ($item->dokumen && file_exists(public_path('uploads/pendaftaran/' . $item->dokumen))) {
                unlink(public_path('uploads/pendaftaran/' . $item->dokumen));
            }
            $validated['dokumen'] = $this->handleUpload($request);
        }

        $item->update($validated);

        return redirect()->route('pendaftaran.index')->with('success', 'Data pendaftar berhasil diperbarui.');
    }

    // Hapus data pendaftar
    public function destroy($id)
    {
        $item = Pendaftaran::findOrFail($id);

        if ($item->dokumen && file_exists(public_path('uploads/pendaftaran/' . $item->dokumen))) {
            unlink(public_path('uploads/pendaftaran/' . $item->dokumen));
        }

        $item->delete();

        return back()->with('success', 'Data pendaftar berhasil dihapus.');
    }

    /* =========================================================
       HELPER
       ========================================================= */

    private function validatePendaftaran(Request $request): array
    {
        return $request->validate([
            'program_id'    => 'required|exists:program,id',
            'nama_lengkap'  => 'required|string|max:255',
            'nama_wali'     => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'no_telepon'    => 'required|string|max:20',
            'alamat'        => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'dokumen'       => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ], [
            'program_id.required' => 'Silakan pilih program yang diikuti.',
            'dokumen.mimes'        => 'Dokumen harus berformat PDF, JPG, atau PNG.',
            'dokumen.max'          => 'Ukuran dokumen maksimal 2MB.',
        ]);
    }

    private function handleUpload(Request $request): ?string
    {
        if (! $request->hasFile('dokumen')) {
            return null;
        }

        $file = $request->file('dokumen');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/pendaftaran'), $filename);

        return $filename;
    }
}