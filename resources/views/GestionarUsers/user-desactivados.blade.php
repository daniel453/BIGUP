<x-app-layout>
<div class="w-full md:p-10 sm:p-none mt-5">
    <div class="bg-white p-4 my-2 md:mx-10 md:my-5 md:p-10 mt-5">
        <div>
            <h2 class="text-2xl font-bold">Usuarios desactivados:</h2>   
        </div>
        <form action="" method="get" class="grid grid-cols-4 gap-2  justify-centerx items-center">
                <label for="">Nombre</label>  
                <label for="">Apellido</label>
                <label for="">Cedula</label>
                <label for="">Contingente</label>
                <input type="text" name="name">
                <input type="text" name="apellido">
                <input type="number" name="cedula">
                <input type="number" name="contingente">
                <x-search-button class="bg-green-700 items-center w-32 sm:m-4">
                    {{'buscar'}}
                </x-search-button>
        </form>     
        <table class="table auto w-full border-2 border-collapse mt-4">
            <thead>
                <tr>
                    <th class="border border-l-gray-500 md:p-4">Nombre</th>
                    <th class="border border-l-gray-500 md:p-4">Apellido</th>
                    <th class="border border-l-gray-500 md:p-4">Cedula</th>
                    <th class="border border-l-gray-500 md:p-4">Contingente</th>
                    <th class="border border-l-gray-500 md:p-4">Novedad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td class="border border-l-gray-500 md:p-2">{{$user->name}}</td>
                    <td class="border border-l-gray-500 md:p-2">{{$user->apellido}}</td>
                    <td class="border border-l-gray-500 md:p-2">{{$user->cedula}}</td>
                    <td class="border border-l-gray-500 md:p-2">{{$user->contingente}}</td>
                    <td class="border border-l-gray-500 md:p-2">{{$user->novedad}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$users->appends(['name' => $request->name,'apellido' => $request->apellido,'cedula' => $request->cedula,
        'contingente' => $request->contingente])->links()}}
</div>
<div>


</x-app-layout>