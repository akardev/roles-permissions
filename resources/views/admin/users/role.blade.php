<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-300 overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ url()->previous() }}"
                        class="px-4 py-2 dark:bg-gray-700 hover:bg-gray-400  rounded-md text-gray-100"> Geri Dön</a>
                </div>
                <div class="flex flex-col">
                    <div>{{ $user->name }}</div>
                    <div>{{ $user->email }}</div>
                </div>

                <div class="mt-10 p-2">
                    <h2 class="text-2xl font-semibold">Roller</h2>
                    <div class="text-xs text-red-800">
                        <small> Kaldırmak istediğiniz rolün üzerine basınız. </small>
                    </div>
                    <div class="flex space-x-2 mt-4 p-2">
                        @if ($user->roles)
                            @foreach ($user->roles as $user_role)
                                <form class="px-4 py-2 bg-red-900 hover:bg-red-700 text-white rounded-full"
                                    method="POST"
                                    action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}"
                                    onsubmit="return confirm('Silmek istediğinize emin misiniz?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-xs" type="submit" title="Rolü Kaldırmak için basınız">{{ $user_role->name }}</button>
                                </form>
                            @endforeach
                        @endif
                    </div>

                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-2">
                        <form method="post" action="{{ route('admin.users.roles', $user->id) }}">
                            @csrf
                            <div class="sm:col-span-6">
                                <label for="role" class="block text-sm font-medium text-gray-700 text-center">Rol</label>
                                <select id="role" name="role" autocomplete="role-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('role')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror

                            <div class="sm:col-span-6 mt-4">
                                <div align="center" class="mt-1">
                                    <button type="submit"
                                        class="px-4 py-2 bg-gray-700 hover:bg-gray-400 text-gray-100 rounded-lg">Ekle</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>




            </div>
        </div>
    </div>
    </div>
    </div>
</x-admin-layout>
