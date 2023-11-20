<div>
    <x-admin.forms.label for="name" :value="__('Category Name')" />
    <x-admin.forms.input wire:model="name" class="block mt-1 w-1/2" type="text" name="name" :value="$name"  required autofocus />
    <x-admin.forms.error :messages="$errors->get('name')" class="mt-2" />

    <x-admin.forms.label class=" mt-2" for="slug" :value="__('Category Slug')" />
    <x-admin.forms.input value="{{ $slug }}"  class="block mt-1 w-1/2" name="slug" type="text" readonly />
    <x-admin.forms.error :messages="$errors->get('slug')" class="mt-2" />
</div>