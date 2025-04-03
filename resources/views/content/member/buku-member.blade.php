<x-layout>
    {{-- gallery --}}
    <x-pages.admin.gallery-slide />
    <x-pages.admin.input-book />

    {{-- kategori --}}
    <section class="mt-9 overflow-x-auto p-1 custom-scroll">
        <div class="flex gap-x-6 items-center">
            <a href="{{ route('member.buku.kategori', ['name' => 'Semua']) }}" 
                class="p-2 max-w-[300px] bg-white font-roboto font-normal border shadow-sm rounded-lg whitespace-nowrap hover:shadow-black dark:bg-darkMode dark:hover:shadow-slate-200 dark:border-slate-700
                {{ request()->segment(5) == 'Semua' ? 'shadow-black dark:shadow-slate-200' : '' }}">
                Semua
            </a>

            @foreach ( $kategoris as $kategori)
                <a href="{{ route('member.buku.kategori', [$kategori->name]) }}" 
                    class="p-2 max-w-[300px] bg-white font-roboto font-normal border shadow-sm rounded-lg whitespace-nowrap hover:shadow-black dark:bg-darkMode dark:hover:shadow-slate-200 dark:border-slate-700
                    {{ request()->segment(5) == $kategori->name ? 'shadow-black dark:shadow-slate-200' : '' }}">
                    {{ $kategori->name }}
                </a>
            @endforeach
        </div>
    </section>

    {{-- main buku --}}
    <section class="mt-16 flex items-center gap-20 flex-wrap">
        @forelse ($buku as $buk)
            <x-pages.admin.buku-content :title="Str::limit($buk->judul, 17, '...')" :category="$buk->kategori->name" :image=" Storage::url($buk->cover_buku)" :alt="$buk->judul" :href_kategori="$buk->kategori->name"
                :url_gambar="route('member.buku.bukuDetail', $buk->judul)" />
        @empty
            <h1 class="font-roboto font-medium text-2xl my-5 text-center">Tidak Ada data buku</h1>
        @endforelse
    </section>

    {{-- pagination --}}
    <div class="flex justify-center items-center my-40">
        <!-- Previous Button -->
        <button type="button"
            class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white {{ $buku->onFirstPage() ? 'cursor-not-allowed opacity-50' : '' }}"
            @if ($buku->onFirstPage()) disabled @endif
            onclick="window.location='{{ $buku->previousPageUrl() }}'">
            Previous
        </button>

        <!-- Next Button -->
        <button type="button"
            class="flex items-center justify-center px-3 h-8 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white {{ !$buku->hasMorePages() ? 'cursor-not-allowed opacity-50' : '' }}"
            @if (!$buku->hasMorePages()) disabled @endif 
            onclick="window.location='{{ $buku->nextPageUrl() }}'">
            Next
        </button>
    </div>
</x-layout>
