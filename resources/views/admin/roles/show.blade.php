<x-admin.layout>
    <x-slot:heading class="font-bold">
        View Role
    </x-slot>

    <div class="py-5 bg-white dark:bg-slate-900 text-gray-700 dark:text-slate-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full justify-center">
                <div class="w-full">
                    <div class="flex gap-2 justify-end pt-4">
                        <a href="{{ route('admin.roles.index') }}">
                            <x-admin.forms.button>
                                {{ __('Back') }}
                            </x-admin.forms.button>
                        </a>
                    </div>
                    <div class="w-full lg:w-3/5 px-3">
                        <div class="md:flex md:mt-2 w-full justify-between">
                            <div class="md:flex gap-2 items-center">
                                <label for="name" class=" font-bold">Role Name : </label>
                                {{$role->name}}
                            </div>
                            <div class="md:flex gap-2 items-center">
                                <label for="is_active" class=" font-bold">Role Status : </label>
                                {{ $role->is_active ? 'Active' : 'InActive' }}
                            </div>
                        </div>
                        <div class="gap-2 items-center pt-4">
                            <label for="is_active" class=" font-bold border-b-2">Role Permissions :</label>
                                <div class="mt-2">
                                    @foreach ($role->permissions as $permission)
                                        <div class="pl-5">
                                        {{$loop->iteration}} . {{ $permission->name }}
                                        </div>
                                    @endforeach
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin.layout>
