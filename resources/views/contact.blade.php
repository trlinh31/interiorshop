@extends("includes.master")
@section("body")
<div class="min-h-[90vh] flex justify-center items-center">
  <div class="shadow-2xl max-w-[500px] w-full p-6">
    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900">Contact Us</h2>
    <form action="{{ route('contact.submit') }}" method="post">
      @csrf
      <div class="w-full">
        <div class="mb-3">
          <input type="text" name="email" value="{{ old('email') }}" class="block w-full px-3 border border-gray-300 focus:border-blue-600 outline-none py-1.5 text-gray-900 shadow-sm sm:text-sm sm:leading-6" placeholder="Email" autocomplete="off">
          <span class="text-sm text-red-600">{{ $errors->error->first('email') }}</span>
        </div>
        <div class="mb-3">
          <input type="text" name="subject" value="{{ old('subject') }}" class="block w-full px-3 border border-gray-300 focus:border-blue-600 outline-none py-1.5 text-gray-900 shadow-sm sm:text-sm sm:leading-6" placeholder="Subject" autocomplete="off">
          <span class="text-sm text-red-600">{{ $errors->error->first('subject') }}</span>
        </div>
        <div class="mb-3">
          <textarea name="message" rows="5" value="{{ old('message') }}" class="block w-full px-3 border border-gray-300 focus:border-blue-600 outline-none py-1.5 text-gray-900 shadow-sm sm:text-sm sm:leading-6" placeholder="Message" autocomplete="off"></textarea>
          <span class="text-sm text-red-600">{{ $errors->error->first('message') }}</span>
        </div>       
        <div>
          <button type="submit" class="w-full text-xl uppercase bg-blue-600 py-2 text-white shadow-lg">Send</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection