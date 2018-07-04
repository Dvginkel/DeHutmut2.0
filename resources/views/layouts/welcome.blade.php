@extends('layouts.master') @section('content')
@foreach($posts as $post)
<div class="card border-1 mb-3">
  <div class="card-header">
      {{ $post->title }}
  </div>
  <div class="card-body">
    <article class="card-text">{!!html_entity_decode($post->message)!!}</article>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
  <div class="card-footer">
    <span class="blog-post-meta pull-right">{{ $post['created_at']->format('d-m-Y H:i') }} by
      <a href="#"> {{ $post->user->name }}</a>
    </span>

  </div>
</div>
@endforeach @endsection