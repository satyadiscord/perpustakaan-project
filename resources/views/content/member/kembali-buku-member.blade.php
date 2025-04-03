<x-layout>
    <h1 class="mt-12 mb-3 font-roboto font-medium text-2xl">Kembalian Buku, {{ Auth::user()->name }}</h1>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Pinjam
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Kembali
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Judul Buku Dipinjam
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kategori
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengembalian as $kembalian)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">
                            {{ date('d F Y', strtotime($kembalian->peminjaman->tgl_peminjaman)) }}
                            ({{ date('H:i', strtotime($kembalian->peminjaman->tgl_peminjaman)) }})
                        </td>
                        <td class="px-6 py-4">
                            {{ date('d F Y', strtotime($kembalian->tgl_pengembalian)) }}
                            ({{ date('H:i', strtotime($kembalian->tgl_pengembalian)) }})
                        </td>
                        <td class="px-6 py-4 hover:underline cursor-pointer">
                            <a href="{{ route('member.buku.bukuDetail', $kembalian->peminjaman->buku->judul) }}">
                                {{ $kembalian->peminjaman->buku->judul }}
                            </a>
                        </td>
                        <td class="px-6 py-4 hover:underline cursor-pointer">
                            <a href="{{ route('member.buku.kategori', $kembalian->peminjaman->buku->kategori->name) }}">
                                {{ $kembalian->peminjaman->buku->kategori->name }}
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Anda belum melakukan pengembalian buku.
                        </th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- pagination --}}
    <div class="flex justify-center items-center my-20">
        <!-- Previous Button -->
        <button type="button"
            class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white {{ $pengembalian->onFirstPage() ? 'cursor-not-allowed opacity-50' : '' }}"
            @if ($pengembalian->onFirstPage()) disabled @endif
            onclick="window.location='{{ $pengembalian->previousPageUrl() }}'">
            Previous
        </button>

        <!-- Next Button -->
        <button type="button"
            class="flex items-center justify-center px-3 h-8 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white {{ !$pengembalian->hasMorePages() ? 'cursor-not-allowed opacity-50' : '' }}"
            @if (!$pengembalian->hasMorePages()) disabled @endif onclick="window.location='{{ $pengembalian->nextPageUrl() }}'">
            Next
        </button>
    </div>
</x-layout>
