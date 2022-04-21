<x-app-layout>
<div class="bg-white p-4 my-2 md:mx-10 md:p-10 md:my-5">
    <h1 class="text-2xl"><b>Crear turno de vigilancia</b></h1>
    <br>
    <x-jet-validation-errors class="mb-4 text-red-600"/>
    <form action="{{route('turno')}}" method="POST">
        @csrf
        <div class="grid grid-cols-4 items-center gap-2 text-sm">
            <label for="soldado" class="text-lg">Soldados</label>
            <label for="soldado" class="text-lg">Horario</label>
            <label for="soldado" class="text-lg">Ubicacion</label>
            <label for="" class="text-lg">Fecha</label>
            <select name="soldado" class="cursor-pointer">
                <option value="">Seleccionar</option>
                @foreach ($soldados as $soldados)
                    <option value="{{$soldados->usuario()->id}}">{{$soldados->usuario()->name}} {{$soldados->usuario()->apellido}} --- {{$soldados->usuario()->compañia()->nombre_compania}}</option>
                @endforeach
            </select>
            <select name="horario" class="cursor-pointer">
                <option value="0"> NINGUNO </option>
                <option value="Segundo Nocturno">Segundo Nocturno 00-06</option>
                <option value="Primero Diurno">Primero Diurno 06-12</option>
                <option value="Segundo Diurno">Segundo Diurno 12-18</option>
                <option value="Primero Nocturno">Primero Nocturno 18-24</option>
            </select>
            <input type="text" name="ubicacion">
            <input type="date" name="fecha">
        </div>
        <br>
        <button class="inline-flex items-center sm:m-4 px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-green-700 hover:bg-green-800 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Agregar</button>
        <br>
    </form>
</div>    
<div class="content bg-white p-4 my-2 md:mx-10 md:p-10 md:my-5">
    <h2 class="text-xl"><b>Tus turnos creados:</b></h2>
    <div class="p-5 grid md:grid-cols-3 gap-10">
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

    @if ($turnosCountable > 1)
    <form action="{{ route('turnos.destroy', ['id'=> Auth::user()->id])}}" method="post">
        @csrf
        @method('DELETE')
        <x-jet-button class="bg-red-600 mt-2">
            {{'Descartar turnos'}}
        </x-jet-button>
    </form>
    @endif
        
</div> 
@if (session("turno"))
    <script>
        swal({
                title: "¡Turno creado!",
                icon: "success",
                button: "Ok",
            });
    </script>
@endif
@if (session("turnoDelete"))
    <script>
        swal({
                title: "¡Turnos borrados!",
                icon: "success",
                button: "Ok",
            });
    </script>
@endif
</x-app-layout>