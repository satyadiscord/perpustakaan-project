{{-- input --}}
<form class="max-w-md mx-auto mt-10">
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="20" height="48">
                <path
                    d="M6 2C4.34 2 3 3.34 3 5v14c0 1.66 1.34 3 3 3h13c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H6zm0 2h13v14H6c-.55 0-1-.45-1-1V5c0-.55.45-1 1-1zm1 4v2h6V8H7zm0 4v2h6v-2H7z" />
            </svg>

        </div>
        <input type="search" id="default-search"
            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Cari buku..." required />
        <button type="submit"
            class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
    </div>
</form>
