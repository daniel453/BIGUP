<x-app-layout>
    <div class="bg-white lg:mx-32 lg:p-10 md:mx-32 md:p-10 mt-5 sm:p-5">
        <form action="{{ route('bitacoras.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 mt-5 mx-7 ">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Cargar bitacora</label>
                  <div class='flex items-center justify-center w-full'>
                      <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                          <div class='flex flex-col items-center justify-center pt-7 cursor-pointer'>
                            <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <input type='file' class="file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:cursor-pointer
                            file:bg-violet-50 file:text-violet-700
                            file:focu
                            " name="pdf"/>
                            </div>
                        </label>
                    </div>
                </div>
            <div class="flex justify-center mb-5">
                <x-jet-button>
                    {{__('Cargar bitacora')}}
                </x-jet-button>
            </div>
        </form>
    </div>
    
</x-app-layout>