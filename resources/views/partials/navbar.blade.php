<div class="bg-white border-t-4 border-blue-light shadow">
    <div class="container mx-auto">
        <nav class="flex items-center justify-between flex-wrap py-4">
            <div class="flex items-center flex-no-shrink text-white mr-6">
                <a href="{{ url('/') }}"><img src="{{asset('images/logo.png')}}" alt="logo" height="50"/></a>
            </div>
            <div class="block lg:hidden">
                <button class="flex items-center px-3 py-2 border rounded text-blue-light border-blue-light hover:text-grey-darkest hover:border-grey-darkest"
                        @click="menuOpen = !menuOpen">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>
                            Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                    </svg>
                </button>
            </div>
            <div class="w-full lg:block flex-grow lg:flex lg:items-center lg:w-auto" :class="{hidden:!menuOpen}">
                <div class="text-sm lg:flex-grow">
                    <a href="{{ route('blog') }}"
                       class="no-underline block mt-4 lg:inline-block lg:mt-0 text-grey-darker hover:text-grey-darkest mr-4">
                        Blog
                    </a>
                </div>
                @auth
                    <div class="text-sm v-cloak">
                        <a class="no-underline block mt-4 lg:inline-block lg:mt-0 text-grey-darker hover:text-grey-darkest mr-4"
                           href="{{route('admin.dashboard')}}"><svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M538.6 196.4l-2.5-3.9c-4.1.3-8.1.3-12.2 0l-2.5 4c-5.8 9.2-17.1 13.4-27.5 10.1-13.8-4.3-23-8.8-34.3-18.1-9-7.4-11.2-20.3-5.4-30.4l2.5-4.3c-2.3-3.4-4.3-6.9-6.1-10.6h-9.1c-11.6 0-21.4-8.2-23.6-19.6-2.6-13.7-2.7-24.2.1-38.5 2.1-11.3 12.1-19.5 23.6-19.5h9c1.8-3.7 3.8-7.2 6.1-10.6l-2.6-4.5c-5.8-10-3.6-22.7 5.2-30.3 10.6-9.1 19.7-14.3 33.5-19 10.8-3.7 22.7.7 28.5 10.6l2.6 4.4c4.1-.3 8.1-.3 12.2 0l2.6-4.4c5.8-9.9 17.7-14.3 28.6-10.5 13.3 4.5 22.3 9.6 33.5 19.1 8.8 7.5 10.9 20.2 5.1 30.2l-2.6 4.4c2.3 3.4 4.3 6.9 6.1 10.6h5.1c11.6 0 21.4 8.2 23.6 19.6 2.6 13.7 2.7 24.2-.1 38.5-2.1 11.3-12.1 19.5-23.6 19.5h-5c-1.8 3.7-3.8 7.2-6.1 10.6l2.5 4.3c5.9 10.2 3.5 23.1-5.5 30.5-10.7 8.8-19.9 13.4-34 17.9-10.5 3.3-21.9-.8-27.7-10.1zm12.2-34.5l10.6 18.3c6.7-2.8 12.9-6.4 18.7-10.8l-10.6-18.3 6.4-7.5c4.8-5.7 8.6-12.1 11-19.1l3.3-9.3h21.1c.9-7.1.9-14.4 0-21.5h-21.1l-3.3-9.3c-2.5-7-6.2-13.4-11-19.1l-6.4-7.5L580 39.4c-5.7-4.4-12-8-18.7-10.8l-10.6 18.3-9.7-1.8c-7.3-1.4-14.8-1.4-22.1 0l-9.7 1.8-10.6-18.3C492 31.3 485.7 35 480 39.4l10.6 18.3-6.4 7.5c-4.8 5.7-8.6 12.1-11 19.1l-3.3 9.3h-21.1c-.9 7.1-.9 14.4 0 21.5h21.1l3.3 9.3c2.5 7 6.2 13.4 11 19.1l6.4 7.5-10.6 18.4c5.7 4.4 12 8 18.7 10.8l10.6-18.3 9.7 1.8c7.3 1.4 14.8 1.4 22.1 0l9.7-1.8zM145.3 454.4v-31.6c-12.9-5.5-25.1-12.6-36.4-21.1l-27.5 15.9c-9.8 5.6-22.1 3.7-29.7-4.6-24.2-26.3-38.5-49.5-50.6-88.1-3.4-10.7 1.1-22.3 10.8-28L39.2 281c-1.7-14-1.7-28.1 0-42.1l-27.3-15.8c-9.7-5.6-14.2-17.3-10.8-28 12.1-38.4 26.2-61.6 50.6-88.1 7.6-8.3 20-10.2 29.7-4.6l27.4 15.9c11.3-8.5 23.5-15.5 36.4-21.1V65.6c0-11.3 7.8-21 18.8-23.4 34.7-7.8 62-8.7 101.7 0 11 2.4 18.9 12.2 18.9 23.4v31.6c12.9 5.5 25.1 12.6 36.4 21l27.4-15.8c9.8-5.6 22.2-3.7 29.8 4.6 26.9 29.6 41.5 55.9 52.1 88.5 3.4 10.5-.8 21.9-10.2 27.7l-25 15.8c1.7 14 1.7 28.1 0 42.1l28.1 17.5c8.6 5.4 13 15.6 10.8 25.5-6.9 31.3-33 64.6-55.9 89.2-7.6 8.2-19.9 10-29.6 4.4L321 401.8c-11.3 8.5-23.5 15.5-36.4 21.1v31.6c0 11.2-7.8 21-18.8 23.4-37.5 8.3-64.9 8.2-101.9 0-10.8-2.5-18.6-12.3-18.6-23.5zm32-6.2c24.8 5 50.5 5 75.3 0v-47.7l10.7-3.8c16.8-5.9 32.3-14.9 45.9-26.5l8.6-7.4 41.4 23.9c16.8-19.1 34-41.3 42.1-65.2l-41.4-23.9 2.1-11.1c3.2-17.6 3.2-35.5 0-53.1l-2.1-11.1 41.4-23.9c-8.1-23.9-25.3-46.2-42.1-65.2l-41.4 23.9-8.6-7.4c-13.6-11.7-29-20.6-45.9-26.5l-10.7-3.8V71.8c-24.8-5-50.5-5-75.3 0v47.7l-10.7 3.8c-16.8 5.9-32.3 14.9-45.9 26.5l-8.6 7.4-41.4-23.9A192.19 192.19 0 0 0 33 198.5l41.4 23.9-2.1 11.1c-3.2 17.6-3.2 35.5 0 53.1l2.1 11.1L33 321.6c8.1 23.9 20.9 46.2 37.7 65.2l41.4-23.9 8.6 7.4c13.6 11.7 29 20.6 45.9 26.5l10.7 3.8v47.6zm38.4-105.3c-45.7 0-82.9-37.2-82.9-82.9s37.2-82.9 82.9-82.9 82.9 37.2 82.9 82.9-37.2 82.9-82.9 82.9zm0-133.8c-28 0-50.9 22.8-50.9 50.9s22.8 50.9 50.9 50.9c28 0 50.9-22.8 50.9-50.9s-22.8-50.9-50.9-50.9zm322.9 291.7l-2.5-3.9c-4.1.3-8.1.3-12.2 0l-2.5 4c-5.8 9.2-17.1 13.4-27.5 10.1-13.8-4.3-23-8.8-34.3-18.1-9-7.4-11.2-20.3-5.4-30.4l2.5-4.3c-2.3-3.4-4.3-6.9-6.1-10.6h-9.1c-11.6 0-21.4-8.2-23.6-19.6-2.6-13.7-2.7-24.2.1-38.5 2.1-11.3 12.1-19.5 23.6-19.5h9c1.8-3.7 3.8-7.2 6.1-10.6l-2.6-4.5c-5.8-10-3.6-22.7 5.2-30.3 10.6-9.1 19.7-14.3 33.5-19 10.8-3.7 22.7.7 28.5 10.6l2.6 4.4c4.1-.3 8.1-.3 12.2 0l2.6-4.4c5.8-9.9 17.7-14.3 28.6-10.5 13.3 4.5 22.3 9.6 33.5 19.1 8.8 7.5 10.9 20.2 5.1 30.2l-2.6 4.4c2.3 3.4 4.3 6.9 6.1 10.6h5.1c11.6 0 21.4 8.2 23.6 19.6 2.6 13.7 2.7 24.2-.1 38.5-2.1 11.3-12.1 19.5-23.6 19.5h-5c-1.8 3.7-3.8 7.2-6.1 10.6l2.5 4.3c5.9 10.2 3.5 23.1-5.5 30.5-10.7 8.8-19.9 13.4-34 17.9-10.5 3.2-21.9-.9-27.7-10.1zm12.2-34.6l10.6 18.3c6.7-2.8 12.9-6.4 18.7-10.8l-10.6-18.3 6.4-7.5c4.8-5.7 8.6-12.1 11-19.1l3.3-9.3h21.1c.9-7.1.9-14.4 0-21.5h-21.1l-3.3-9.3c-2.5-7-6.2-13.4-11-19.1l-6.4-7.5 10.6-18.3c-5.7-4.4-12-8-18.7-10.8l-10.6 18.3-9.7-1.8c-7.3-1.4-14.8-1.4-22.1 0l-9.7 1.8-10.6-18.3c-6.7 2.8-12.9 6.4-18.7 10.8l10.6 18.3-6.4 7.5c-4.8 5.7-8.6 12.1-11 19.1l-3.3 9.3h-21.1c-.9 7.1-.9 14.4 0 21.5h21.1l3.3 9.3c2.5 7 6.2 13.4 11 19.1l6.4 7.5-10.6 18.3c5.7 4.4 12 8 18.7 10.8l10.6-18.3 9.7 1.8c7.3 1.4 14.8 1.4 22.1 0l9.7-1.8zM560 408c0-17.7-14.3-32-32-32s-32 14.3-32 32 14.3 32 32 32 32-14.3 32-32zm0-304.3c0-17.7-14.3-32-32-32s-32 14.3-32 32 14.3 32 32 32 32-14.4 32-32z"/></svg>
                        </a>
                        <a href="#" @click.prevent="accountOpen = !accountOpen"
                           class="no-underline block mt-4 lg:inline-block lg:mt-0 text-grey-darker hover:text-grey-darkest">
                            {{auth()->user()->name}}
                        </a>
                        <div v-if="accountOpen" v-click-outside="onClickOutside" class="mt-4 lg:absolute w-full lg:w-auto border bg-white">
                            <a href="{{ route('logout') }}" class="block p-4 bg-light no-underline text-grey-darker">Logout</a>
                        </div>
                    </div>
                @endauth
            </div>
        </nav>
    </div>
</div>
