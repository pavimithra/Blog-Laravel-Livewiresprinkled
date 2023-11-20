<x-admin.layout>
    <x-slot:heading class="font-bold">
        Edit Permission
    </x-slot>

    <div class="py-5 bg-white dark:bg-slate-900 text-gray-700 dark:text-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="w-full sm:flex pb-2 justify-center">
                <div class="w-full items-center">
                    <div class="flex gap-2 justify-end px-4">
                        <a href="{{ route('admin.permissions.index') }}">
                            <x-admin.forms.button>
                                {{ __('Back') }}
                            </x-admin.forms.button>
                        </a>
                    </div>
                    <form method="POST" action="{{ route('admin.permissions.update', $permission) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="md:flex justify-between w-full">
                            <div class=" w-full">
                                <x-admin.forms.label for="name" :value="__('Permission Name')" />
                                <x-admin.forms.input id="name" class="block mt-1 w-full sm:w-5/6 " type="text" name="name" :value="old('name', $permission->name)" required autofocus />
                                <x-admin.forms.error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div class=" w-full pt-4 md:pt-0">
                                <x-admin.forms.label for="is_active" :value="__('Permission Status')" />
                                <input type='hidden' value=0 name='is_active'>
                                <input type="checkbox" name="is_active" value=1 @checked(old('is_active', $permission->is_active)) />
                                <x-admin.forms.error :messages="$errors->get('is_active')" class="mt-2" />
                            </div>
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
