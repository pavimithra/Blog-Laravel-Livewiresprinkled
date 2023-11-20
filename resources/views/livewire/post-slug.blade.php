<div>
    <x-admin.forms.label for="title" :value="__('Post Title')" />
    <x-admin.forms.input wire:model="title" class="block mt-1 w-1/2" type="text" name="title" :value="$title"  required autofocus />
    <x-admin.forms.error :messages="$errors->get('title')" class="mt-2" />

    <x-admin.forms.label class=" mt-2" for="slug" :value="__('Post Slug')" />
    <x-admin.forms.input value="{{ $slug }}"  class="block mt-1 w-1/2" name="slug" type="text" readonly />
    <x-admin.forms.error :messages="$errors->get('slug')" class="mt-2" />
</div>