<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //  * mengirim data dengan menggunakan with
        return view('dashboard.category.index')->with([
            'categories' => Category::all(),
            'title' => 'Kategori',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.category.category-baru')->with([
            'title' => 'Kategory',
        ]

        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'slug' => 'required|unique:categories',
            'deskripsi' => 'max:255',
        ],
            [
                'name.required' => 'nama kateogir harus diisi',
                'slug.required' => ' kateogir harus diisi',
                'slug.unique' => ' slug sudah ada',
                'deskripsi.max' => ' panjang harus 255',
            ]
        );
        // data dibuat

        Category::create($validasi);
        // data dikemablikan
        return back()->with('info', 'kateogri baru sudah dininput');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }

    public function getSlug(Request $request)
    {
        // Category = nama model
        $slug = SlugService::createSlug(Category::class, 'slug', $request->kategori);
        return response()->json(['slug' => $slug]);

    }
}
