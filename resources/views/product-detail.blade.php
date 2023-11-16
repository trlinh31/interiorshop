@extends("includes.master")
@section("body")
<div class="max-w-screen-xl lg:mx-auto mt-10 mx-10">
  <nav class="flex">
    <ol class="inline-flex items-center">
      <li class="inline-flex items-center">
        <a href="{{ route('HomeIndex') }}" class="hover:text-blue-600 text-lg font-medium text-gray-600">Home</a>
      </li>
      <li class="inline-flex items-center">
        <i class="fa-solid fa-chevron-right text-gray-400 mx-2"></i>
        <a href="{{ route('shop.index') }}" class="hover:text-blue-600 text-lg font-medium text-gray-600">{{ $product->category->name }}</a>
      </li>
      <li class="inline-flex items-center">
        <i class="fa-solid fa-chevron-right text-gray-400 mx-2"></i>
        <span class="text-lg font-medium text-gray-600 line-clamp-1">{{ $product->name }}</span>
      </li>
    </ol>
  </nav>
  <div class="grid grid-cols-12 mt-10">
    <div class="col-span-12 md:col-span-5">
      <img src={{asset('images/'. $product->image)}} class="w-full object-cover" alt="...">
    </div>
    <div class="col-span-12 md:col-span-7">
      <h1 class="text-3xl text-gray-700 font-bold">{{ $product->name }}</h1>
      <div class="flex items-center mt-5">
        <p class="text-2xl text-red-600 font-semibold pr-3">{{ number_format($product->price - ($product->price * $product->discount / 100), 0, '', '.') }}đ</p>
        <p class="line-through text-gray-500 {{ $product->discount == 0 ? 'hidden' : false }}">{{ number_format($product->price, 0, '', '.') }}đ</p>
      </div>
      <div class="mt-7">
        <p class="font-bold">Description:</p>
        <p class="text-gray-500">{{ $product->description }}</p>
      </div>
      <div class="mt-7">
        <a href="{{ route('cart.add', ['id'=>$product->id]) }}" class="bg-blue-600 hover:bg-blue-700 text-white shadow-lg block text-center w-full max-w-[200px] py-2 uppercase">
          <i class="fa-solid fa-cart-shopping pr-1"></i>
          Add to cart
        </a>
      </div>
    </div>
  </div>
  <div class="my-10 border border-gray-300 rounded-xl p-10">
    <h1 class="text-4xl font-semibold uppercase">Comments</h1>
    <form action="{{ route('shop.comments') }}" method="post">
      @csrf
      <div class="mt-5">
        <div class="max-w-[600px] w-full">
          <div class="mb-3">
            <input type="text" name="name" value="{{ old('name') }}" class="block w-full px-3 border border-gray-300 focus:border-blue-600 outline-none py-1.5 text-gray-900 shadow-sm sm:text-sm sm:leading-6" placeholder="Your name" autocomplete="off">
            <span class="text-sm text-red-600">{{ $errors->error->first('name') }}</span>
          </div>
          <div class="mb-3">
            <input type="text" name="email" value="{{ old('email') }}" class="block w-full px-3 border border-gray-300 focus:border-blue-600 outline-none py-1.5 text-gray-900 shadow-sm sm:text-sm sm:leading-6" placeholder="Your email" autocomplete="off">
            <span class="text-sm text-red-600">{{ $errors->error->first('email') }}</span>
          </div>
          <div class="mb-3">
            <textarea name="messages" rows="5" value="{{ old('messages') }}" class="block w-full px-3 border border-gray-300 focus:border-blue-600 outline-none py-1.5 text-gray-900 shadow-sm sm:text-sm sm:leading-6" placeholder="Your Comments" autocomplete="off"></textarea>
            <span class="text-sm text-red-600">{{ $errors->error->first('messages') }}</span>
          </div>
          <div class="rating">
            <input value="5" name="rating" id="star5" type="radio">
            <label for="star5"></label>
            <input value="4" name="rating" id="star4" type="radio">
            <label for="star4"></label>
            <input value="3" name="rating" id="star3" type="radio">
            <label for="star3"></label>
            <input value="2" name="rating" id="star2" type="radio">
            <label for="star2"></label>
            <input value="1" name="rating" id="star1" type="radio">
            <label for="star1"></label>
          </div>  
          <div class="mb-3">
            <span class="text-sm text-red-600">{{ $errors->error->first('rating') }}</span>
          </div>        
          <div>
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit" class="w-full bg-blue-600 py-2 text-white shadow-lg">Send</button>
          </div>
        </div>
      </div>
    </form>
    @if(count($product->comments) > 0)
    <ul class="mt-10">
      @foreach ($product->comments as $comment)
      <li class="mb-5">
        <div class="cmt-top mb-1">
          <p class="font-bold">{{ $comment->name }}</p>
        </div>
        <div class="cmt-rating mb-1">
          @for ($i = 0; $i < $comment->rating; $i++)
            <i class="fa-solid fa-star"></i>
          @endfor
        </div>
        <div class="line-clamp-3">
          <p>{{ $comment->messages }}</p>
        </div>
      </li>
      @endforeach
    </ul>
    @endif
  </div>
</div>
@endsection