<x-appadmin-layout>
    <div class="container mt-5">
        <h1>Edit Produk</h1>

        <form action="/admin/product/{{ $product->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="{{ old('kode_barang', $product->kode_barang) }}">
            </div>

            <div class="mb-3">
                <label for="name_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="name_barang" name="name_barang" value="{{ old('name_barang', $product->name_barang) }}" required>
            </div>

            <div class="mb-3">
                <label for="satuan" class="form-label">Satuan</label>
                <input type="text" class="form-control" id="satuan" name="satuan" value="{{ old('satuan', $product->satuan) }}" required>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" step="0.01" class="form-control" id="harga" name="harga" value="{{ old('harga', $product->harga) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Produk</button>
        </form>
    </div>
</x-appadmin-layout>
