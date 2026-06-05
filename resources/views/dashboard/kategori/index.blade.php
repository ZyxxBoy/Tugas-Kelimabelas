<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Kategori Produk') }}
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
                <a href="{{ route('dashboard.kategori.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    + Tambah Kategori
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-x-auto">
                    <table id="categoryTable" class="w-full whitespace-no-wrap display">
                        <thead>
                            <tr class="text-left font-bold border-b border-gray-200">
                                <th class="px-6 py-3">ID</th>
                                <th class="px-6 py-3">Nama Kategori</th>
                                <th class="px-6 py-3">Slug</th>
                                <th class="px-6 py-3">Jumlah Produk</th>
                                <th class="px-6 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $kategori)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="px-6 py-4">{{ $kategori->id }}</td>
                                    <td class="px-6 py-4">{{ $kategori->name }}</td>
                                    <td class="px-6 py-4">{{ $kategori->slug }}</td>
                                    <td class="px-6 py-4">{{ $kategori->products_count ?? 0 }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center space-x-4">
                                            <a href="{{ route('dashboard.kategori.edit', $kategori->id) }}" class="text-blue-500 hover:text-blue-700 font-semibold">Edit</a>
                                            <form action="{{ route('dashboard.kategori.destroy', $kategori->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada data kategori.</td>
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
            $('#categoryTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
                }
            });
        });
    </script>
</x-app-layout>
