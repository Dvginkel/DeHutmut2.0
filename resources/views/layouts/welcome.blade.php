        @extends('layouts.master')
                @section('content')

<div class="container">
  <div class="row">
    <div class="col">
      <h1>Nieuwsberichten</h1>
      <hr>
        @foreach($posts as $post)
          <div class="col-md-12 blog-main ml-auto mr-auto mb-1 mt-3 mr-1 ml-1">
            <div class="blog-post">
            <h2 class="<b></b>log-post-title mt-1">{{ $post->title }}</h2>
            @if($post->updated_at != $post->created_at)
                <p class="blog-post-meta">{{ $post['updated_at']->format('d-m-Y H:i')  }}  by <a href="#">{{ $post->user->name }}</a></p>
                @else
                  <p class="blog-post-meta">{{ $post['created_at']->format('d-m-Y H:i')  }}  by <a href="#">{{ $post->user->name }}</a></p>
            @endif
                {!!html_entity_decode($post->message)!!}
            </div><!-- /.blog-post -->
          </div><!-- /.blog-main -->
          <hr>
        @endforeach
    </div>
  </div>
</div>
      {{$posts->links()}}
@endsection
