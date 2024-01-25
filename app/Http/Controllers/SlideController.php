<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.slide.index')->with([
            'slides' => Slide::all(),
            'title' => 'Slide',
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */

    /*
    untuk file yang berisis dimana user bisa menginputkan lalu untuk prose pengiriman
    di kirim ke sebuah Request Dari Field From

     */
    public function create()
    {
        return view('dashboard.slide.slide-baru')->with([
            'title' => 'Slide',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    // ! digunakan saat user mereques dari form html
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'judul' => 'required|max:50',
            'gambar' => 'image|file|max:1024',
            'kutipan' => 'required|max:255',
        ], [
            'judul.required' => 'Headline harus diisi',
            'judul.max' => 'Maximal 50 Charakter',
            'gambar.image' => 'File yang anda upload bukan gambar',
            'gambar.max' => 'File yang anda upload max 1 MB',
            'kutipan.required' => 'Kutipan harus diisi',
            'kutipan.max' => 'Maximal 255 karakter',
        ]);

        if ($request->file('gambar')) {
            $nama_gambar = $request->file('gambar')->hashName();
            $request->file('gambar')->move(public_path('image'), $nama_gambar);
            $validasi['gambar'] = $nama_gambar;
        }
        Slide::create($validasi);
        return back()->with('info', 'SLide baru berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    //  ! Mengedit data
    public function edit(string $id)
    {
        $slideEdit = Slide::where('id', $id)->first();
        // $slideEdit = Slide::findOrFail($id);

        return view('dashboard.slide.slide-edit')->with([
            'title' => 'Slide',
            'data' => $slideEdit,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'judul' => 'required|max:50',
            'gambar' => 'image|file|max:1024',
            'kutipan' => 'required|max:255',
        ], [
            'judul.required' => 'Headline harus diisi',
            'judul.max' => 'Maximal 50 Charakter',
            'gambar.image' => 'File yang anda upload bukan gambar',
            'gambar.max' => 'File yang anda upload max 1 MB',
            'kutipan.required' => 'Kutipan harus diisi',
            'kutipan.max' => 'Maximal 255 karakter',
        ]);

        // * cek gambar
        if ($request->file('gambar')) {
            if ($request->gambarLama) {
                File::file('gambar')->move(public_path('image/' . $request->gambarLama));
                # code...
            }
            $nama_gambar = $request->file('gambar')->hashName();
            $request->file('gambar')->move(public_path('image'), $nama_gambar);
            $validasi['gambar'] = $nama_gambar;
        }
        Slide::where('id', $id)->update($validasi);
        return redirect('/dashboard/slide')->with('info', 'Slide Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    //  ! menghapus data
    public function destroy(string $id)
    {
        // untuk menampung data
        $data = Slide::where('id', $id)->first();
        // mengecek data
        if ($data->gambar) {
            File::delete(public_path('image/') . $data->gambar);
        }
        Slide::where('id', $id)->delete();

        return back()->with('info', 'Slide Berhasil dihapus');
    }
}
