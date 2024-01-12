<?php

namespace App\Http\Controllers\Back;

use App\Models\Article;
use App\Models\kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArtikelRequest;
use App\Http\Requests\UpdateArtikelRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $artikel = Article::with('Kategori')->latest()->get();

            return DataTables::of($artikel)
                ->addColumn('kategori_id', function ($artikel) {
                    return $artikel->Kategori->name;
                })
                ->addIndexcolumn()
                ->addColumn('status', function ($artikel) {
                    if ($artikel->status == 0) {
                        return '<span class="badge bg-danger">Private</span>';
                    } else {
                        return '<span class="badge bg-success">Published</span>';
                    }
                })
                ->addColumn('button', function ($artikel) {
                    return '<div class="text-center">
                                <a href="artikel/' . $artikel->id . '" class="btn btn-secondary">Detail</a>
                                <a href="artikel/' . $artikel->id . '/edit" class="btn btn-primary">Edit</a>
                                <a href="#" onclick="destroyArtikel(this)" data-id="' . $artikel->id . '" class="btn btn-danger">Delete</a>
                            </div>';
                })
                ->rawColumns(['kategori_id', 'status', 'button'])
                ->make();
        }
        return view('back.artikel.index',);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.artikel.create', [
            'kategoris' => kategori::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArtikelRequest $request)
    {
        $data = $request->validated();

        $file = $request->file('img');
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/back/', $filename);

        $data['img'] = $filename;
        $data['slug'] = Str::slug($data['title']);

        Article::create($data);

        return redirect(url('artikel'))->with('success', 'Data saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('back.artikel.show', [
            'artikel' => Article::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('back.artikel.update', [
            'artikel' => Article::find($id),
            'kategoris' => kategori::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArtikelRequest $request, string $id)
    {
        $data = $request->validated();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/back/', $filename);

            Storage::delete('public/back' . $request->oldImg);

            $data['img'] = $filename;
        } else {
            $data['img'] =  $request->oldimg;
        }

        $data['slug'] = Str::slug($data['title']);

        Article::find($id)->update($data);

        return redirect(url('artikel'))->with('success', 'Data saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Article::find($id);
        Storage::delete('public/back/' . $data->img);
        $data->delete();

        return response()->json([
            'message' => 'data deleted successfully'
        ]);
    }
}
