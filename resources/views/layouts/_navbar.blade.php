<nav class=" bg-green-700 px-2 sm:px-4 py-2.5 shadow-lg text-white text-lg">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <a href="{{ url('/') }}" class="flex items-center">
            <span class="self-center text-xl font-semibold whitespace-nowrap">
                <img src="{{ URL::to('/assets/logo_nav.png')}}" alt="" style="width: 80px">
            </span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-lime-50 focus:outline-none focus:ring-2 focus:ring-gray-200 "
                aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="hidden w-full md:block text-lg bg-green-700 md:w-auto" id="navbar-default">
            <ul class="flex flex-col p-4 mt-4 bg-transparent rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0  ">
                @auth
                    <li>
                        {{ Auth::user()->name }}
                    </li>
                    <li>
                        <a href="{{ route('posts.index') }}"
                           class="block py-2 pr-4 pl-3 rounded md:p-0 @if(Route::currentRouteName() === 'posts.index') current-page @endif" >
                            ข้อเสนอทั้งหมด
                        </a>
                    </li>
                    @can('create', \App\Models\Post::class)
                        <li>
                            <a href="{{ route('posts.create') }}"
                               class="block py-2 pr-4 pl-3 rounded md:p-0 @if(Route::currentRouteName() === 'posts.create') current-page @endif">
                                สร้างข้อเสนอ
                            </a>
                        </li>
                    @endcan
                    @can('admin', \App\Models\Tool::class)
                        <li>
                            <a href="{{ route('tools.index') }}"
                               class="block py-2 pr-4 pl-3 rounded md:p-0 @if(Route::currentRouteName() === 'tools.index') current-page @endif">
                                อุปกรณ์ทั้งหมด
                            </a>
                        </li>
                    @endcan
                    @can('admin', \App\Models\History::class)
                        <li>
                            <a href="{{ route('historys.index') }}"
                               class="block py-2 pr-4 pl-3 rounded md:p-0 @if(Route::currentRouteName() === 'historys.index') current-page @endif">
                                ประวัติการอัพเดทอุปกรณ์
                            </a>
                        </li>
                    @endcan
                    @can('user_per', \App\Models\Post::class)
                        <li>
                            <a href="{{ route('user.index') }}"
                               class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline" >
                                <span class="material-symbols-outlined">format_list_bulleted</span>
                            </a>
                        </li>
                    @endcan
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline">
                                {{--                                {{ __('Log Out') }}--}}
                                <span class="material-symbols-outlined">logout</span>
                            </button>

                            {{--                            <x-dropdown-link :href="route('logout')"--}}
                            {{--                                             onclick="event.preventDefault();--}}
                            {{--                                                this.closest('form').submit();"--}}
                            {{--                                             class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline">--}}
                            {{--                                {{ __('Log Out') }}--}}
                            {{--                            </x-dropdown-link>--}}
                        </form>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}"
                           class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'login') current-page @endif" >
                            Login
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}"
                           class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'register') current-page @endif" >
                            Register
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
