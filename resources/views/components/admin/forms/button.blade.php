<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-slate-300 dark:bg-slate-500 text-slate-700 dark:text-slate-200 border border-transparent rounded-md font-semibold text-xs uppercase hover:bg-slate-500 hover:text-slate-100 dark:hover:bg-slate-300 dark:hover:text-slate-700 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>