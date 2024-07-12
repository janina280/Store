<header class="absolute inset-x-0 top-0 z-50">
    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
      <div class="flex lg:flex-1">
        <a href="#" class="-m-1.5 p-1.5">
          <span class="sr-only">Your Company</span>
          <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
        </a>
      </div>
      <div class="flex lg:hidden">
        <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
          <span class="sr-only">Open main menu</span>
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>
      </div>
      <div class="hidden lg:flex lg:gap-x-12">
          <x-nav-link :href="url('/')" :active="request()->routeIs('home')" class="text-sm font-semibold leading-6 text-gray-900" >
              {{ __('Home') }}
          </x-nav-link>
          <x-nav-link :href="url('/women')" :active="request()->routeIs('women')" class="text-sm font-semibold leading-6 text-gray-900">
              {{ __('Women') }}
          </x-nav-link>
          <x-nav-link :href="url('/men')" :active="request()->routeIs('men')" class="text-sm font-semibold leading-6 text-gray-900">
              {{ __('Men') }}
          </x-nav-link>
          <x-nav-link :href="url('/contact-us')" :active="request()->routeIs('contact-us')" class="text-sm font-semibold leading-6 text-gray-900">
              {{ __('Contact Us') }}
          </x-nav-link>
      </div>
      <div class="hidden lg:flex lg:flex-1 lg:justify-end">
          @auth
          <x-nav-link :href="Auth::user()->usertype=='admin' ? route('admin.dashboard') : route('dashboard')" :active="Auth::user()->usertype=='admin' ? request()->routeIs('admin.dashboard') : request()->routeIs('dashboard')" class="text-sm font-semibold leading-6 text-gray-900">
              {{ __('Dashboard') }}
          </x-nav-link>
          @else
          <x-nav-link :href="url('/login')" :active="request()->routeIs('login')" class="text-sm font-semibold leading-6 text-gray-900">
              {{ __('Login') }}
          </x-nav-link>
          
          @if (Route::has('register'))
          <x-nav-link :href="url('/register')" :active="request()->routeIs('register')" class="text-sm font-semibold leading-6 text-gray-900">
              {{ __('Register') }}
          </x-nav-link>
          @endif
          @endauth
      </div>
    </nav>
  </header>

{{--<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 dark:border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="url('/')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="url('/women')" :active="request()->routeIs('women')">
                        {{ __('Women') }}
                    </x-nav-link>
                    <x-nav-link :href="url('/men')" :active="request()->routeIs('men')">
                        {{ __('Men') }}
                    </x-nav-link>
                    <x-nav-link :href="url('/contact-us')" :active="request()->routeIs('contact-us')">
                        {{ __('Contact Us') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex space-x-8 sm:ms-10 sm:-my-px">
                @auth
                <x-nav-link :href="Auth::user()->usertype=='admin' ? route('admin.dashboard') : route('dashboard')" :active="Auth::user()->usertype=='admin' ? request()->routeIs('admin.dashboard') : request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
                @else
                <x-nav-link :href="url('/login')" :active="request()->routeIs('login')">
                    {{ __('Login') }}
                </x-nav-link>
                
                @if (Route::has('register'))
                <x-nav-link :href="url('/register')" :active="request()->routeIs('register')">
                    {{ __('Register') }}
                </x-nav-link>
                @endif
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="url('/')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="url('/women')" :active="request()->routeIs('women')">
                {{ __('Women') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="url('/men')" :active="request()->routeIs('men')">
                {{ __('Men') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="url('/contact-us')" :active="request()->routeIs('contact-us')">
                {{ __('Contact Us') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-200">
            <div class="mt-3 space-y-1">
                @auth
                <x-responsive-nav-link :href="Auth::user()->usertype=='admin' ? route('admin.dashboard') : route('dashboard')" :active="Auth::user()->usertype=='admin' ? request()->routeIs('admin.dashboard') : request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                @else
                <x-responsive-nav-link :href="url('/login')" :active="request()->routeIs('login')">
                    {{ __('Login') }}
                </x-responsive-nav-link>
                
                @if (Route::has('register'))
                <x-responsive-nav-link :href="url('/register')" :active="request()->routeIs('register')">
                    {{ __('Register') }}
                </x-responsive-nav-link>
                @endif
                @endauth

                @auth
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
                @endauth
            </div>
        </div>
    </div>
</nav>
--}}