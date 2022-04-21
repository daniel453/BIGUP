<x-app-layout>
    <div class="content mt-10 bg-white lg:mx-10 md:mx-5 sm:mx-0 lg:p-5 md:p-5 sm:p-2 ">
        <h2 class="text-2xl"><b>Turnos del {{$user->rol()}} {{$user->name}} {{$user->apellido}}:</b></h2>
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
    </div>
</x-app-layout>