@extends('layouts.master') 
@section('content') 
@foreach($posts as $post)

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