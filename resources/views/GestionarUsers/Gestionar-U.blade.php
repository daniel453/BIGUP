<x-app-layout>
    <div class="w-full flex justify-center mt-28 gap-8">

            <a class="w-52 h-52 cursor-pointer hover:bg-gray-300 transition text-xl flex flex-col bg-white p-4 rounded-md  justify-center items-center" href="{{ route('G-userCreate') }}">
                <div class="block">
                    Crear Usuario
                </div>
                <div class="block">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
                </div>
            </a>

            <a class="w-52 h-52 cursor-pointer hover:bg-gray-300 transition text-xl flex flex-col bg-white p-4  rounded-md  justify-center items-center" href="{{ route('user.mostrar') }}">
                <div class="flex items-center">
                    Mostrar usuarios
                </div>
                <div class="block">
                    <img src="{{asset('img/outline_people_black_24dp.png')}}" alt="">
                </div>
            </a>

    </div>
</x-app-layout>