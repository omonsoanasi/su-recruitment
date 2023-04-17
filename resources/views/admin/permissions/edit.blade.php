<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="min-w-0 flex-1">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Permissions Management</h2>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('admin.permissions.index') }}" class="px-4 py-2 bg-green-800 hover:bg-green-300 rounded-md p-2">Permissions</a>
                </div>

                <form method="POST" action="{{ route('admin.permissions.update', $permission) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name"  id="name" value="{{ $permission->name }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Permission Name" required>
                        @error('name') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="text-white bg-green-800 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Permission</button>
                </form>

            </div>
            <div class="mt-6 p-2 bg-slate-100">
                <h2 class="text-2xl font-semibold"> Roles </h2>
                <div class="flex space-x-2 p-2 mt-4">
                    @if($permission->roles)
                        @foreach($permission->roles as $permission_role)
                            <form class="px-4 py-2 bg-red-500 hover:bg-red-800 text-white rounded-md" method="POST" action="{{ route('admin.permissions.roles.remove', [$permission->id, $permission_role->id]) }}" onsubmit="return confirm('You are about to remove a role...')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">{{$permission_role->name}}</button>
                            </form>
                        @endforeach
                    @endif
                </div>
                <div>
                    <form method="POST" action="{{ route('admin.permissions.roles', $permission->id) }}">
                        @csrf
                        <div class="mb-6">
                            <label for="role" class="sr-only">Role</label>
                            <select id="role" name="role" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                <option selected>Choose a role</option>
                                @foreach( $roles as $role )
                                    <option value="{{$role->name}}">{{$role->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <button type="submit" class="text-white bg-green-800 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Assign</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
