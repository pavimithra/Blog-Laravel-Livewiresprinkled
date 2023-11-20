<x-admin.layout>
    <x-slot:heading class="font-bold">
        Posts
    </x-slot>
    @if (session('status'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="alert alert-success w-full text-slate-700 font-bold bg-green-100 place-content-center flex">
            {{ session('status') }}
        </div>
    @endif
    <livewire:index-posts />
</x-admin.layout>