<x-layout>
    <section class="mt-12 flex flex-col md:flex-row relative">
        <div class="p-2">
            {{-- layout kiri gambar --}}
            <div class="m-2">
                <img src="{{  Storage::url($buku->cover_buku) ?  Storage::url($buku->cover_buku) : url('img/image1.jpg') }}" alt="buku"
                    class="w-full max-w-[400px] md:max-w-[500px] h-auto bg-cover bg-center object-cover mx-auto">
            </div>
        </div>
        <div class="w-full p-4 lg:m-1">
            {{-- layout kanan isi bukunya --}}
            <div>
                <h1 class="font-roboto text-3xl sm:text-4xl font-semibold mt-0 tracking-wider">{{ $buku->judul }}</h1>
            </div>
            <h4 class="font-roboto font-normal text-base sm:text-lg">{{ $buku->penulis }} | {{ $buku->penerbit }} in
                <span class="hover:underline cursor-pointer">{{ $buku->kategori->name }}</span> |
                {{ $buku->tahun_terbit }}
            </h4>
            <h5 class="font-roboto font-normal text-slate-400 text-sm mb-10">{{ $buku->isbn }}</h5>
            <p class="font-roboto font-normal text-base sm:text-lg leading-relaxed max-w-[45rem] text-justify">{{ $buku->deskripsi }}</p>
            {{-- button --}}
            <div class="mt-12 flex gap-x-5">
                <form action="{{ route('member.buku.pinjam', $buku->id) }}" method="POST">
                    @csrf
                    @php
                        $user = Auth::user();
                        $dendaMasihBerlaku =
                            session('denda_' . $user->id) && now()->lessThan(session('denda_' . $user->id));

                        // dd($dendaMasihBerlaku);

                        $sudahPinjam = \App\Models\PeminjamanBuku::where('user_id', auth()->id())
                            ->where('buku_id', $buku->id)
                            ->where('status', 'pinjam')
                            ->exists();
                    @endphp

                    @if ($dendaMasihBerlaku)
                        <button type="button" disabled
                            class="px-7 sm:px-16 py-3 bg-gray-400 text-white font-roboto font-medium rounded-[5px] cursor-not-allowed">
                            Anda terkena denda! Ditunggu 1 jam
                        </button>
                    @elseif (!$sudahPinjam)
                        <button type="submit"
                            class="px-7 sm:px-16 py-3 bg-blue-400 hover:bg-blue-500 tracking-wider text-white font-roboto font-medium rounded-[5px]">
                            Pinjam ({{ $buku->stok_buku }})
                        </button>
                    @else
                        <button type="button" disabled
                            class="px-7 sm:px-16 py-3 bg-gray-400 text-white font-roboto font-medium rounded-[5px] cursor-not-allowed">
                            Sudah Dipinjam
                        </button>
                    @endif
                </form>
                <a href="{{ route('member.buku.index') }}"
                    class="px-7 sm:px-16 py-3 bg-red-400 hover:bg-red-500 tracking-wider text-white font-roboto font-medium rounded-[5px]">Kembali</a>
            </div>
        </div>
    </section>
</x-layout>
