<div class="my-0">
    <div class="my-5 mr-6 sm:mr-8 md:mr-5 block md:flex text-slate-500 md:justify-between">
        <div class="flex flex-grow">
            <a href="{{ route('admin.roles.create') }}">
                <x-admin.forms.button>
                    {{ __('Create roles') }}
                </x-admin.forms.button>
            </a>
        </div>
        <x-admin.forms.input wire:model.debounce.300ms="search"  class="mt-2 md:mt-0" id="name" type="text" name="name" placeholder="Search By Name"/>
        <div class="mt-2 md:mt-0 md:ml-4">
            <label>
                <select wire:model="no_of_rows" class = 'border-gray-300 text-sm focus:border-gray-400 focus:ring-0 rounded-md shadow-sm'>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                </select> entries per page
            </label>
        </div>
    </div>
    <div class="relative overflow-auto shadow-sm">
        <table>
            <thead>
                <tr>
                    <th>Name
                        <span wire:click="sortBy('name')" class="flex float-right text-sm cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75L12 3m0 0l3.75 3.75M12 3v18" class="{{ $sortBy === 'name' && $sortDirection === 'asc' ? '' : 'text-slate-200' }}" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25L12 21m0 0l-3.75-3.75M12 21V3"  class="{{ $sortBy === 'name' && $sortDirection === 'desc' ? '' : 'text-slate-200' }}" />
                            </svg>
                        </span>
                    </th>
                    <th>Status
                        <span wire:click="sortBy('is_active')" class="flex float-right text-sm cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75L12 3m0 0l3.75 3.75M12 3v18" class="{{ $sortBy === 'is_active' && $sortDirection === 'asc' ? '' : 'text-slate-200' }}" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25L12 21m0 0l-3.75-3.75M12 21V3"  class="{{ $sortBy === 'is_active' && $sortDirection === 'desc' ? '' : 'text-slate-200' }}" />
                            </svg>
                        </span>
                    </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @unless($roles->isEmpty())
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>
                                <i class="px-2 py-1 {{ $role->is_active == 1 ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}  text-xs rounded">
                                {{ $role->is_active == 1 ? 'Active' : 'InActive' }}</i>
                            </td>
                            <td class="gap-5">
                                <div class="flex gap-5">
                                    <a href="{{ route('admin.roles.show', $role) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.roles.edit', $role) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </a>
                                    <form method="POST" action="{{ route('admin.roles.destroy', $role) }}" onsubmit="return confirm('{{ trans('Are you sure to delete') }}');" style="display: inline-block;">
                                        @csrf
                                        @method('delete')
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @if ($roles->lastPage() >1)
                        <tr><td colspan="3"> {{ $roles->links() }} </td></tr>
                    @endif
                @else
                    <tr class="text-center font-bold">
                        <td colspan="3">No roles Found</td>
                    </tr>
                @endunless
            </tbody>
        </table>
    </div>
</div>