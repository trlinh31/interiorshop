<header>
  <nav class="bg-gray-800 px-4 py-3 lg:px-6">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
      <a href="{{ route('HomeIndex') }}" class="text-white text-2xl md:text-4xl font-bold">LinhTran<span>.</span></a>
      <ul class="hidden md:flex items-center">
        <li class="hover:text-blue-600 font-medium duration-200 text-white">
          <a href="{{ route('HomeIndex') }}">Home</a>
        </li>
        <li class="hover:text-blue-600 font-medium duration-200 text-white ml-10">
          <a href="{{ route('shop.index') }}">All Products</a>
        </li>
        <li class="hover:text-blue-600 font-medium duration-200 text-white ml-10">
          <a href="{{ route('about.index') }}">About</a>
        </li>
        <li class="hover:text-blue-600 font-medium duration-200 text-white ml-10">
          <a href="{{ route('contact.index') }}">Contact</a>
        </li>
        <li class="hover:text-blue-600 font-medium duration-200 text-white ml-10">
          <a href="{{ route('order.index') }}">View Order</a>
        </li>
      </ul>
      <div class="hidden md:flex items-center">
        @if(Auth::check())
        <a href="{{ route('logout') }}" class="hover:bg-red-700 bg-red-600 px-4 py-2 mr-9 text-white font-medium rounded-lg">
          {{ Auth::user()->name }}
          <i class="fa-solid fa-arrow-right-from-bracket pl-1"></i>
        </a>
        @else
        <a href="{{ route('register.index') }}" class="hover:bg-gray-700 px-4 py-2 text-white font-medium mr-2 rounded-lg">Register</a>
        <a href="{{ route('login') }}" class="hover:bg-blue-700 bg-blue-600 px-4 py-2 mr-9 text-white font-medium rounded-lg">Login</a>
        @endif
        <a href="{{ route('cart.index') }}" class="text-white text-2xl relative" title="View Cart">
          <i class="fa-solid fa-bag-shopping"></i>
          <span class="absolute -top-2 -right-3 bg-gray-700 text-white text-sm rounded-full px-2">
            {{ Cart::count() }}
          </span>
        </a>
      </div>
      <div class="md:hidden text-white cursor-pointer text-3xl" id="hambuger">
        <span><i class="fa-solid fa-bars"></i></span>
      </div>
      <div class="fixed top-0 w-full h-full left-[-100%] z-50 py-4 px-6 bg-gray-600 ease-in" id="mobile-nav">
        <ul class="flex flex-col">
          <li class="font-medium text-3xl duration-200 text-white mb-5">
            <a href="{{ route('HomeIndex') }}">Home</a>
          </li>
          <li class="font-medium text-3xl duration-200 text-white mb-5">
            <a href="{{ route('shop.index') }}">All Products</a>
          </li>
          <li class="font-medium text-3xl duration-200 text-white mb-5">
            <a href="{{ route('about.index') }}">About</a>
          </li>
          <li class="font-medium text-3xl duration-200 text-white mb-5">
            <a href="{{ route('contact.index') }}">Contact</a>
          </li>
          @if(Auth::check())
          <li class="font-medium text-3xl duration-200 text-white mb-5">
            <a href="{{ route('logout') }}">
              {{ Auth::user()->name }}
              <i class="fa-solid fa-arrow-right-from-bracket pl-1 hidden lg:inline-block"></i>
            </a>
          </li>
          @else
          <li class="font-medium text-3xl duration-200 text-white mb-5">
            <a href="{{ route('register.index') }}">Register</a>
          </li>
          <li class="font-medium text-3xl duration-200 text-white mb-5">
            <a href="{{ route('login') }}">Login</a>
          </li>
          @endif
          <li class="font-medium text-3xl duration-200 text-white mb-5">
            <a href="{{ route('cart.index') }}">Cart({{ Cart::count() }})</a>
          </li>
          <li class="font-medium text-3xl duration-200 text-white mb-5">
            <a href="{{ route('order.index') }}">View Order</a>
          </li>
        </ul>
        <div class="absolute top-4 right-4 cursor-pointer text-white text-2xl" id="close-nav">
          <i class="fa-solid fa-xmark"></i>
        </div>
      </div>
    </div>
  </nav>
</header>