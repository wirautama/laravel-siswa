<?php

namespace App\Http\Controllers;

use App\Models\MapelSiswa;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::get();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('master.siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'avatar' => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ]);

        $avatar = $request->file('avatar');
        $filename = date('Y-m-d') . $avatar->getClientOriginalName();
        $path = 'avatar/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($avatar));

        Siswa::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'avatar' => $filename,
        ]);

        Alert::success('Sukses', 'Berhasil Menambakan Data');
        return redirect('/admin/siswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $siswa = Siswa::find($id);

        return view('master.siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = Siswa::find($id);
        return view('master.siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'avatar' => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ]);


        if ($request->hasFile('avatar')) {

            $avatar = $request->file('avatar');
            $filename = date('Y-m-d') . $avatar->getClientOriginalName();
            $path = 'avatar/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($avatar));

            $update = [
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'avatar' => $filename,
            ];
        } else {
            $update = [
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
            ];
        }
        Siswa::where('id', $id)->update($update);
        Alert::success('Sukses', 'Berhasil MengUpdate Data');
        return redirect('/admin/siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::destroy($id);

        if ($siswa) {
            Alert::success('Sukses', 'Berhasil Menghapus Data');
            return redirect('/admin/siswa')->with('success', 'Data Berhasil di Hapus');
        } else {

            return redirect('/admin/siswa')->with('error', 'Data Gagal di Hapus');
        }
    }

    public function mapelSiswa(string $id)
    {
        $mapelSiswa = MapelSiswa::find($id)->with('siswa', 'mapel', 'jurusan')->get();
        return view('mapel-siswa.index', compact('mapelSiswa'));
        // dd($mapelSiswa);
    }
}
