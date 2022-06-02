<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="dark:bg-gray-300 overflow-hidden shadow-sm sm:rounded-lg p-2"> --}}
            {{-- <div class="flex justify-center p-2">
                <a href="{{ route('admin.users.create') }}"
                    class="px-4 py-2 dark:bg-gray-700 hover:bg-gray-400  rounded-md text-gray-100"> Rol Oluştur</a>
            </div> --}}
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="dark:bg-gray-700">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">
                                            AD SOYAD</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">
                                            E-POSTA</th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only"></span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="dark:bg-gray-100 divide-y divide-gray-100">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    {{ $user->name }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    {{ $user->email }}
                                                </div>
                                            <td>
                                                <div class="flex justify-end">
                                                    <div class="flex space-x-2">
                                                        <a href="{{ route('admin.users.show', $user->id) }}"
                                                            class="px-4 py-2 bg-gray-700 hover:bg-gray-400 text-white rounded-lg">Roller</a>
                                                        <form
                                                            class="px-4 py-2 bg-gray-700 hover:bg-gray-400 text-white rounded-lg"
                                                            method="POST"
                                                            action="{{ route('admin.users.destroy', $user->id) }}"
                                                            onsubmit="return confirm('Silmek istediğinize emin misiniz?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit">Sil</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- </div> --}}
        </div>
    </div>
</x-admin-layout>
