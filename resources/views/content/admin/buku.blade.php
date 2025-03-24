<x-layout>
    {{-- gallery --}}
    <x-pages.admin.gallery-slide />
    <x-pages.admin.input-book />
    <x-pages.admin.kategori />

    {{-- main buku --}}

    {{-- tambah buku --}}
    <a href="#" class="mt-20 flex items-center gap-x-2 group w-fit mx-auto sm:mx-0">
        <i data-feather="plus-circle" class="size-10 bg-blue-500 text-white rounded-full transition-all duration-300 animate-pulse group-hover:animate-none"></i>
        <h5 class="text-2xl font-roboto font-semibold">Tambah Buku</h5>
    </a>

    <section class="flex items-center gap-20 flex-wrap">
        @foreach ($bukus as $buk)
            <x-pages.admin.buku-content :title="Str::limit($buk->judul, 17, '...')" :category="$buk->kategori->name" :image="$buk->cover_buku" :alt="$buk->judul" :url_gambar="route('buku.bukuDetail', $buk->id)" />
        @endforeach
    </section>

    {{-- pagination --}}
    <div class="flex justify-center items-center my-40">
        <!-- Previous Button -->
        <a href="#"
            class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            Previous
        </a>

        <!-- Next Button -->
        <a href="#"
            class="flex items-center justify-center px-3 h-8 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            Next
        </a>
    </div>
</x-layout>
