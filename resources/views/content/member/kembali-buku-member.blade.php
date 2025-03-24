<x-layout>
  <h1 class="mt-12 mb-3 font-roboto font-medium text-2xl">Peminjaman Buku, {{ Auth::user()->name }}</h1>
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
              </tr>
          </thead>
          <tbody>
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      1
                  </th>
                  <td class="px-6 py-4">
                      2025-09-12 10:00
                  </td>
                  <td class="px-6 py-4">
                      2025-09-13 12:00
                  </td>
                  <td class="px-6 py-4 hover:underline cursor-pointer">
                      Makanan Indonesia terbaik 2025
                  </td>
              </tr>
          </tbody>
      </table>
  </div>
</x-layout>
