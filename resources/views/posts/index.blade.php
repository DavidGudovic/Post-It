@extends('templates.app')

@section('content')
  <div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 m-3 rounded-lg flex justify-center">
      <div class="mb-4 w-full">
        <form  action="{{ route('posts') }}" method="post">
          @csrf
          <label for="body" class='sr-only'>Body</label>
          <textarea name="body" id='body' rows="4" cols="30" class='bg-gray-100 border-2 w-full p-4 roundedlg @error('body') border-red-500 @enderror' placeholder='Post something!'></textarea>

            @error('body')
              <div class="text-red-500 text-sm">
                {{ $message }}
              </div>
            @enderror
            <div>
              <button type="submit" class="bg-blue-500 text-white px-4 py-3 my-3 rounded font-medium w-full">Post</button>
            </div>
          </form>

          <div class="">
            @if($posts->count())
               @foreach($posts as $post)
                 <div class="mb-4">
                   <a href="#" class='font-bold'>{{$post->user->username}}</a> <span class='text-gray-600 text-sm'> {{$post->created_at->diffForHumans()}} </span>
                   <p class='mb-2'> {{ $post->body }}</p>
                 </div>
               @endforeach
               {{$posts->links()}}
            @else
              <p>There are no posts</p>
            @endif
          </div>
        </div>
      </div>
    </div>
  @endsection
