@extends('layouts.default');

@section('content')
    <div class="orders">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h4 class="box-title">Daftar Barang</h4>
            </div>
            <div class="card-body--">
              <div class="table-stats order-table ov-h">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($items as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->type }}</td>
                      <td>{{ $item->price }}</td>
                      <td>{{ $item->quantity }}</td>
                      <td>
                        {{-- <a href="{{ route('products.gallery') }}" class="btn btn-info btn-sm"> --}}
                        <a href="#" class="btn btn-info btn-sm">
                          <i class="fa fa-picture-o"></i>
                        </a>
                        <a href="{{ route('product.edit', $item->id) }}" class="btn btn-primary btn-sm">
                        {{-- <a href="#" class="btn btn-primary btn-sm"> --}}
                          <i class="fa fa-pencil"></i>
                        </a>
                        <button class="btn btn-danger btn-sm" 
                          data-toggle="modal" 
                          data-target="#deleteConfirmationModal{{ $item->id }}">
                          <i class="fa fa-trash "></i>
                      </button>
                      </td> 
                    </tr>
                    @empty
                        <tr>
                          <td colspan="6" class="text-center p-5">
                            <h1>Data tidak tersedia</h1>
                          </td>
                        </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@foreach ($items as $item)
    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="deleteConfirmationModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel{{ $item->id }}">Konfirmasi Penghapusan</h5>
                    <a type="button" data-dismiss="modal" 
                      aria-label="Close" aria-hidden="true" 
                      class="text-danger fs-4 fw-bolder">
                      <i class="fa fa-times-circle"></i>
                    </a>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus produk "{{ $item->name }}"?
                </div>
                <div class="modal-footer d-flex align-items-start justify-content-end">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <form action="{{ route('product.destroy', $item->id) }}" method="post" class="mr-2">
                      @method('delete')
                      @csrf
                      <button type="submit" class="btn btn-danger">Hapus</button>
                  </form>
              </div>
              
            </div>
        </div>
    </div>
@endforeach