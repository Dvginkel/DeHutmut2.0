@extends('layouts.master') 
@section('content') 
@foreach($posts as $post)


 <div class="col-md-10 blogShort">
                     <h1>{{ $post->title }} 1</h1>
                     {{--  <img src="http://www.kaczmarek-photo.com/wp-content/uploads/2012/06/guinnes-150x150.jpg" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail">  --}}
                     
                         <em>This snippet use <a href="http://bootsnipp.com/snippets/featured/sexy-sidebar-navigation" target="_blank">Sexy Sidebar Navigation</a></em>
                     <article><p>
                         Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                         ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only 
                         five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release
                         of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of
                         Lorem Ipsum.    
                         </p></article>
                     <a class="btn btn-blog pull-right marginBottom10" href="http://bootsnipp.com/user/snippets/2RoQ">READ MORE</a> 
                 </div>

    <div class="col-md-1 mt-3"></div>
	<div class="col-md-12">
		<div id="postlist">
			<div class="card p-1" style="background-color: white;">
                <div class="card-heading">
                    <div class="text-center">
                        <div class="row">
                            <div class="col-sm-9">
                                <h3 class="pull-left">{{ $post->title }}</h3>
                            </div>
                            <div class="col-sm-3">
                                <h4 class="pull-right">
                                <small><em>{{ $post['created_at']->format('d-m-Y H:i') }}</em></small>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                
            <div class="card-body">
                {!!html_entity_decode($post->message)!!}<a href="#">Read more</a>
            </div>
            
            {{--  <div class="panel-footer">
                <span class="label label-default">Welcome</span> <span class="label label-default">Updates</span> <span class="label label-default">July</span>
            </div>  --}}
        </div>
        
        {{--  <div class="panel">
                <div class="panel-heading">
                    <div class="text-center">
                        <div class="row">
                            <div class="col-sm-9">
                                <h3 class="pull-left">Post With image</h3>
                            </div>
                            <div class="col-sm-3">
                                <h4 class="pull-right">
                                <small><em>2014-07-30 18:30:00</em></small>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                
            <div class="panel-body">
                <a href="#" class="thumbnail">
                    <img alt="Image" src="http://i.imgur.com/tAHVmXi.jpg">
                </a>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation... <a href="#">Read more</a>
            </div>
            
            <div class="panel-footer">
                <span class="label label-default">Image</span> <span class="label label-default">Updates</span> <span class="label label-default">July</span>
            </div>
        </div>  --}}
    </div>
		{{--  <div class="text-center"><a href="#" id="loadmore" class="btn btn-primary">Older Posts...</a></div>  --}}
</div>
	<div class="col-md-1"></div>
	<div class="col-md-3">
	</div>
	<div class="col-md-1">
	</div>

@endforeach
{{ $posts->links() }}
@endsection