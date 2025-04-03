<x-layout>
    {{-- gallery --}}
    <x-pages.admin.gallery-slide />
    <x-pages.admin.input-book />
    {{-- kategori --}}
    <section class="mt-9 overflow-x-auto p-1 custom-scroll">
        <div class="flex gap-x-6 items-center">
            <a href="{{ route('bukus.kategori', ['name' => 'Semua']) }}" 
                class="p-2 max-w-[300px] bg-white font-roboto font-normal border shadow-sm rounded-lg whitespace-nowrap hover:shadow-black dark:bg-darkMode dark:hover:shadow-slate-200 dark:border-slate-700
                {{ request()->segment(5) == 'Semua' ? 'shadow-black dark:shadow-slate-200' : '' }}">
                Semua
            </a>

            @foreach ( $kategoris as $kategori)
                <a href="{{ route('bukus.kategori', [$kategori->name]) }}" 
                    class="p-2 max-w-[300px] bg-white font-roboto font-normal border shadow-sm rounded-lg whitespace-nowrap hover:shadow-black dark:bg-darkMode dark:hover:shadow-slate-200 dark:border-slate-700
                    {{ request()->segment(5) == $kategori->name ? 'shadow-black dark:shadow-slate-200' : '' }}">
                    {{ $kategori->name }}
                </a>
            @endforeach
        </div>
    </section>
    
    {{-- tambah buku --}}
    <a href="{{ route('bukus.create') }}" class="mt-20 flex items-center gap-x-2 group w-fit mx-auto sm:mx-0">
        <i data-feather="plus-circle"
            class="size-10 bg-blue-500 text-white rounded-full transition-all duration-300 animate-pulse group-hover:animate-none"></i>
        <h5 class="text-2xl font-roboto font-semibold">Tambah Buku</h5>
    </a>

    {{-- main buku --}}
    <section class="flex items-center gap-20 flex-wrap">
        @if ($bukus->count() > 0)
            @foreach ($bukus as $buk)
                <x-pages.admin.buku-content :title="Str::limit($buk->judul, 17, '...')" :category="$buk->kategori->name" :image="Storage::url($buk->cover_buku)" :alt="$buk->judul" :href_kategori="$buk->kategori->name"
                    :url_gambar="route('buku.bukuDetail', [$buk->judul])" />
            @endforeach
        @else
            <h1 class="font-roboto font-medium text-2xl my-5 text-center">Tidak Ada buku disini</h1>
        @endif

    </section>

    {{-- pagination --}}
    <div class="flex justify-center items-center my-40">
        <!-- Previous Button -->
        <button type="button"
            class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white {{ $bukus->onFirstPage() ? 'cursor-not-allowed opacity-50' : '' }}"
            @if ($bukus->onFirstPage()) disabled @endif
            onclick="window.location='{{ $bukus->previousPageUrl() }}'">
            Previous
        </button>

        <!-- Next Button -->
        <button type="button"
            class="flex items-center justify-center px-3 h-8 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white {{ !$bukus->hasMorePages() ? 'cursor-not-allowed opacity-50' : '' }}"
            @if (!$bukus->hasMorePages()) disabled @endif 
            onclick="window.location='{{ $bukus->nextPageUrl() }}'">
            Next
        </button>
    </div>
</x-layout>
