@foreach ($kategori as $item)
<div class="modal fade" id="modalDelete{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete kategori</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ url('kategori/'.$item->id) }}" method="post">
            @method('DELETE')
            @csrf

            <div class="mb-3">
                <p>Are you sure kategori, name <u>{{ $item->name }}</u>, delete...</p>    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endforeach                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       