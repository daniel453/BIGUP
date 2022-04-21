<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col items-center bg-slate-100 overflow-hidden shadow-xl sm:rounded-lg xl:p-4 md:p-2 sm:p-none xl:text-4xl lg:text-2xl md:text-xl ">
                <h1>¡Bienvenido {{Auth::user()->rol()}} {{Auth::user()->name}}!</h1>
                <p class="xl:text-xl lg:text-lg md:text-base sm:text-sm">¿Que desea  hacer hoy?</p>
            </div>
        </div>
    </div>
</x-app-layout>
