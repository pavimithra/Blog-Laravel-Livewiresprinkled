<div class="my-3">
    <div class="relative overflow-auto shadow-sm my-3">
        <x-admin.forms.label for="post_images" :value="__('Post images')" />
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Link</th>
                    <th>Is Featured</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @unless($images->isEmpty())
                    @foreach ($images as $image)
                        <tr>
                            <td><img class=" h-14" src="{{ asset('/storage/'.$image->name) }}"></td>
                            <td> <button @click="$clipboard('http://127.0.0.1:8000/storage/{{ $image->name }}')">Copy Image Link</button></td>
                            <td><i class="px-2 py-1 {{ $image->is_featured == 1 ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}  text-xs rounded">
                                {{ $image->is_featured == 1 ? 'Featured' : 'Not Featured' }}</i></td>
                            <td>
                                <button wire:click="delete({{ $image->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                                @if($image->is_featured == 0)
                                    <button wire:click="make_featured({{ $image->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                        </svg>
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="text-center font-bold">
                        <td colspan="4">No Images Found</td>
                    </tr>
                @endunless
            </tbody>
        </table>
    </div>
    <div class="border-2 p-2">
        <form wire:submit.prevent="save">
            <x-admin.forms.label class=" font-semibold uppercase underline" for="post_images" :value="__('Add Post images')" />
            <input type="file" class="mt-2" wire:model="post_images" name="post_images" multiple  id="upload{{ $iteration }}" />
            <x-admin.forms.error :messages="$errors->get('post_images')" class="mt-2" />
            @error('post_images.*')
                <ul class='text-sm text-red-600 space-y-1'>
                    <li>All Post Images field must be an image</li>
                </ul>
            @enderror
            <!-- <button type="submit">Save</button> -->
            <div>
                <x-admin.forms.button type="submit" class="mt-3 mr-2">
                    {{ __('Add Images') }}
                </x-admin.forms.button>
            </div>
        </form>
    </div>
</div>