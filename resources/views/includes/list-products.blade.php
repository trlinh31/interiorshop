<div class="grid md:grid-cols-3 grid-cols-1 gap-8">
  @foreach ($products as $product)
  <div class="text-center hover:shadow-lg pb-2">
    <a href="{{ route('shop.detail', ['id'=>$product->id]) }}" class="block">
      <img src={{asset('images/'. $product->image)}} class="w-full h-[180px]" alt="...">
      <p class="font-medium line-clamp-1">{{ $product->name }}</p>
      <div class="mt-2 h-[44px]">
        <h5 class="font-bold text-red-600">{{ number_format($product->price - ($product->price * $product->discount / 100), 0, '', '.') }}đ</h5>
        <p class="line-through text-sm text-gray-500 {{ $product->discount == 0 ? 'hidden' : false }}">{{ number_format($product->price, 0, '', '.') }}đ</p>
      </div>
    </a>
  </div>
  @endforeach
</div>
