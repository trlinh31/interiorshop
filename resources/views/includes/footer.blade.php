<footer class="bg-white shadow dark:bg-gray-900">
  <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
      <div class="sm:flex sm:items-center sm:justify-between">
        <a href="{{ route('HomeIndex') }}" class="text-white text-2xl md:text-4xl font-bold">LinhTran<span>.</span></a>
          <ul class="flex flex-wrap items-center mb-6 mt-4 md:mt-0 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
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
              <a href="{{ route('contact.index') }}">View Order</a>
            </li>
          </ul>
      </div>
      <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
      <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023. All Rights Reserved.</span>
  </div>
</footer>