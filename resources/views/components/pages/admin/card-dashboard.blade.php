@props(['icon', 'title', 'total'])

<a href="#" class="w-80 h-48 bg-slate-100 shadow-md rounded-lg flex items-center justify-around hover:bg-opacity-65 dark:bg-darkMode dark:hover:bg-hoverDarkMode dark:shadow-slate-600">
    <div>
        {{-- icons --}}
        <i data-feather="{{ $icon }}" class="size-24"></i>
    </div>
    <div>
        {{-- title --}}
        <h1 class="font-roboto font-medium text-xl mb-5">{{ $title }}</h1>
        {{-- total data --}}
        <p class="font-roboto font-medium text-2xl">{{ $total }}</p>
    </div>
</a>