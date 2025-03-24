<x-layout>
    <h1 class="mt-12 mb-3 font-roboto font-medium text-2xl flex gap-1">Data <span class="hidden sm:block">Member</span>
        Kembalian Buku</h1>
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
                        Judul Buku Dikembalikan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Member
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kembali as $k)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">
                            {{ date('d-m-Y H:i', strtotime($k->peminjaman->tgl_peminjaman)) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ date('d-m-Y H:i', strtotime($k->tgl_pengembalian)) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $k->peminjaman->buku->judul }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $k->peminjaman->user->name }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="#">
                                <i data-feather="trash-2" class="size-5"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
