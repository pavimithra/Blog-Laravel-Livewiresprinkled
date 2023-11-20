<x-admin.layout>
    <x-slot:heading class="font-bold">
        Create Role
    </x-slot>
    <div class="py-2 bg-white dark:bg-slate-900 text-gray-700 dark:text-slate-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full sm:flex px-4 pb-2 justify-center">
                <div class="w-full items-center">
                    <div class="flex gap-2 justify-end px-4">
                        <a href="{{ route('admin.roles.index') }}">
                            <x-admin.forms.button>
                                {{ __('Back') }}
                            </x-admin.forms.button>
                        </a>
                    </div>
                    <form method="POST" action="{{ route('admin.roles.store') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div>
                            <x-admin.forms.label for="name" :value="__('Role Name')" />
                            <x-admin.forms.input id="name" class="block mt-1 w-full sm:w-4/5 md:w-1/2" type="text" name="name" :value="old('name')" required autofocus />
                            <x-admin.forms.error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="pt-4 w-full border-b">
                            <span class="uppercase font-semibold">Permissions</span>
                        </div>

                        <div class="mt-4">
                            <x-admin.forms.label for="permissions" :value="__('Add Permissions to the Role')" />
                            <div class="mt-1" x-data="{ selected_perm: '' }">
                                <select class="h-60" x-model="selected_perm" name="permissions[]" id="permissions" multiple="">
                                    <option value="" disabled>Select Permission</option>
                                    @foreach ($permissions as $id => $permission)
                                        <option value="{{ $id }}" @selected(in_array($id, old('permissions', [])))> {{ $permission }}  </option>
                                    @endforeach
                                </select>
                                <x-admin.forms.error :messages="$errors->get('permissions')" class="mt-2" />

                                <div class="pt-4 hidden">Color: <span x-text="selected_perm"></span></div>
                            </div>
                        </div>
                        
                        <x-admin.forms.button class="mt-3 mr-2">
                            {{ __('Create') }}
                        </x-admin.forms.button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>