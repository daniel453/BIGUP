<x-app-layout>
    <div class="w-full p-10">
        <div class="bg-white   sm:w-full sm:p-0 lg:p-10">
            <h2 class="text-2xl font-bold">Actualizar el usuario {{$user->name}}</h2>
            <br>
                
                <div class="border-2 border-b-slate-600 p-4">
                <form action="{{ route('user.update.store', ['id'=>$user->id]) }}" method="post">
                    <x-jet-validation-errors class="mb-4 " />


                    @csrf
                    @method('put')
                    <div class="border-2 border-b-slate-600 p-4 grid lg:grid-cols-2 gap-4 md:grid-cols-2 sm:grid-cols-1 ">
                        <label for="name"><b>Nombre:</b></label>
                        <input type="text" name="name" value="{{$user->name}}">

                        <label for="name"><b>Apellido:</b></label>
                        <input type="text" name="apellido" value="{{$user->apellido}}">

                        <label for="name"><b>Cedula:</b></label>
                        <input type="text" name="cedula" value="{{$user->cedula}}">

                        <label for="name"><b>Email:</b></label>
                        <input type="text" name="email" value="{{$user->email}}">

                        <label for="name"><b>Contingente:</b></label>
                        <input type="text" name="contingente" value="{{$user->contingente}}">

                        <label for="rango"><b>Rango</b></label>
                        <select name="rango" class="cursor-pointer">
                            <option value="soldado">Soldado</option>
                            <option value="sub-oficial">Sub-oficial</option>
                            <option value="oficial">Oficial</option>
                        </select>

                    </div>
                    <x-jet-button class="my-3">
                        {{'Actualizar'}}
                    </x-jet-button>
                </form>
                    <a href="{{ route('user.mostrar') }}">Volver</a>
                </div>
        </div>

        @if (session("user"))
            <script>
                swal({
                        title: "Error al actualizar el usuario",
                        text: "¡Revisa el formulario!",
                        icon: "error",
                        button: "Ok",
                    });
            </script>
        @endif
        @if (session("succes"))
            <script>
                swal({
                        title: "¡Usuario eliminado!",
                        icon: "success",
                        button: "Ok",
                    });
            </script>
        @endif
    </div>
</x-app-layout>