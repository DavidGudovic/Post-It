@extends('templates.app')

@section('content')
  <div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 m-3 rounded-lg">

      @if(session()->has('status'))
        <p class='text-center mb-3 text-red-600'>{{session('status')}}</p>

      @endif

      <form class="" action="{{route('login')}}" method="post">
       @csrf

          <div class="mb-4">
             <label for='email' class='sr-only'>email</label>
             <input type="text" name="email" id='email' placeholder="Your email" class='bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror' value='{{old('email')}}'>
             @error('email')
               <div class="text-red-500 mt-2 text-sm">
                  {{$message}}
               </div>
             @enderror
          </div>

          <div class="mb-4">
             <label for= 'password' class='sr-only'>Password</label>
             <input type= 'password' name= 'password' id= 'password' placeholder="Your password" class='bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror' >
             @error('password')
               <div class="text-red-500 mt-2 text-sm">
                  {{$message}}
               </div>
             @enderror
          </div>
          <div class="mb-4">
            <div class="flex items-center">
                <input type="checkbox" name="remember" class="mr-2" id='remember'>
                <label for='remember'>Remember me</label>
            </div>
          </div>
          <div>
             <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Login</button>
          </div>
      </form>
    </div>
  </div>
@endsection
