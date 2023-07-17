<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusan = Jurusan::get();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('master.jurusan.index', compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $cek = Jurusan::count();
        if ($cek == 0) {
            $urut = 001;
            $kode = 'JRS-' . $urut;
        } else {
            $ambil = Jurusan::all()->last();
            $urut = substr($ambil->id, -3) + 1;
            $nomor = 'JRS-00' . $urut;
        }
        return view('master.jurusan.create', compact('nomor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kd_jurusan' => 'required|unique:jurusan,kd_jurusan|min:7',
            'nama_jurusan' => 'required'
        ]);
        Jurusan::create([
            'kd_jurusan' => $request->kd_jurusan,
            'nama_jurusan' => $request->nama_jurusan,
        ]);

        Alert::success('Sukses', 'Berhasil Menambakan Data');
        return redirect('/admin/jurusan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jurusan = Jurusan::find($id);
        return view('master.jurusan.show', compact('jurusan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jurusan = Jurusan::find($id);
        return view('master.jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kd_jurusan' => 'required|min:7',
            'nama_jurusan' => 'required'
        ]);
        $update = [
            'kd_jurusan' => $request->kd_jurusan,
            'nama_jurusan' => $request->nama_jurusan,
        ];
        Jurusan::where('id', $id)->update($update);
        Alert::success('Sukses', 'Berhasil MengUpdate Data');
        return redirect('/admin/jurusan');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jurusan = Jurusan::destroy($id);

        if ($jurusan) {
            Alert::success('Sukses', 'Berhasil Menghapus Data');
            return redirect('/admin/jurusan')->with('success', 'Data Berhasil di Hapus');
        } else {

            return redirect('/admin/jurusan')->with('error', 'Data Gagal di Hapus');
        }
    }
}
