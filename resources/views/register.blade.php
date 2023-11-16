@extends("includes.master")
@section("body")
<div class="min-h-[90vh] flex justify-center items-center">
  <div class="shadow-2xl max-w-[500px] w-full p-6">
    <h1 class="text-4xl font-bold uppercase border-b pb-2 mb-5">Register</h1>
    <form action="{{ route('register.submit') }}" method="post">
      @csrf
      <div class="mb-5">
        <div class="grid grid-cols-1">
        <label for="name">Full Name</label>
        <div class="mt-2">
          <input type="text" id="name" name="name" value="{{ old('name') }}" class="focus:border-blue-600 w-full px-3 border border-gray-300 outline-none py-1.5 text-gray-900 shadow-sm sm:text-sm sm:leading-6">
          <span class="text-sm text-red-600">{{ $errors->error->first('name') }}</span>
        </div>
        </div>
      </div>
      <div class="mb-5">
        <div class="grid grid-cols-1">
        <label for="email">Email</label>
        <div class="mt-2">
          <input type="text" id="email" name="email" value="{{ old('email') }}" class="focus:border-blue-600 w-full px-3 border border-gray-300 outline-none py-1.5 text-gray-900 shadow-sm sm:text-sm sm:leading-6">
          <span class="text-sm text-red-600">{{ $errors->error->first('email') }}</span>
        </div>
        </div>
      </div>
      <div class="mb-5">
        <div class="grid grid-cols-1">
        <label for="password">Password</label>
        <div class="mt-2">
          <input type="password" id="password" name="password" value="{{ old('password') }}" class="input-password focus:border-blue-600 block w-full px-3 border border-gray-300 outline-none py-1.5 text-gray-900 shadow-sm sm:text-sm sm:leading-6" autocomplete="off">
          <span class="text-sm text-red-600">{{ $errors->error->first('password') }}</span>
        </div>
        </div>
      </div>
      <div class="mb-5">
        <div class="grid grid-cols-1">
        <label for="confirm">Confirm Password</label>
        <div class="mt-2">
          <input type="password" id="confirm" name="confirm" value="{{ old('confirm') }}" class="input-password focus:border-blue-600 block w-full px-3 border border-gray-300 outline-none py-1.5 text-gray-900 shadow-sm sm:text-sm sm:leading-6" autocomplete="off">
          <span class="text-sm text-red-600">{{ $errors->error->first('confirm') }}</span>
        </div>
        </div>
      </div>
      <div class="mb-5 flex items-center justify-between">
        <div class="flex items-center">
          <input type="checkbox" class="h-4 w-4" id="showPassword" onchange="showPassword">
          <label for="showPassword" class="ms-2 text-gray-500">Show Password</label>
        </div>
      </div>
      <button type="submit" class="w-full bg-blue-600 py-2 text-white">Register</button>
    </form>
  </div>
</div>
@endsection