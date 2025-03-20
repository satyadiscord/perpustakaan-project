<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/feather-icons"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Navigation</title>
</head>

<body class="bg-white text-black dark:bg-black dark:text-white">
    <div class="w-full border-b relative dark:bg-darkMode">
        <nav x-data="{ navIsOpen: false }" class="navbar-container-costume flex itesm-center justify-between z-50">
            <div class="flex items-center">
                {{-- button listnav --}}
                <button @click="navIsOpen = !navIsOpen">
                    <i data-feather="x" x-show="navIsOpen === true" class="size-5 md:size-6"></i>
                    <i data-feather="menu" x-show="navIsOpen === false" class="size-5 md:size-6"></i>
                </button>
                <div class="w-[1px] h-6 md:h-9 bg-slate-200 mx-2 md:mx-4"></div>
                {{-- title navbar --}}
                <h1 class="font-sans font-semibold tracking-wide text-xl">Library<span
                        class="text-base md:text-lg text-blue-500">hub</span>
                </h1>
            </div>

            <div class="flex items-center relative">
                {{-- icon night mode --}}
                <x-dark-mode />
                <div class="w-[1px] h-6 md:h-9 bg-slate-200 mx-2 md:mx-4"></div>
                {{-- profile + name --}}
                <x-uiuser />
            </div>

            {{-- list navbar --}}
            <ul x-show='navIsOpen' x-transition:enter="transition ease-in-out duration-500"
                x-transition:enter-start="-translate-x-96 opacity-0" x-transition:enter-end="-translate-x-0 opacity-100"
                x-transition:leave="transition ease-in-out duration-500"
                x-transition:leave-start="-translate-x-96 opacity-100"
                x-transition:leave-end="-translate-x-96 opacity-0"
                class="absolute top-full left-0 bg-white min-h-screen w-64 sm:w-72 z-40 border-r border-t shadow-lg p-3 space-y-10 dark:bg-darkMode">
                <x-menu-list href="/admin/dashboard" icon="grid" :active="request()->is('admin/dashboard')">Dashboard</x-menu-list>
                <x-menu-list href="/admin/dashboard/member" icon="users" :active="request()->is('admin/dashboard/member')">Member</x-menu-list>
                <x-menu-list href="/admin/dashboard/buku" icon="book" :active="request()->is('admin/dashboard/buku')">Buku</x-menu-list>
                <x-menu-list href="/admin/dashboard/data-pinjam-buku" icon="book-open" :active="request()->is('admin/dashboard/data-pinjam-buku')">Data Pinjaman
                    Buku</x-menu-list>
                <x-menu-list href="/admin/dashboard/data-kembalian-buku" icon="archive" :active="request()->is('admin/dashboard/data-kembalian-buku')">Data Kembalian
                    Buku</x-menu-list>
            </ul>
        </nav>
    </div>

    {{-- main content --}}
    <div>
        <main class="container-costume mt-4">
            <h1>{{ $slot }}</h1>
        </main>
    </div>

    {{-- <button><i data-feather="x"></i></button> --}}
    <script>
        feather.replace();
    </script>
</body>

</html>
