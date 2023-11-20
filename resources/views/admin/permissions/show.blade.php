<x-admin.layout>
    <x-slot:heading class="font-bold">
        View Permission
    </x-slot>

    <div class="py-5 bg-white dark:bg-slate-900 text-gray-700 dark:text-slate-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full lg:flex justify-center">
                <div class="w-full lg:flex">
                    <div class="w-full lg:w-4/5 px-3">
                        <div class="md:flex w-full justify-between">
                            <div class="md:flex gap-2 items-center">
                                <label for="name" class=" font-bold">Permission Name : </label>
                                {{$permission->name}}
                            </div>
                            <div class="md:flex gap-2 items-center">
                                <label for="is_active" class=" font-bold">Permission Status : </label>
                                {{ $permission->is_active ? 'Active' : 'InActive' }}
                            </div>
                        </div>                      
                        <div class="flex gap-2 items-center pt-4">
                            <a href="{{ route('admin.permissions.index') }}">
                                <x-admin.forms.button>
                                    {{ __('Back') }}
                                </x-admin.forms.button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin.layout>
