@extends("includes.master")
@section("body")
  <div class="max-w-screen-xl lg:mx-auto my-10 mx-10">
    <div class="grid grid-cols-12 lg:gap-x-10 gap-y-10">
      <div class="col-span-12 lg:col-span-4 border border-gray-300 p-4" style="height: max-content">
        <h3 class="text-2xl font-semibold uppercase pb-3 border-b">Filter Products</h3>
        <div class="mt-5">
          <form action="{{ route("shop.filter") }}" id="filter" method="post">
            @csrf
            <div class="mb-10">
              <p class="text-lg pb-4">Category</p>
              @foreach ($categories as $category)
              <div class="flex items-center mb-3">
                <input type="checkbox" class="h-4 w-4" id="{{ $category->name }}" name="cate[]" value="{{ $category->id }}">
                <label for="{{ $category->name }}" class="ms-2">{{ $category->name }}</label>
              </div>
            @endforeach
            </div>
            <div class="mb-10">
              <p class="text-lg pb-4">Price</p>
              <div class="flex items-center mb-3">
                <input type="radio" class="h-4 w-4" id="0-10" name="price" value="0-10">
                <label for="0-10" class="ms-2">0 - 10.000.000</label>
              </div>
              <div class="flex items-center mb-3">
                <input type="radio" class="h-4 w-4" id="10-30" name="price" value="10-30">
                <label for="10-30" class="ms-2">10.000.000 - 30.000.000</label>
              </div>
              <div class="flex items-center mb-3">
                <input type="radio" class="h-4 w-4" id="30-50" name="price" value="30-50">
                <label for="30-50" class="ms-2">30.000.000 - 50.000.000</label>
              </div>
              <div class="flex items-center mb-3">
                <input type="radio" class="h-4 w-4" id="50+" name="price" value="50+">
                <label for="50+" class="ms-2">50.000.000+</label>
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-10 py-1 shadow-md">Filter</button>
              <button type="reset" class="bg-gray-800 hover:bg-gray-900 text-white px-10 py-1 shadow-md">Reset</button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-span-12 lg:col-span-8" id="list-products">
        @include('includes.list-products')
      </div>
    </div>
  </div>
@endsection