        @extends('layouts.master')
                @section('content')
<main role="main" class="container">
  <div class="col-md-4 ml-auto mr-auto">
    <h3>De Hutmut West-Friesland</h3>
  </div>
      <div class="row">

        <div class="col-md-10 ml-auto mr-auto">
        <h1>Nieuwsberichten</h1>
      </div>
        @foreach($posts as $post)
          <div class="col-md-10 blog-main ml-auto mr-auto mb-1 mt-3 mr-1 ml-1 border border-success">
              <div class="blog-post">
                <h2 class="blog-post-title mt-1">{{ $post->title }}</h2>
                <p class="blog-post-meta">{{ $post['created_at']->format('d-M H:i')  }} <a href="#">Door: {{ $post->user->name }}</a></p>
                {!!html_entity_decode($post->message)!!}
              </div><!-- /.blog-post -->
          </div><!-- /.blog-main -->
  @endforeach
      </div><!-- /.row -->
      {{$posts->links()}}
</main><!-- /.container -->
@endsection
