<x-admin.layout>
    <x-slot:heading class="font-bold">
        View Category
    </x-slot>

    <div class="py-5 bg-white dark:bg-slate-900 text-gray-700 dark:text-slate-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full justify-center">
                <div class="w-full px-3">
                    <div class="flex gap-2 justify-end pt-4">
                        <a href="{{ route('admin.categories.index') }}">
                            <x-admin.forms.button>
                                {{ __('Back') }}
                            </x-admin.forms.button>
                        </a>
                    </div>
                    <div class="w-full">
                        <div class="lg:flex md:mt-2 w-full lg:gap-20">
                            <div class="md:flex gap-2 items-center">
                                <label for="name" class=" font-bold">Category Name : </label>
                                {{$category->name}}
                            </div>
                            
                            <!-- <div class="flex gap-2 items-center">
                                <label for="name" class=" font-bold">Parent Category :</label>
                                @if ($category->parent_id)
                                    {{ $category->category->name }}
                                @else
                                    Nil
                                @endif
                            </div> -->
                            
                            <div class="md:flex gap-2 items-center">
                                <label for="is_active" class=" font-bold">Category Status : </label>
                                {{ $category->is_active ? 'Active' : 'InActive' }}
                            </div>
                        </div>
                        <div class="items-center mt-3">
                            <label for="is_active" class=" font-bold border-b-2 border-b-gray-500">Category Desciption :</label>
                            {!! $category->description !!}
                        </div>
                        @if ($category->image)
                            <div class="items-center mt-3">
                                <label for="is_active" class=" font-bold border-b-2 border-b-gray-500">Category Image : </label>
                                <img class="mt-1" src="{{ asset('storage/'.$category->image) }}">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin.layout>
