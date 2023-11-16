@extends("includes.master")
@section("body")
<div class="max-w-screen-xl mx-auto mt-10">
  <div class="grid grid-cols-12 lg:gap-x-10 mx-10 min-h-[72vh]">
    <div class="col-span-12 lg:col-span-8">
      @if(Cart::count() > 0)
      <div class="relative overflow-x-auto">
        <table class="w-full table-auto text-sm text-left">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
              <tr>
                  <th scope="col" class="px-6 py-3">
                      Image
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Name
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Quantity
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Price
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Action
                  </th>
              </tr>
          </thead>
          <tbody>
            @foreach (Cart::content() as $item)
              <tr class="bg-white border-b">
                  <th scope="row" class="px-6 py-4">
                      <img src="{{ asset('images/'. $item->options->image) }}" class="w-[100px] h-[100px] object-contain" alt="">
                  </th>
                  <td class="px-6 py-4">
                    <p class="line-clamp-1">{{ $item->name }}</p>
                  </td>
                  <td class="px-6 py-4">
                      <form action="{{ route('cart.update') }}" method="post">
                        @csrf
                        <input type="hidden" name="rowId" value="{{ $item->rowId }}">
                        <input type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg outline-none py-3 px-3 w-[60px]" name="quantity" value="{{ $item->qty }}" min="0" onchange="this.form.submit()">
                      </form>
                  </td>
                  <td class="px-6 py-4">
                    {{ number_format($item->price, 0, '', '.') }}đ
                  </td>
                  <td class="px-6 py-4">
                    <form action="{{ route('cart.deleteItem') }}" method="post">
                      @csrf
                      <input type="hidden" name="rowId" value="{{ $item->rowId }}">
                      <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded-md shadow-md">
                        <i class="fa-solid fa-trash-can"></i>
                      </button>
                    </form>
                  </td>
              </tr>
            @endforeach
          </tbody>
          <caption class="caption-top text-start mb-5">
            <a href="{{ route('cart.deleteAll') }}">Delete All Products</a>
          </caption>
        </table>
      </div>
      @endif
    </div>
    @if(Cart::count() > 0)
      <div class="col-span-12 lg:col-span-4 border border-gray-300 p-6" style="height: max-content">
        <h3 class="text-3xl font-semibold uppercase border-b pb-2">Order Summary</h3>
        <div class="flex items-center justify-between mt-5">
          <p>Total:</p>
          <p class="text-red-600 font-bold">{{ Cart::priceTotal(0, '', '.') }}đ</p>
        </div>
        <div class="mt-5">
          <a href="{{ route('cart.checkout') }}" class="block w-full bg-blue-600 hover:bg-blue-700 shadow-lg text-white py-2 text-center">Check Out</a>
        </div>
      </div>
    @endif
  </div>
</div>
@endsection