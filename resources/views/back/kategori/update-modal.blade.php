@foreach ($kategori as $item)
<div class="modal fade" id="modalUpdate{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">update kategori</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ url('kategori/'.$item->id) }}" method="post">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text"  name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $item->name) }}">

                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalUpdate`">Create</>
                >Close</button>
                <button type="submit" class="btn btn-success">Simpan</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endforeach                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       