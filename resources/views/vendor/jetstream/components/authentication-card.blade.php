<div class="min-h-screen flex flex-col s items-center pt-6 sm:pt-0 bg-gray-800">
    <div>
        {{ $logo }}
    </div>

    <div class="sm:max-w-md mt-6 px-6 py-4 w-11/12 bg-red-600 shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
