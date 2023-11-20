<x-admin.layout>
    <x-slot:heading class="font-bold">
        Edit Post
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
                    <form method="POST" action="{{ route('admin.posts.update', $post) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <livewire:post-slug :title="old('title', $post->title)" :slug="old('slug', $post->slug)" />

                        <div class="mt-4">
                            <x-admin.forms.label for="categories" :value="__('Add Categories to the Role')" />
                            <select class="h-60" name="categories[]" id="categories" multiple>
                                <option value="" disabled>Select Categories</option>
                                @foreach ($categories as $id => $category)
                                    <option value="{{ $id }}") @if(old('categories', [])) @selected(in_array($id, old('categories', []))) @else @selected(in_array($id, $category_ids)) @endif; > {{ $category }}  </option>
                                @endforeach
                            </select>
                            <x-admin.forms.error :messages="$errors->get('categories')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-admin.forms.label for="content" :value="__('Post Content')" />
                            <textarea placeholder="Write the Post Content here!..." 
                            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="content">{{ old('content', $post->content) }}</textarea>
                            <x-admin.forms.error :messages="$errors->get('content')" class="mt-2" />
                        </div>
                        
                        <x-admin.forms.button name="action" value="save" class="mt-3 mr-2">
                            {{ __('Update') }}
                        </x-admin.forms.button>

                        <x-admin.forms.button name="action" value="send_for_approval" class="mt-3 mr-2">
                            {{ __('Update and Send for Approval') }}
                        </x-admin.forms.button>

                        <x-admin.forms.button name="action" value="approve" class="mt-3 mr-2">
                            {{ __('Approve Post') }}
                        </x-admin.forms.button>

                    </form>
                    <livewire:index-images :post="$post" />
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>