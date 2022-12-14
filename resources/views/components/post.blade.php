@props(['post' => $post])
<div class="mb-4">
  <a href="{{route('users.posts', $post->user)}}" class='font-bold'>{{$post->user->username}}</a>
  <span class='text-gray-600 text-sm'>
    {{$post->created_at->diffForHumans()}}
  </span>
  <p class='mb-2'> {{ $post->body }}</p>

  <div class="flex items-center">

    @auth
      @if(!$post->likedBy(auth()->user()))
        <form class="mr-5"
        action="{{ route('posts.likes', $post)}}" method="post">
        @csrf
        <button type="submit" name="button" class='text-blue-500'>Like</button>
      </form>
    @else

      <form class="mr-1" action="{{ route('posts.likes', $post->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" name="button" class="text-blue-500">Unlike</button>
      </form>

    @endif
    @can('delete', $post)
      <form action="{{ route('posts.destroy', $post) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class='text-blue-500 mr-2 ml-1' name="button">Delete</button>
      </form>
    @endcan
  @endauth

  <span>{{$post->likes->count()}} {{Str::plural('like', $post->likes->count())}}</span>
  </div>
</div>
