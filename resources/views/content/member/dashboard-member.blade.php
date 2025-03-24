<x-layout>
  <h1 class="font-roboto font-medium text-3xl my-5 text-center">
    Selamat Datang Di Libraryhub, {{ Auth::user()->name }}
  </h1>

    <div class="flex items-center justify-center gap-10 mt-24 flex-wrap">
        <x-pages.admin.card-dashboard title="Buku" icon="book" total="100" />
        <x-pages.admin.card-dashboard title="Pinjaman Buku" icon="book-open" total="50" />
        <x-pages.admin.card-dashboard title="Kembalian Buku" icon="archive" total="50" />
    </div>
</x-layout>
