<x-layout>
  <section class="px-3">
    {{-- Welcome user --}}
    <h1 class="font-roboto font-medium text-3xl my-5 text-center">Selamat Datang Di Libraryhub, {{ Auth::user()->name }}</h1>

    {{-- card dashboard --}}
    <div class="flex items-center justify-center gap-10 mt-24 flex-wrap">
      <x-pages.admin.card-dashboard title="Member" icon="users" total="100" />
      <x-pages.admin.card-dashboard title="Buku" icon="book" total="100" />
      <x-pages.admin.card-dashboard title="Pinjaman Buku" icon="book-open" total="100" />
      <x-pages.admin.card-dashboard title="Kembalian Buku" icon="archive" total="100" />
    </div>
  </section>
</x-layout>