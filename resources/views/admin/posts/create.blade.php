<x-admin.layout>
    <x-slot:heading class="font-bold">
        Create Post
    </x-slot>
    <div class="py-2 bg-white dark:bg-slate-900 text-gray-700 dark:text-slate-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full sm:flex px-4 pb-2 justify-center">
                <div class="w-full items-center">
                    <div class="flex gap-2 justify-end px-4">
                        <a href="{{ route('admin.posts.index') }}">
                            <x-admin.forms.button>
                                {{ __('Back') }}
                            </x-admin.forms.button>
                        </a>
                    </div>
                    <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
                        @csrf

                        <livewire:post-slug :title="old('title')" :slug="old('slug')" />

                        <!-- <div class="mt-4">
                            <x-admin.forms.label for="content" :value="__('Post Content')" />
                            <textarea placeholder="Write the Post Content here!..." 
                            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="content">{{ old('content') }}</textarea>
                            <x-admin.forms.error :messages="$errors->get('content')" class="mt-2" />
                        </div> -->

                        <div class="pt-4 w-full border-b">
                            <span class="uppercase font-semibold">Categories</span>
                        </div>

                        <div class="mt-4">
                            <x-admin.forms.label for="categories" :value="__('Add Categories to the Role')" />
                                <select class="h-60" name="categories[]" id="categories" multiple="">
                                    <option value="" disabled>Select Categories</option>
                                    @foreach ($categories as $id => $category)
                                        <option value="{{ $id }}" @selected(in_array($id, old('categories', [])))> {{ $category }}  </option>
                                    @endforeach
                                </select>
                                <x-admin.forms.error :messages="$errors->get('categories')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-admin.forms.label for="images" :value="__('Post images')" />
                            <input type="file" name="images[]" multiple />
                            <x-admin.forms.error :messages="$errors->get('images')" class="mt-2" />
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