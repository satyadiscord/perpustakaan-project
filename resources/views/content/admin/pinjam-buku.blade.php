<x-layout>
    <h1 class="mt-12 mb-3 font-roboto font-medium text-2xl flex gap-1">Data <span class="hidden sm:block">Member</span>
        Peminjaman Buku</h1>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Pinjam
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Kembali
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Judul Buku Dipinjam
                    </th>
                    <th scope="col" class="px-6 py-3">Kategori</th>
                    <th scope="col" class="px-6 py-3">
                        Nama Member
                    </th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pinjam as $p)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <td class="px-6 py-4">
                            {{ date('d F Y', strtotime($p->tgl_peminjaman)) }}
                            ({{ date('H:i', strtotime($p->tgl_peminjaman)) }})
                        </td>
                        <td class="px-6 py-4">
                            {{ date('d F Y', strtotime($p->tgl_pengembalian)) }}
                            ({{ date('H:i', strtotime($p->tgl_pengembalian)) }})
                        </td>
                        <td
                            class="px-6 py-4 capitalize {{ $p->status === 'pinjam' ? 'text-green-500' : 'text-red-500' }}">
                            {{ $p->status }}
                        </td>
                        <td class="px-6 py-4 hover:underline cursor-pointer">
                            <a href="{{ route('buku.bukuDetail', $p->buku->judul) }}">
                                {{ $p->buku->judul }}
                            </a>
                        </td>
                        <td class="px-6 py-4 cursor-pointer hover:underline">
                            <a href="{{ route('bukus.kategori', $p->buku->kategori->name) }}">
                                {{ $p->buku->kategori->name }}
                            </a>
                        </td>
                        <td class="px-6 py-4 cursor-pointer hover:underline">
                            <a href="{{ route('admin.members.search', $p->user->name) }}">
                                {{ $p->user->name }}
                            </a>
                        </td>
                        <td class="px-6 py-4" title="Menghapus pinjaman">
                            <a href="#">
                                <i data-feather="trash-2" class="size-5 hover:text-red-500"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Member belum melakukan peminjaman buku.
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
            class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white {{ $pinjam->onFirstPage() ? 'cursor-not-allowed opacity-50' : '' }}"
            @if ($pinjam->onFirstPage()) disabled @endif
            onclick="window.location='{{ $pinjam->previousPageUrl() }}'">
            Previous
        </button>

        <!-- Next Button -->
        <button type="button"
            class="flex items-center justify-center px-3 h-8 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white {{ !$pinjam->hasMorePages() ? 'cursor-not-allowed opacity-50' : '' }}"
            @if (!$pinjam->hasMorePages()) disabled @endif onclick="window.location='{{ $pinjam->nextPageUrl() }}'">
            Next
        </button>
    </div>
</x-layout>
