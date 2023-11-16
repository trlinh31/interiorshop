@extends("includes.master")
@section("body")
<div class="max-w-screen-xl mx-auto mt-10 min-h-[72vh] px-4">
  <h1 class="text-3xl font-bold text-gray-600 pb-4">Orders History</h1>
  <div class="overflow-x-auto">
    @if($orders->count() > 0)
    <table class="w-full table-auto text-sm text-left">
      <tbody>
        @foreach ($orders as $order)
          <tr class="bg-white border-b">
            <td scope="row" class="px-6 py-4">
              <img src="{{ asset('images/'. $order->image) }}" class="min-w-[200px] h-[200px] object-contain" alt="">
            </td>
            <td scope="row" class="px-6 py-4">
              <p class="whitespace-nowrap">{{ $order->name }}</p>
            </td>
            <td scope="row" class="px-6 py-4">
              <p class="d-flex">
                <i class="fa-solid fa-xmark hidden lg:inline-block"></i>
                {{ $order->quantity }}
              </p>
            </td>
            <td scope="row" class="px-6 py-4">
              <p class="line-clamp-1">{{ number_format($order->total, 0, '', '.') }}đ</p>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    @endif
  </div>
</div>
@endsection