@extends('layouts.default');

@section('content')
  <div class="card">
    <div class="card-header">
      <strong>Tambah Foto Barang</strong>
    </div>
    <div class="card-body card-block ">
      <form action="{{ route('product-galleries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
          <label for="products_id" class="form-control-label">Nama Barang</label>
          <select name="products_id"
            class="form-control @error('products_id') is-invalid @enderror"
          >
            @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
          </select>
          @error('products_id') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
        <div class="form-group mb-3">
          <label for="photo" class="form-control-label">Foto Barang</label>
          <input type="file"
            name="photo" 
            value="{{ old('photo') }}"
            accept="image/*"
            required
            class="form-control @error('photo') is-invalid @enderror"/>
          @error('photo') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
        <div class="form-group mb-3 d-flex flex-column">
          <label for="is_default" class="form-control-label">Jadikan Default</label>
          <div class="form-check ">
            <input class="form-check-input @error('is_default') is-invalid @enderror"
              type="radio" 
              name="is_default" 
              id="inlineRadio1" 
              value="1">
            <label class="form-check-label" for="inlineRadio1">Ya</label>
          </div>
          <div class="form-check">
            <input class="form-check-input @error('is_default') is-invalid @enderror" 
              type="radio" 
              name="is_default" 
              id="inlineRadio2" 
              value="0">
            <label class="form-check-label" for="inlineRadio2">Tidak</label>
          </div>  
          @error('is_default') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
          <button class="btn btn-primary btn-block" type="submit">
            Tambah Foto Barang
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection 