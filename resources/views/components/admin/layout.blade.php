<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- add Development css & js -->
        @vite(['resources/css/admin.css', 'resources/js/app.js'])

        <script src="https://cdn.tiny.cloud/1/8xnl7xefbpparp4surdaavb7kdr3p82el1r9e07cuhxxjt2i/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

        <style>
            [x-cloak] { display: none }
        </style>
        @livewireStyles
    </head>
    <body class="antialiased font-poppins bg-slate-50 dark:bg-slate-800 text-gray-700 dark:text-slate-100">
        <div x-data="{ open: false }" class="lg:ml-64 inset-0">
            <header class="fixed h-14 top-0 left-0 lg:left-64 right-0 z-50 shadow-md flex flex-wrap justify-between pl-2 md:pl-3 lg:pl-5 bg-white items-center transition duration-500 dark:bg-slate-900">
                <div class="flex items-center">
                    <button x-cloak x-on:click="open = ! open" type="button" class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"  stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" :class="!open ? '' : 'hidden'" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" :class="open ? '' : 'hidden'" />
                        </svg>
                    </button>
                </div>
                <div class="relative flex pl-2 lg:hidden flex-grow basis-0 items-center">
                    <img class="h-9 w-auto" src="{{asset('images/logoIcon.png')}}">
                    <a href="{{ route('admin.dashboard') }}"> <img class="hidden h-9 w-auto md:block" src="{{asset('images/logo.png')}}">
                    </a>
                </div>
                <div class="relative flex basis w-auto justify-end gap-4 md:gap-6 lg:gap-8 md:flex-grow items-center h-full">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                    </a>
                    <a class="" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>
                    </a>
                    <a class="" href="#">
                        <button x-data @click="$store.darkMode.toggle()" class="flex h-6 w-6 items-center justify-center rounded-lg shadow-md shadow-black/5 ring-1 ring-black/5 dark:bg-slate-700 dark:ring-inset dark:ring-white/5" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" class="text-sky-400 fill-sky-400" :class="$store.darkMode.on && 'hidden'"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" class="text-sky-400 fill-sky-400" :class="!$store.darkMode.on && 'hidden'" />
                            </svg>
                        </button>
                    </a>
                    <!-- Profile dropdown -->
                    <div x-data="{ show: false }" class="relative font-roboto flex h-full border-l px-2 md:px-3 lg:px-5 hover:bg-slate-100 dark:hover:bg-slate-600">
                        <div @click="show = ! show" class="group flex items-center cursor-pointer">
                            <img class="shrink-0 h-10 w-10 md:h-12 md:w-12 rounded-full" src="{{asset('images/avatar/isha.jpeg')}}" alt="">
                            <div class="ml-3 rtl:ml-0 rtl:mr-3 font-semibold text-md hidden md:flex md:flex-col">
                                <span class="">ISHA V P</span>
                                <span class=" ">Administrator</span>
                            </div>
                        </div>
                        <div x-cloak x-show="show" @click.away="show = false" class="absolute right-0 z-10 mt-14 w-48 origin-top-right  bg-white py-1 dark:bg-slate-700 shadow-lg ring-1 ring-black divide-y divide-gray-100 ring-opacity-5 focus:outline-none" role="menu">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="#" class="block px-4 py-2 hover:bg-slate-200 dark:hover:bg-slate-600" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>

                            <a href="#" class="block px-4 py-2 hover:bg-slate-200 dark:hover:bg-slate-600" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>

                            <a href="#" class="block px-4 py-2 hover:bg-slate-200 dark:hover:bg-slate-600" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                        </div>
                    </div>
                </div>
            </header>
            <div x-cloak class="fixed inset-y-0 left-0 w-64 z-50 lg:flex flex-col overflow-y-auto mt-14 lg:mt-0 items-center border-r dark:border-r-gray-600 bg-white dark:bg-slate-900 text-slate-500 dark:text-slate-300 " :class="open ? '' : 'hidden'">
                <div class="w-full hidden lg:block py-2">
                    <img class="" src="{{asset('images/logo2.png')}}">
                </div>
                <nav class="w-full">
                    <ul class="border-y border-y-gray-200 dark:border-y-gray-600 divide-y divide-gray-200 dark:divide-gray-600">
                        <li class="relative">
                            <a class="flex flex-row gap-3 py-2.5 px-6 hover:bg-slate-200 dark:hover:bg-slate-600 hover:text-cyan-500" href="{{ route('admin.dashboard') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <!-- <li class="relative">
                            <a class="flex flex-row gap-3  py-2.5 px-6 hover:bg-slate-200 dark:hover:bg-slate-600 hover:text-cyan-500" href="widgets.html">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                                <span>Users</span>
                            </a>
                        </li> -->
                        
                        <li class="relative">
                            <a class="flex flex-row gap-3  py-2.5 px-6 hover:bg-slate-200 dark:hover:bg-slate-600 hover:text-cyan-500" href="{{ route('admin.roles.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                </svg>
                                <span>Roles</span>
                            </a>
                        </li>

                        
                        <li class="relative">
                            <a class="flex flex-row gap-3  py-2.5 px-6 hover:bg-slate-200 dark:hover:bg-slate-600 hover:text-cyan-500" href="{{ route('admin.permissions.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                                </svg>
                                <span>Permissions</span>
                            </a>
                        </li>
                        
                        <li class="relative">
                            <a class="flex flex-row gap-3  py-2.5 px-6 hover:bg-slate-200 dark:hover:bg-slate-600 hover:text-cyan-500" href="{{ route('admin.categories.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3" />
                                </svg>
                                <span>Categories</span>
                            </a>
                        </li>

                        <li class="relative">
                            <a class="flex flex-row gap-3 py-2.5 px-6 hover:bg-slate-200 dark:hover:bg-slate-600 hover:text-cyan-500" href="{{ route('admin.posts.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 002.25-2.25V6a2.25 2.25 0 00-2.25-2.25H6A2.25 2.25 0 003.75 6v2.25A2.25 2.25 0 006 10.5zm0 9.75h2.25A2.25 2.25 0 0010.5 18v-2.25a2.25 2.25 0 00-2.25-2.25H6a2.25 2.25 0 00-2.25 2.25V18A2.25 2.25 0 006 20.25zm9.75-9.75H18a2.25 2.25 0 002.25-2.25V6A2.25 2.25 0 0018 3.75h-2.25A2.25 2.25 0 0013.5 6v2.25a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                                <span>Posts</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- bg open -->
            <div @click="open = false"><div :class="{ 'block': open, 'hidden': !(open) }" class="fixed bg-slate-900 bg-opacity-70 dark:bg-cyan-900 dark:bg-opacity-70 w-full h-full inset-x-0 top-0 z-30 lg:hidden"></div></div>
            <main>
                <div class="max-w-full flex-auto lg:max-w-none lg:pr-0 z-30 mt-14">
                    <article>
                        @props(['heading'])
                        @if (isset($heading))
                        <header class="space-y-1 bg-slate-300 font-roboto dark:bg-slate-500 dark:text-slate-200 items-center">
                            <p {{ $heading->attributes->class(['px-4 py-4 xl:px-8 uppercase font-semibold text-2xl items-center']) }}>
                            {{ $heading }}    
                            </p>
                        </header>
                        @endif
                        <div class="px-4 md:px-6 lg:px-8 my-5">
                            {{ $slot }}
                        </div>
                    </article>
                </div>
            </main>
        </div>
        @livewireScripts
        <script>
    /** tinymce.init({
      selector: 'textarea',
      images_upload_url: 'postAcceptor.php',
      automatic_uploads: false,
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ]
    }); **/
  </script>
    </body>
</html>
