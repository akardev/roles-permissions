<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="dark:bg-gray-300 overflow-hidden shadow-sm sm:rounded-lg p-2"> --}}
            <div class="flex p-2">
                <a href="{{ url()->previous() }}"
                    class="px-4 py-2 dark:bg-gray-700 hover:bg-gray-400  rounded-md text-gray-100"> Geri Dön</a>
            </div>
            <div class="flex flex-col">

                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">

                    <form method="post" action="{{ route('admin.permissions.store') }}">
                        @csrf
                        <div class="sm:col-span-6">
                            <label align="center" for="name" class="block text-sm font-medium text-gray-100"> Yetki
                            </label>
                            <div class="mt-1">
                                <input type="text" id="name" wire:model.lazy="name" name="name"
                                    class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal  sm:text-sm sm:leading-5" />
                                @error('name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                        <div class="sm:col-span-6 mt-4">
                            <div align="center" class="mt-1">
                                <button type="submit"
                                    class="px-4 py-2 bg-gray-700 hover:bg-gray-400 text-gray-100 rounded-lg">Ekle</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{-- </div> --}}
        </div>
    </div>
</x-admin-layout>
