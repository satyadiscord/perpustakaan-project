@props(['title', 'category', 'image', 'alt', 'url_gambar', 'href_kategori'])

{{-- image --}}
<div class="w-[190px] h-[270px] my-10 mx-auto xl:mx-0">
    <a href="{{ $url_gambar }}">
        <img src="{{ $image ? url($image) : url('img/image1.jpg') }}" alt="{{ $alt }}" class="size-full bg-cover bg-center object-cover shadow-image hover:cursor-pointer">
    </a>
    {{-- title --}}
    {{-- category buku --}}
    <h1 class="mt-2 font-roboto font-medium text-lg max-w-[200px] text-center mb-5">{{ $title ?? 'Judul Buku' }}</h1>
    <div class="flex items-center justify-center">
        <a href="{{ route(Auth::user()->role == 'admin' ? 'bukus.kategori' : 'member.buku.kategori', [$href_kategori]) }}" class="px-[65px] py-2 bg-blue-400 text-white rounded-full font-roboto font-medium">{{ $category ?? 'Kategori' }}</a>
    </div>
</div>