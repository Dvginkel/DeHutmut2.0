@extends('layouts.master')
@section('content')
@foreach($posts as $post)


<div class="col-md-12 mt-1" style="background-color: magenta; -moz-border-radius: 10px; -webkit-border-radius: 10px; border-radius: 10px;">
    <h1>{{ $post->title }}</h1>
    <article>
        <p>
            {!! $post->message !!}
        </p>
    </article>
</div>

@endforeach
{{ $posts->links() }}
@endsection