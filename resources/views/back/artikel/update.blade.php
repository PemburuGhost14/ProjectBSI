@extends('back.layout.template')

@section('title', 'create artikel - Admin')

@section('content')
    {{-- content --}}
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Update</h1>
        </div>

        <div class="mt-3">

            @if ($errors->any())
                <div class="my-3">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <a href=""></a> <!-- Closing the <a> tag properly -->

            <form action="{{ url('artikel/' . $artikel->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <input type="hidden" name="oldImg" value="{{ $artikel->img }}">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ old('title', $artikel->title) }}">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="kategori_id">Category</label>
                            <select name="kategori_id" id="kategori_id" class="form-control">
                                @foreach ($kategoris as $item)
                                    @if ($item->id == $artikel->kategori_id)
                                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="desc">Description</label>
                    <textarea name="desc" id="desc" cols="30" rows="10" class="form-control">{{ old('desc', $artikel->desc) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="img">Image (Max 2mb)</label>
                    <input type="file" id="img" name="img" class="form-control">
                    <div class="mt-2">
                        <small>Gambar Lama</small>
                        <img src="{{ asset('storage/back/' . $artikel->img) }}" alt="" width="88px">
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ $artikel->status == 1 ? 'selected' : null }}>Publish</option>
                                <option value="0" {{ $artikel->status == 0 ? 'selected' : null }}>Private</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="publish_date">Publish Date</label>
                            <input type="date" class="form-control" id="publish_date" name="publish_date"
                                value="{{ old('publish_date', $artikel->publish_date) }}">
                        </div>
                    </div>
                </div>

                <div class="float-end">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </main>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
@endpush
