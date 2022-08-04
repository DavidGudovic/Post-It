@extends('templates.app')

@section('content')
  <div class="flex justify-center">
    <div class="w-8/12">
      <div class="p-6 text-center">
        <h1 class='text-2xl font-medium mb-1'>{{$user->username}}</h1>
        <p>Posted {{$posts->count()}} {{Str::plural('postit',$posts->count())}}
          and recieved {{$user->receivedLikes->count()}} likes</p>
        </div>

        <div class="bg-white p-6 m-3 rounded-lg flex">
          @if($posts->count())
            <div class="">
              @foreach($posts as $post)
                <x-post :post='$post'/>
              @endforeach
              {{$posts->links()}}
            @else
              <p>{{$user->username}} has no posts!</p>
            @endif
          </div>

        </div>

      </div>
    </div>
  @endsection
