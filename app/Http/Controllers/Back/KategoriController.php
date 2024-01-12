<?php

namespace App\Http\Controllers\Back;

use App\Models\kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.kategori.index', [
            'kategori' => kategori::latest()->get()
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3'
        ]);

        $data['slug'] = Str::slug($data['name']);

        kategori::create($data);

        return back()->with('Berhasi', 'kategori berhasil dibuat');
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|min:3'
        ]);

        $data['slug'] = Str::slug($data['name']);

        kategori::find($id)->update($data);

        return back()->with('Berhasi', 'update berhasil dibuat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        kategori::find($id)->delete();

        return back()->with('Berhasi', 'Hapus data berhasil');
    }
}
