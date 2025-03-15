@props(['icon', 'active' => false])

<li>
    <a {{ $attributes }} class="flex items-center hover:bg-slate-100 p-4 font-sans {{ $active ? 'bg-slate-100 rounded-sm' : '' }}">
      <i data-feather="{{ $icon }}"></i>
      <div class="w-[1px] h-6 md:h-6 bg-slate-300 mx-2 md:mx-4"></div>
      {{ $slot }}
    </a>
  </li>