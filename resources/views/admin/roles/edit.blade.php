<x-admin.layout>
    <x-slot:heading class="font-bold">
        Edit Role
    </x-slot>

    <div class="py-2 bg-white dark:bg-slate-900 text-gray-700 dark:text-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="w-full sm:flex pb-2 justify-center">
                <div class="w-full items-center">
                    <div class="flex gap-2 justify-end px-4">
                        <a href="{{ route('admin.roles.index') }}">
                            <x-admin.forms.button>
                                {{ __('Back') }}
                            </x-admin.forms.button>
                        </a>
                    </div>
                    <form method="POST" action="{{ route('admin.roles.update', $role) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="md:flex justify-between w-full">
                            <div class=" w-full">
                                <x-admin.forms.label for="name" :value="__('Role Name')" />
                                <x-admin.forms.input id="name" class="block mt-1 w-full sm:w-5/6" type="text" name="name" :value="old('name', $role->name)" required autofocus />
                                <x-admin.forms.error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div class=" w-full pt-4 md:pt-0">
                                <x-admin.forms.label for="is_active" :value="__('Role Status')" />
                                <input type='hidden' value=0 name='is_active'>
                                <input type="checkbox" name="is_active" value=1 @checked(old('is_active', $role->is_active)) />
                                <x-admin.forms.error :messages="$errors->get('is_active')" class="mt-2" />
                            </div>
                            
                        </div>

                        <div class="mt-4">
                            <x-admin.forms.label for="permissions" :value="__('Add Permissions to the Role')" />
                            <select class="h-60" name="permissions[]" id="permissions" multiple>
                                <option value="">Select Permissions</option>
                                @foreach ($permissions as $id => $permission)
                                    <option value="{{ $id }}") @if(old('permissions', [])) @selected(in_array($id, old('permissions', []))) @else @selected(in_array($id, $permission_ids)) @endif; > {{ $permission }}  </option>
                                @endforeach
                            </select>
                            <x-admin.forms.error :messages="$errors->get('permissions')" class="mt-2" />
                        </div>
                        
                        <x-admin.forms.button class="mt-2">
                            {{ __('Update') }}
                        </x-admin.forms.button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-admin.layout>
