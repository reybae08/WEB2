<x-appadmin-layout>
    <div class="container mt-5">
        <h1>Daftar Produk</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="/admin/product/create" class="btn btn-primary mb-3">Tambah Produk</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->kode_barang }}</td>
                        <td>{{ $product->name_barang }}</td>
                        <td>{{ $product->satuan }}</td>
                        <td>Rp {{ number_format($product->harga, 2, ',', '.') }}</td>
                        <td>
                            <a href="/admin/product/{{ $product->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                            <form action="/admin/product/{{ $product->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-appadmin-layout>