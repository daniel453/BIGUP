<x-app-layout>
    <div class="bg-white lg:mx-32 lg:p-10 mt-5">
        @if (count($turnos) > 0)
            <h2 class="text-2xl"><b>Este es tu turno:</b></h2>
            <br>
            <div class="p-5 grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-1 gap-10">
                @foreach ($turnos as $turnos)
                    <div class="border border-gray-600 p-5">
                        <h3><b>Nombre:</b></h3>
                        {{$turnos->user_soldado()->name}}
                        <h3><b>Apellido:</b></h3>
                        {{$turnos->user_soldado()->apellido}}
                        <h3><b>Compañia:</b></h3>
                        {{$turnos->user_soldado()->compañia()->nombre_compania}}
                        <h3><b>Horario:</b></h3>
                        {{$turnos->horario}}
                        <h3><b>Fecha:</b></h3>
                        {{$turnos->fecha}}
                        <h3><b>Ubicacion:</b></h3>
                        {{$turnos->ubicacion}}
                    </div>
                @endforeach
            </div>
            <div class="flex flex-col p-5 items-center justify-center">

                    <form action="{{ route('bitacoras.pdf') }}" class="flex flex-col">
                        @csrf
                        <label for="novedad"><b>Novedad del turno de vigilancia:</b></label>
                        <input type="text" name="novedad">
                        <x-jet-button>
                            {{__('Finalizar turno')}}
                        </x-jet-button>
                    </form>
                @else
                    <x-info>
                        No hay ningun turno para generar su bitacora
                    </x-info>
                @endif
            
        </div>
    </div>
</x-app-layout>