<x-layout>
    <section class="mt-12 flex flex-col md:flex-row relative">
        <div class="p-2">
            {{-- layout kiri gambar --}}
            <div class="m-2">
                <img src="{{ $buku->cover_buku ? url($buku->cover_buku) : url('img/image1.jpg') }}" alt="buku"
                    class="w-full max-w-[400px] md:max-w-[500px] h-auto bg-cover bg-center object-cover mx-auto">
            </div>
        </div>
        <div class="w-full p-4 lg:m-1">
            {{-- layout kanan isi bukunya --}}
            <div>
                <h1 class="font-roboto text-3xl sm:text-4xl font-semibold mt-0 tracking-wider">{{ $buku->judul }}</h1>
            </div>
            <h4 class="font-roboto font-normal text-base sm:text-lg">{{ $buku->penulis }} | {{ $buku->penerbit }} in
                <span class="hover:underline cursor-pointer">{{ $buku->kategori->name }}</span> |
                {{ $buku->tahun_terbit }}</h4>
            <h5 class="font-roboto font-normal text-slate-400 text-sm mb-10">{{ $buku->isbn }}</h5>
            <p class="font-roboto font-normal text-base sm:text-lg leading-relaxed max-w-[45rem] text-justify">Lorem
                ipsum dolor sit amet consectetur adipisicing elit. Mollitia repudiandae necessitatibus laudantium quae
                dolorum expedita veniam, architecto culpa nisi nostrum maiores magnam sapiente incidunt consequuntur
                velit, aliquid neque ex. Sunt nulla impedit aliquam minus rerum libero ullam sequi molestias delectus
                cupiditate aspernatur aliquid recusandae ut dicta aut eveniet, dolor animi inventore minima numquam.
                Amet necessitatibus, voluptatum saepe minima voluptates reiciendis sunt quas maxime porro beatae nemo
                dolorem sit ratione doloremque autem exercitationem expedita nostrum quae soluta repudiandae? Harum
                dolor fuga, nesciunt fugit cupiditate incidunt mollitia, commodi vitae dolore maiores soluta quos
                dolores deleniti earum voluptatum expedita sed doloribus, quisquam eaque.</p>
            {{-- button --}}
            <div class="mt-12 flex gap-x-5">
                <a href="#"
                    class="px-7 sm:px-16 py-3 bg-blue-400 hover:bg-blue-500 tracking-wider text-white font-roboto font-medium rounded-[5px]">Pinjam</a>
                <a href="{{ route('member.buku.index') }}"
                    class="px-7 sm:px-16 py-3 bg-red-400 hover:bg-red-500 tracking-wider text-white font-roboto font-medium rounded-[5px]">Kembali</a>
            </div>
        </div>
    </section>
</x-layout>
