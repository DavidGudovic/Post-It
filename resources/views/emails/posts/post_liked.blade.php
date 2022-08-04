@component('mail::message')
#Your post was liked

{{$liker->username}} liked one of your posts
@component('mail::button', ['url' => route('posts.show', $post)])
Check out the post!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
