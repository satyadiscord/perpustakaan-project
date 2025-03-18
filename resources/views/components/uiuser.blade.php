<section x-data="{isOpen: false}">
    <div>
        <button @click="isOpen = !isOpen" class="flex items-center gap-x-3">
            <div class="size-7 md:size-10 rounded-full border-2 group-hover:border-2 border-slate-300 transition-all duration-300">
                <img src="{{ url('img/person.jpg') }}" alt="person unplash" class="size-full bg-center bg-cover object-cover rounded-full">
            </div>
            <div class="flex items-center gap-x-2">
                <h1 class="font-sans font-medium text-base hidden md:block">{{ Auth::user()->name }}</h1>
                <i data-feather="chevron-down" class="size-5 mt-[3px] hidden md:block"></i>
            </div>
        </button>
    </div>

    {{-- isOpen, dropdown --}}
    <div class="absolute top-[43px] md:top-[52px] right-0 z-50">
        <div x-show="isOpen"
            x-transition:enter="transition-opacity ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-in duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="bg-white shadow-lg border px-2 py-2 w-40 text-right dark:bg-darkMode">
            <x-pages.admin.profile-modal />
            <a href="{{ route('logout') }}" class="flex items-center justify-end gap-x-3 hover:bg-slate-200 p-2 rounded-[8px] dark:hover:bg-hoverDarkMode">
                <h5>Sign Out</h5>
                <i data-feather="log-out" class="size-5"></i>
            </a>
        </div>
    </div>
</section>