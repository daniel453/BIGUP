<x-app-layout>
    <div class="w-full md:p-10 sm:p-none mt-5">
        
        <div class="bg-white p-4 my-2 md:mx-10 md:my-5 md:p-10">
            <h2 class="text-2xl font-bold">Filtrar usuario por:</h2>
            <br>
            <form action="" method="get" class="grid grid-cols-4 gap-2  justify-centerx items-center">
                <label for="">Nombre</label>  
                <label for="">Apellido</label>
                <label for="">Cedula</label>
                <label for="">Contingente</label>
                <input class="h-8" type="text" name="name">
                <input class="h-8" type="text" name="apellido">
                <input class="h-8" type="number" name="cedula">
                <input class="h-8" type="number" name="contingente">
                <x-search-button class="bg-green-700 items-center w-32 sm:m-4">
                    {{'buscar'}}
                </x-search-button>
            </form>
            <h2 class="text-2xl font-bold">Usuarios:</h2>
            
            <br>
            
            @foreach ($users as $user)
                <div class="border-2 border-b-slate-600 p-4 grid xl:grid-cols-5 gap-5 gap-x-4 mb-4">
                    <p><b>Id: </b>{{$user->id}}</p>
                    <p><b>Nombre: </b>{{$user->name}}</p>
                    <p><b>Apellido: </b>{{$user->apellido}}</p>
                    <p><b>Cedula: </b>{{$user->cedula}}</p>
                    <p><b>Email: </b>{{$user->email}}</p>
                    <p><b>Contingente: </b>{{$user->contingente}}</p>
                    <p><b>Rol: </b>{{$user->rol()}}</p>
                    <a href="{{ route('user.update.show', ['id'=>$user->id]) }}">
                        <x-jet-button class="bg-gray-800">
                            {{'Editar'}}
                        </x-jet-button>
                    </a>
                    <form action="{{ route('user.destroy',['id' => $user->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <label for="novedad">¿Por qué lo va a desactivar?</label>
                        <input type="text" placeholder="Novedad" required name="novedad">
                        <x-jet-button class="bg-red-600 mt-2">
                            {{'Desactivar'}}
                        </x-jet-button>
                    </form>
                </div>
            @endforeach
                
        </div>
        <div class="flex justify-center">
        {{$users->appends(['name' => $request->name,'apellido' => $request->apellido,'cedula' => $request->cedula,
                            'contingente' => $request->contingente])->links('vendor.pagination.tailwind')}}
        </div>

        @if (session("succes"))
            <script>
                swal({
                        title: "¡Usuario desactivado!",
                        icon: "success",
                        button: "Ok",
                    });
            </script>
        @endif
        @if (session("succesCreated"))
            <script>
                swal({
                        title: "¡Usuario creado!",
                        icon: "success",
                        button: "Ok",
                    });
            </script>
        @endif
        @if (session("succesU"))
            <script>
                swal({
                        title: "¡Usuario actualizado!",
                        icon: "success",
                        button: "Ok",
                    });
            </script>
        @endif
        @if (session("user"))
            <script>
                swal({
                        title: "¡No se puede eliminar a usted mismo!",
                        icon: "error",
                        button: "Ok",
                    });
            </script>
        @endif
    </div>
</x-app-layout>