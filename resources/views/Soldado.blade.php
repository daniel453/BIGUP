<x-app-layout>
    <div class="w-full md:p-10 sm:p-none mt-5">
        @if (count($turno) >= 1)
            <div class="mx-20 flex flex-col bg-white p-10  justify-center">
                <x-info>
                    ¡Hola {{Auth::user()->name}} {{Auth::user()->apellido}}!. Tienes asignado un turno de vigilancia
                </x-info>
                <br>
                @foreach ($turno as $turno)
                <div class="border border-gray-600 p-5">
                    <h2 class="text-xl"><b>Horario:</b> {{$turno->horario}}</h2>
                    <h2 class="text-xl"><b>Fecha:</b> {{$turno->fecha}}</h2>
                    <h2 class="text-xl"><b>Ubicacion:</b> {{$turno->ubicacion}}</h2>
                </div>
                @endforeach
                    
            </div>
        @else
            <div class="mx-auto bg-white p-5 text-2xl flex justify-center">
                <x-info>
                    ¡Hola {{Auth::user()->name}} {{Auth::user()->apellido}}!. Por el momento no tienes asignado un turno de vigilancia
                </x-info>
            </div>
        @endif
        
    </div>
</x-app-layout>