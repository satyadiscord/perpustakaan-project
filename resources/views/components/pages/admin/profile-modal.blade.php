<section x-data="{modalOpen: false}">
    <button @click="modalOpen = !modalOpen" class="w-full">
        <div class="flex items-center justify-end gap-x-3 mb-3 hover:bg-slate-200 p-2 rounded-[8px] dark:hover:bg-hoverDarkMode">
            <h5>Profile</h5>
            <i data-feather="user" class="size-5"></i>
        </div>
    </button>
        
    <!-- Modal -->
    <div x-show="modalOpen" 
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
        x-transition:enter="transition-opacity ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">
        
        <div class="relative p-4 w-full max-w-md bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Tombol Close -->
            <button @click="modalOpen = false" 
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>

            <!-- Modal Main -->
            <div class="p-4 md:p-5 text-center">
                {{-- avatar --}}
                <div class="relative size-64 rounded-full border mx-auto mb-5">
                    <img src="{{ url('img/person.jpg') }}" alt="person unplash" class="w-full h-full bg-cover object-cover bg-center rounded-full">
                    <button class="bg-green-500 p-2 rounded-full absolute bottom-7 right-0">
                        <i data-feather="camera" class="size-6 text-white"></i>
                    </button>
                </div>
                {{-- name --}}
                <h1 class="font-roboto text-2xl font-medium mb-2">{{ Auth::user()->name }}</h1>
                {{-- username/email --}}
                <h5 class="font-roboto font-medium text-slate-500 text-xl mb-10 dark:text-slate-300">{{ Auth::user()->email }}</h5>
                {{-- tag role berwarna hijau --}}
                <span class="px-8 py-2 bg-green-100 border border-green-500 text-green-500 rounded-full font-roboto text-lg font-light">{{ Auth::user()->role }}</span>
            </div>
        </div>
    </div>
</section>
