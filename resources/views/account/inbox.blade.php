@extends('layouts.master')
@section('content')
<style>
body{padding-top:30px;}

.glyphicon {  margin-bottom: 10px;margin-right: 10px;}

small {
display: block;
line-height: 1.428571429;
color: #999;
}
</style>
    <div class="row">
        <div class="col-md-12">
            <h4>Mijn Inbox</h4>
                <p>Hier staan al je ontvangen berichte.</p>
                <br>
                @foreach($messages as $message)
                <i>{{ $message->user_id}}</i>
            @endforeach
        </div>
    </div>
@endsection
