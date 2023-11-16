@extends("includes.master")
@section("body")
<div class="max-w-screen-xl lg:mx-auto my-10">
  <form action="{{ route('checkout.submit') }}" method="post">
    @csrf
    <div class="grid grid-cols-12 lg:gap-x-10 mx-10 min-h-[60vh]">
      <div class="col-span-12 lg:col-span-8">
        <h1 class="text-3xl font-semibold text-gray-500 pb-5">Billing Details</h1>
        <div class="mb-3 grid grid-cols-1">
          <label for="full_name">Full Name</label>
          <div class="mt-2">
            <input type="text" id="full_name" name="full_name" value="{{ Auth::user()->name }}" class="focus:border-blue-600 w-full px-3 border border-gray-300 outline-none py-1.5 text-gray-900 shadow-sm sm:text-sm sm:leading-6" readonly>
            <span class="text-sm text-red-600">{{ $errors->error->first('full_name') }}</span>
          </div>
        </div>
        <div class="mb-3 grid grid-cols-1">
          <label for="address">Address</label>
          <div class="mt-2">
            <input type="text" id="address" name="address" value="{{ old('address') }}" class="focus:border-blue-600 w-full px-3 border border-gray-300 outline-none py-1.5 text-gray-900 shadow-sm sm:text-sm sm:leading-6">
            <span class="text-sm text-red-600">{{ $errors->error->first('address') }}</span>
          </div>
        </div>
        <div class="mb-3 grid grid-cols-1">
          <label for="phone">Phone</label>
          <div class="mt-2">
            <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="focus:border-blue-600 w-full px-3 border border-gray-300 outline-none py-1.5 text-gray-900 shadow-sm sm:text-sm sm:leading-6">
            <span class="text-sm text-red-600">{{ $errors->error->first('phone') }}</span>
          </div>
        </div>
      </div>
      <div class="col-span-12 lg:col-span-4">
        <h1 class="text-3xl font-semibold text-gray-500 pb-5">Your Order</h1>
        <div class="border border-gray-300 rounded-md p-4">
          <div class="flex items-center justify-between border-b pb-4">
            <p class="font-semibold text-lg text-gray-700">Product</p>
            <p class="font-semibold text-lg text-gray-700">Total</p>
          </div>
          @foreach (Cart::content() as $item)
          <div class="flex items-center justify-between border-b pb-2 mt-4">
            <div class="flex items-center">
              <p class="font-medium text-base text-gray-500 line-clamp-1 max-w-[150px]">{{ $item->name }}</p>
              <p class="font-medium text-base text-gray-500">
                <i class="fa-solid fa-xmark"></i>
                {{ $item->qty }}
              </p>
            </div>
            <p class="font-medium text-base text-gray-500">
              {{ number_format($item->price * $item->qty, 0, '', '.') }}đ
            </p>
          </div>
          @endforeach
          <div class="flex items-center justify-between pb-4 mt-6">
            <p class="font-semibold text-lg text-gray-700">Total:</p>
            <p class="font-semibold text-lg text-gray-700">{{ Cart::priceTotal(0, '', '.') }}đ</p>
          </div>
          <div class="mt-4">
            <button type="submit" class="block w-full bg-blue-600 hover:bg-blue-700 shadow-lg text-white py-2 text-center">Confirm Order</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection