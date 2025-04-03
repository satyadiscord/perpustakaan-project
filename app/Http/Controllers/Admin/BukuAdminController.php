<?php

namespace App\Http\Controllers\Admin;

use App\Models\Buku;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;

class BukuAdminController extends Controller
{
    public function buku(): View
    {
        $bukus = Buku::with('kategori')->paginate(10);
        $kategoris = Kategori::all();

        // dd($bukus);
        return view('content.admin.buku', compact(['bukus', 'kategoris']));
    }

    // kategori
    public function filterByCategory($name): View
    {
        $kategoris = Kategori::all();

        // untuk mendapatkan url kategori/name(Pendidikan)
        if($name == 'Semua') {
            $bukus = Buku::paginate(10);
        } else {
            $kategori = Kategori::where('name', $name)->firstOrFail();
            $bukus = Buku::where('kategori_id', $kategori->id)->paginate(10);
        }

        return view('content.admin.buku', compact('bukus', 'kategoris'));
    }

    // detail view
    public function bukuDetail($judul): View
    {
        // cari buku berdasarkan name
        $judulBuku = Buku::where('judul', $judul)->firstOrFail();

        $buku = Buku::findOrFail($judulBuku->id);
        return view('content.admin.detail-buku', compact('buku'));
    }

    // Menampilkan form tambah buku
    public function create(): View
    {
        $kategoris = Kategori::all();
        return view('content.admin.create-buku', compact('kategoris'));
    }

    // Menyimpan buku baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isbn' => [
                'required',
                'string',
                'regex:/^\d{3}-\d{3,5}-\d{3,5}-\d{1,7}-\d{1}$/' // berupa contoh angka (978-602-8519-77-3)
            ],
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'deskripsi' => 'required|string|max:5000',
            'stok_buku' => 'nullable|integer|min:1',
            'cover_buku' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        // Upload gambar
        $coverPath = $request->file('cover_buku')->store('covers', 'public');

        Buku::create([
            'judul' => $validated['judul'],
            'isbn' => $validated['isbn'],
            'penulis' => $validated['penulis'],
            'penerbit' => $validated['penerbit'],
            'tahun_terbit' => $validated['tahun_terbit'],
            'deskripsi' => $validated['deskripsi'],
            'stok_buku' => $validated['stok_buku'],
            'cover_buku' => $coverPath,
            'kategori_id' => $validated['kategori_id'],
        ]);

        return redirect()->route('bukus.buku')->with('success', 'Buku berhasil ditambahkan.');
    }

    // Menampilkan form edit buku
    public function edit($judul): View
    {
        $judulBuku = Buku::where('judul', $judul)->firstOrFail();

        $buku = Buku::findOrFail($judulBuku->id);
        $kategoris = Kategori::all();
        return view('content.admin.edit-buku', compact(['buku', 'kategoris']));
    }

    // Memperbarui buku
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $buku = Buku::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isbn' => [
                'required',
                'string',
                'regex:/^\d{3}-\d{3,5}-\d{3,5}-\d{1,7}-\d{1}$/'
            ],
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'deskripsi' => 'required|string|max:5000',
            'stok_buku' => 'nullable|integer|min:1',
            'cover_buku' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'kategori_id' => 'required|exists:kategoris,id'
        ]);

        // dd($validated);

        // Jika ada cover baru, hapus cover lama dan simpan yang baru
        if ($request->hasFile('cover_buku')) {
            // Hapus cover lama
            if ($buku->cover_buku) {
                Storage::disk('public')->delete($buku->cover_buku);
            }
            // Simpan cover baru
            $coverPath = $request->file('cover_buku')->store('covers', 'public');
        } else {
            $coverPath = $buku->cover_buku; // Tetap gunakan cover lama jika tidak diubah
        }

        // Update data buku
        // try{
            $buku->update([
                'judul' => $validated['judul'],
                'isbn' => $validated['isbn'],
                'penulis' => $validated['penulis'],
                'penerbit' => $validated['penerbit'],
                'tahun_terbit' => $validated['tahun_terbit'],
                'deskripsi' => $validated['deskripsi'],
                'stok_buku' => $validated['stok_buku'],
                'cover_buku' => $coverPath,
                'kategori_id' => $validated['kategori_id'],
            ]);

            // if (!$updated) {
            //     return back()->with('error', 'Gagal memperbarui buku.');
            // }

            return redirect()->route('buku.bukuDetail', $buku->judul)->with('success', 'Buku berhasil diperbarui!');
        // } catch(\Exception $e) {
        //     return back()->with('error', 'Error: ' . $e->getMessage());
        // }

    }
    // Menghapus buku
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        // Hapus gambar dari storage
        Storage::disk('public')->delete($buku->cover_buku);
        $buku->delete();

        return redirect()->route('bukus.buku')->with('success', 'Buku berhasil dihapus.');
    }
}
