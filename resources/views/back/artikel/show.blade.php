@extends('back.layout.template')

@section('title', 'List Artikels - Admin')

@section('content')
    {{-- content --}}
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Detail Artikel</h1>
        </div>

        <div class="mt-3">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Title</th>
                    <td>: {{ $artikel->title }}</td>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <td>: {{ $artikel->kategori->name }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>: {{ $artikel->desc }}</td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td>
                        <img src="{{ asset('storage/back/' . $artikel->img) }}" alt="">
                    </td>
                </tr>
                <tr>
                    <th>Views</th>
                    <td>: {{ $artikel->views }}x</td>
                </tr>
                <tr>
                    <th>Status</th>
                    @if ($artikel->status == 1)
                        <td>: <span class="badge bg-success">Published</span></td>
                    @else
                        <td>: <span class="badge bg-danger">Private</span></td>
                    @endif
                </tr>
                <tr>
                    <th>Publish Date</th>
                    <td>: {{ $artikel->publish_date }}</td>
                </tr>

                <div class="float-end">
                    <a href="{{ url('artikel') }}" class="btn btn-secondary">Back</a>
                </div>
            </table>
        </div>

    </main>
@endsection
