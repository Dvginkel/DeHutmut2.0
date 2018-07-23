@extends('layouts.master') @section('content') @foreach($posts as $post)
<div class="card border-1 mb-3">
  <div class="card-header">
    {{ $post->title }}
  </div>
  <div class="card-body">
    <article class="card-title">{!!html_entity_decode($post->message)!!}</article>
    <button type="button" class="btn btn-primary pull-right">
        {{ $post['created_at']->format('d-m-Y H:i') }} by
        <a href="#"> {{ $post->user->name }}</a>
        </span>
      </button>
  </div>

</div>
@endforeach
{{ $posts->links() }}
@endsection