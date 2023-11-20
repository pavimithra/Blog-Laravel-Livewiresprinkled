<x-admin.layout>
    <x-slot:heading class="font-bold">
        Create Permission
    </x-slot>
    <div class="py-2 bg-white dark:bg-slate-900 text-gray-700 dark:text-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="w-full sm:flex pb-2 justify-center">
                <div class="w-full items-center text-slate-600">
                    <div class="flex gap-2 justify-end px-4">
                        <a href="{{ route('admin.permissions.index') }}">
                            <x-admin.forms.button>
                                {{ __('Back') }}
                            </x-admin.forms.button>
                        </a>
                    </div>
                    <form method="POST" action="{{ route('admin.permissions.store') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div>
                            <x-admin.forms.label for="name" :value="__('Permission Name')" />
                            <x-admin.forms.input id="name" class="block mt-1 w-full sm:w-4/5 md:w-1/2" type="text" name="name" :value="old('name')" required autofocus />
                            <x-admin.forms.error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        
                        <x-admin.forms.button class="mt-2 mr-2">
                            {{ __('Create') }}
                        </x-admin.forms.button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>