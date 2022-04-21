<x-app-layout>
    <div class="bg-white lg:mx-20 mt-5 p-10">
        <h2 class="text-2xl"><b>Turnos actualmente activos:</b></h2>
        <br>
        @foreach ($suboficiales as $sub)
        @if ($sub->tieneTurno())
            <div class="border border-gray-600 lg:py-2 lg:px-5 mb-2 flex items-center lg:justify-between sm:flex-row">
                <x-info-turno>
                    El {{$sub->usuario()->rol()}} {{$sub->usuario()->name}} {{$sub->usuario()->apellido}} esta dirigiendo un turno de vigilancia
                </x-info-turno> 
                
                <a href="{{ route('turnos.show', ['id'=>$sub->usuario()->id]) }}">
                <x-jet-button class="bg-gray-800">
                     {{'Ver'}}
                </x-jet-button>
                </a>
            </div>
        @endif
        @endforeach
    </div>
</x-app-layout>