@extends("includes.master")
@section("body")
@include("includes.hero")
<div class="max-w-screen-xl mx-auto mb-10">
  <div class="mb-20 mx-10">
    <h1 class="text-xl lg:text-4xl font-extrabold text-gray-800 border-b uppercase pb-4">New Products</h1>
    <div class="grid md:grid-cols-4 grid-cols-1 gap-8">
      @foreach ($newProducts as $product)  
      <div class="text-center hover:shadow-lg pb-2">
        <a href="{{ route('shop.detail', ['id'=>$product->id]) }}" class="block">
          <img src={{asset('images/'. $product->image)}} class="w-full h-[180px]" alt="...">
          <p class="font-medium">{{ $product->name }}</p>
          <div class="mt-2 h-[44px]">
            <h5 class="font-bold text-red-600">{{ number_format($product->price - ($product->price * $product->discount / 100), 0, '', '.') }}đ</h5>
            <p class="line-through text-sm text-gray-500 {{ $product->discount == 0 ? 'hidden' : false }}">{{ number_format($product->price, 0, '', '.') }}đ</p>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
  <div class="mb-20 mx-10">
    <h1 class="text-xl lg:text-4xl font-extrabold text-gray-800 border-b uppercase pb-4">Discounted Products</h1>
    <div class="grid md:grid-cols-4 grid-cols-1 gap-8">
      @foreach ($discountedProducts as $product)  
      <div class="text-center hover:shadow-lg pb-2">
        <a href="{{ route('shop.detail', ['id'=>$product->id]) }}" class="block">
          <img src={{asset('images/'. $product->image)}} class="w-full h-[180px]" alt="...">
          <p class="font-medium">{{ $product->name }}</p>
          <div class="mt-2 h-[44px]">
            <h5 class="font-bold text-red-600">{{ number_format($product->price - ($product->price * $product->discount / 100), 0, '', '.') }}đ</h5>
            <p class="line-through text-sm text-gray-500 {{ $product->discount == 0 ? 'hidden' : false }}">{{ number_format($product->price, 0, '', '.') }}đ</p>
          </div>
        </a>
      </div>
      @endforeach
  </div>
  </div>
</div>
@endsection