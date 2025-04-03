<x-layout>
  <section class="mt-12 flex flex-col md:flex-row relative">
    <div class="p-2">
      {{-- layout kiri gambar --}}
      <div class="m-2">
        <img src="{{ Storage::url($buku->cover_buku) ? Storage::url($buku->cover_buku) : url('img/image1.jpg') }}" alt="buku" class="w-full max-w-[400px] md:max-w-[500px] h-auto bg-cover bg-center object-cover mx-auto">
      </div>
    </div>
    <div class="w-full p-4 lg:m-1">
      {{-- layout kanan isi bukunya --}}
      <div x-data="{isOpen: false}">
        <div class="flex justify-between items-center">
          <h1 class="font-roboto text-3xl sm:text-4xl font-semibold mt-0 tracking-wider">{{ $buku->judul }}</h1>
          <button @click="isOpen = !isOpen">
            <i data-feather="more-horizontal" class="size-7 cursor-pointer text-slate-600 hover:text-slate-800 -mt-2 absolute right-4 -top-6 lg:static lg:right-0 lg:-top-0 dark:text-slate-50 dark:hover:text-slate-300"></i>
          </button>
        </div>

        {{-- menu list dots --}}
        <div x-show="isOpen">
          <div class="w-32 h-[100px] bg-white shadow-md border absolute right-3 top-1 lg:top-12 dark:bg-darkMode">
            <div class="p-2">
              <a href="{{ route('bukus.edit', $buku->judul) }}" class="flex items-center justify-end gap-x-2 hover:bg-slate-200 p-2 rounded-[8px] dark:hover:bg-hoverDarkMode">
                <h5>Edit</h5>
                <i data-feather="edit" class="size-5"></i>
              </a>
              <form action="{{ route('bukus.destroy', $buku->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                @csrf
                @method('DELETE')
                <button href="#" class="w-full flex items-center justify-end gap-x-2 hover:bg-slate-200 p-2 rounded-[8px] dark:hover:bg-hoverDarkMode">
                  <h5>Delete</h5>
                  <i data-feather="trash" class="size-5"></i>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <h4 class="font-roboto font-normal text-base sm:text-lg">{{ $buku->penulis }} | {{ $buku->penerbit }} in <span class="hover:underline cursor-pointer"><a href="{{ route('bukus.kategori', $buku->kategori->name) }}">{{ $buku->kategori->name }}</a></span> | {{ $buku->tahun_terbit }}</h4>
      <h5 class="font-roboto font-normal text-slate-400 text-sm mb-10">{{ $buku->isbn }}</h5>
      <p class="font-roboto font-normal text-base sm:text-lg leading-relaxed max-w-[45rem] text-justify">{{ $buku->deskripsi }}</p>
      {{-- button --}}
      <div class="mt-12 flex gap-x-5">
        <button disabled class="px-7 sm:px-16 py-3 bg-blue-300 tracking-wider text-white font-roboto font-medium rounded-[5px] cursor-not-allowed">Pinjam ({{ $buku->stok_buku }})</button>
        <a href="{{ route('bukus.buku') }}" class="px-7 sm:px-16 py-3 bg-red-400 hover:bg-red-500 tracking-wider text-white font-roboto font-medium rounded-[5px]">Kembali</a>
      </div>
    </div>
  </section>
</x-layout>