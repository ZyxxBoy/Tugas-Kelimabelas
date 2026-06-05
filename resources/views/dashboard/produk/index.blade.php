<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Produk') }}
        </h2>
        <!-- DataTables CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="mb-4 flex justify-end">
                <a href="{{ route('dashboard.produk.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    + Tambah Produk
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-x-auto">
                    <table id="productTable" class="w-full whitespace-no-wrap display">
                        <thead>
                            <tr class="text-left font-bold border-b border-gray-200">
                                <th class="px-6 py-3">ID</th>
                                <th class="px-6 py-3">Gambar</th>
                                <th class="px-6 py-3">Nama Produk</th>
                                <th class="px-6 py-3">Kategori</th>
                                <th class="px-6 py-3">Harga</th>
                                <th class="px-6 py-3">Stok</th>
                                <th class="px-6 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $produk)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="px-6 py-4">{{ $produk->id }}</td>
                                    <td class="px-6 py-4">
                                        @if($produk->image)
                                            <img src="{{ asset('storage/' . $produk->image) }}" alt="{{ $produk->name }}" class="w-16 h-16 object-cover rounded">
                                        @else
                                            <span class="text-gray-400 text-sm">Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">{{ $produk->name }}</td>
                                    <td class="px-6 py-4">{{ $produk->category ? $produk->category->name : '-' }}</td>
                                    <td class="px-6 py-4">Rp {{ number_format($produk->price, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4">{{ $produk->stock }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center space-x-4">
                                            <a href="{{ route('dashboard.produk.edit', $produk->id) }}" class="text-blue-500 hover:text-blue-700 font-semibold">Edit</a>
                                            <form action="{{ route('dashboard.produk.destroy', $produk->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-4 text-center text-gray-500">Belum ada data produk.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#productTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
                }
            });
        });
    </script>
</x-app-layout>
