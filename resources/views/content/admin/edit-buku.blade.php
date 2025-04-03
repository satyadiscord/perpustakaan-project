<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Buku</h1>

        <form action="{{ route('bukus.update', $buku->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PATCH') {{-- Ubah menjadi PATCH untuk edit --}}

            {{-- Judul --}}
            <div class="mb-4">
                <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul:</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul', $buku->judul) }}" required 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('judul')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            {{-- ISBN --}}
            <div class="mb-4">
                <label for="isbn" class="block text-gray-700 text-sm font-bold mb-2">ISBN:</label>
                <input type="text" name="isbn" id="isbn" value="{{ old('isbn', $buku->isbn) }}" required 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('isbn')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            {{-- Penulis --}}
            <div class="mb-4">
                <label for="penulis" class="block text-gray-700 text-sm font-bold mb-2">Penulis:</label>
                <input type="text" name="penulis" id="penulis" value="{{ old('penulis', $buku->penulis) }}" required 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('penulis')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            {{-- Penerbit --}}
            <div class="mb-4">
                <label for="penerbit" class="block text-gray-700 text-sm font-bold mb-2">Penerbit:</label>
                <input type="text" name="penerbit" id="penerbit" value="{{ old('penerbit', $buku->penerbit) }}" required 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('penerbit')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tahun Terbit --}}
            <div class="mb-4">
                <label for="tahun_terbit" class="block text-gray-700 text-sm font-bold mb-2">Tahun Terbit:</label>
                <select name="tahun_terbit" id="tahun_terbit"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @for ($tahun = 1900; $tahun <= date('Y'); $tahun++)
                        <option value="{{ $tahun }}" {{ old('tahun_terbit', $buku->tahun_terbit) == $tahun ? 'selected' : '' }}>{{ $tahun }}</option>
                    @endfor
                </select>
                @error('tahun_terbit')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            {{-- Cover Buku --}}
            <div class="mb-4">
                <label for="cover_buku" class="block text-gray-700 text-sm font-bold mb-2">Cover Buku:</label>
                <input type="file" name="cover_buku" id="cover_buku"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('cover_buku')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror

                {{-- Tampilkan gambar cover saat ini --}}
                @if ($buku->cover_buku)
                    <img src="{{ asset('storage/' . $buku->cover_buku) }}" alt="Cover Buku" class="mt-3 w-32">
                @endif
            </div>

            {{-- Deskripsi --}}
            <div class="mb-4">
                <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi:</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('deskripsi', $buku->deskripsi) }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            {{-- Kategori --}}
            <div class="mb-4">
                <label for="kategori_id" class="block text-gray-700 text-sm font-bold mb-2">Kategori:</label>
                <select name="kategori_id" id="kategori_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ old('kategori_id', $buku->kategori_id) == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->name }}
                        </option>
                    @endforeach
                </select>
                @error('kategori_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            {{-- Stok Buku --}}
            <div class="mb-4">
                <label for="stok_buku" class="block text-gray-700 text-sm font-bold mb-2">Stok Buku:</label>
                <input type="number" name="stok_buku" id="stok_buku" value="{{ old('stok_buku', $buku->stok_buku) }}" readonly 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex items-center gap-x-5">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update
                </button>
                <a href="{{ route('buku.bukuDetail', $buku->judul) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Batal
                </a>
            </div>
        </form>
    </div>
</body>
</html>
