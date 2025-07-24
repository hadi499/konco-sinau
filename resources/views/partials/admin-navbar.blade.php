<nav class="bg-blue-100 shadow-md" x-data="{ open: false }">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <!-- Left side: Logo, Home, About -->
      <div class="flex">
        <div class="flex items-center ">
          <a href="/admin" class="flex items-center space-x-2 text-gray-800 hover:text-gray-900">
            <h1 class="text-3xl font-extrabold text-blue-700 tracking-wide text-center drop-shadow-md">
             K<span class="text-yellow-500">S</span>
            </h1>

          </a>


        </div>
        <div class="hidden md:flex md:items-center md:ml-6 space-x-5">
          @auth
          <a href="{{ route('admin') }}"
            class="text-gray-800 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('admin') ? 'border-b-2 border-orange-500' : '' }}">Dashboard</a>
         
          <a href="{{ route('note.index') }}"
            class="text-gray-800 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('note.index') ? 'border-b-2 border-orange-500' : '' }}">Notes</a>
         
          


          @endauth

        </div>
      </div>
      <div class="flex  items-center gap-0">
        <a href="{{route('home')}}">
          <div class="mr-4 hover:text-blue-700">
            View Site

          </div>
        </a>
      </div>

      <!-- Right side: Login, Register -->
      <div class="hidden md:flex md:items-center">
        @auth
        {{-- <div class="text-blue-700 font-semibold mr-4"> {{ Auth::user()->name }}</div> --}}


        <form action="{{ route('logout') }}" method="POST" id="navbar-logout">
          @csrf
          <button type="submit" class="cursor-pointer">
            Logout
          </button>
        </form>
        @else

        <a href="{{ route('login') }}"
          class="text-gray-800 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('login') ? 'border-b-2 border-blue-500' : '' }}">Login</a>
        <a href="{{ route('register') }}"
          class="text-gray-800 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('register') ? 'border-b-2 border-blue-500' : '' }}">Register</a>
        @endauth
      </div>




      <!-- Mobile menu button -->
      <div class="-mr-2 flex md:hidden">
        <button @click="open = !open" type="button"
          class="inline-flex items-center justify-center p-2 rounded-md text-gray-800 hover:text-gray-900  focus:outline-none  focus:text-gray-900">
          <span class="sr-only">Open main menu</span>
          <!-- Menu open: "hidden", Menu closed: "block" -->
          <svg x-show="!open" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <!-- Menu open: "block", Menu closed: "hidden" -->
          <svg x-show="open" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile menu -->
  <div x-show="open" class="md:hidden">
    @auth
    <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 text-gray-500">


      <a href="{{ route('admin') }}"
        class="block hover:bg-blue-200 px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('admin') ? ' text-blue-800' : '' }}">Dashboard</a>     
      <a href="{{ route('note.index') }}"
        class="block hover:bg-blue-200 px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('note.index') ? ' text-blue-800' : '' }}">Notes</a>     

      <form action="{{ route('logout') }}" method="POST" class="block w-full">
        @csrf
        <button type="submit"
          class="flex font-medium items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-3 py-2.5 text-left text-sm hover:bg-blue-50 disabled:text-gray-500">
          Logout
        </button>
      </form>

      @else
      <a href="{{ route('login') }}"
        class="block  hover:bg-blue-200 px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('login') ? 'text-blue-800' : '' }}">Login</a>
      <a href="{{ route('register') }}"
        class="block  hover:bg-blue-200 px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('register') ? 'text-blue-800' : '' }}">Register</a>


      @endauth
    </div>
  </div>
</nav>