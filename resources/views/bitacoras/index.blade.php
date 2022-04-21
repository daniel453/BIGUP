<x-app-layout>
    <div class="bg-white lg:mx-32 lg:p-10 md:mx-32 md:p-10 mt-5 sm:p-5">
        <h1 class="text-2xl"><b>Bitacoras:</b></h1>
        <br>
        <div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-1">
            @foreach ($bitacoras as $bitacora)
                <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 mb-5">
                    <div class="overflow-hidden shadow-md text-gray-100">
                        <div class="px-6 py-4 bg-gray-800 border-b border-gray-600 font-bold uppercase">
                            {{$bitacora->user()->name}} {{$bitacora->user()->apellido}}
                        </div>
                    
                        <div class="p-6 bg-gray-800 border-b border-gray-600">
                            <b>Bitacora creada:</b> {{$bitacora->created_at}}
                            <br>
                            <b>Bitacora ultima actualización:</b> {{$bitacora->updated_at}}
                        </div>
                    
                        <div class="p-6 bg-gray-800 border-gray-200 text-right">
                            <a target="_blank"  class="bg-blue-500 shadow-md text-sm text-white font-bold py-3 md:px-8 px-4 hover:bg-blue-400 rounded uppercase" 
                                href="{{asset($bitacora->bitacora)}}">ver</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>





    @if (session("bitacoras"))
            <script>
                swal({
                        title: "¡Bitacora creada con exito!",
                        icon: "success",
                        button: "Ok",
                    });
            </script>
        @endif
</x-app-layout>