<section>
    <div class="w-72 sm:w-96 h-32 rounded-md border shadow-md p-6 flex flex-col dark:bg-darkMode dark:shadow-slate-600">
        <div class="flex gap-x-4 items-center">
            <h3 class="font-roboto text-lg font-medium">Jhon Doe</h3>
            <span class="p-[2px] bg-green-100 border border-green-500 text-green-500 rounded-full font-roboto text-sm font-light">member</span>
        </div>

        <div class="flex items-center justify-between">
            <h6 class="font-roboto text-lg font-normal text-slate-500 dark:text-slate-300 mt-5">Jhon@gmail.com</h6>
            {{-- image avatar --}}
            <div class="size-16 rounded-full border -mt-10">
                <img src="{{ url('img/person.jpg') }}" alt="avatar" class="size-full bg-cover bg-center object-cover rounded-full">
            </div>
        </div>
    </div>
</section>