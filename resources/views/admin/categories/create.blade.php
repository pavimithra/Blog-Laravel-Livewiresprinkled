<x-admin.layout>
    <x-slot:heading class="font-bold">
        Create Category
    </x-slot>
    <div class="py-2 bg-white dark:bg-slate-900 text-gray-700 dark:text-slate-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full sm:flex px-4 pb-2 justify-center">
                <div class="w-full items-center">
                    <div class="flex gap-2 justify-end px-4">
                        <a href="{{ route('admin.categories.index') }}">
                            <x-admin.forms.button>
                                {{ __('Back') }}
                            </x-admin.forms.button>
                        </a>
                    </div>
                    <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
                        @csrf

                        <livewire:category-slug :name="old('name')" :slug="old('slug')" />

                        <div class="mt-4">
                            <x-admin.forms.label for="description" :value="__('Category Description')" />
                            <textarea placeholder="Write the Category description here!..." 
                            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="description">{{ old('description') }}</textarea>
                            <x-admin.forms.error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-admin.forms.label for="image" :value="__('Category image')" />
                            <input type="file" name="image" />
                            <x-admin.forms.error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <!-- <div class="mt-4">
                            <x-admin.forms.label for="parent_id" :value="__('Parent Category')" />
                            <select name="parent_id" id="parent_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $id => $category)
                                    <option value="{{ $id }}" @selected(old('parent_id') == $id)> {{ $category }}  </option>
                                @endforeach
                            </select>
                        </div> -->
                        
                        <x-admin.forms.button class="mt-3 mr-2">
                            {{ __('Create') }}
                        </x-admin.forms.button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>