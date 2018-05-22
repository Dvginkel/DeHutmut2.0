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
<br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Onderwerp</th>
      <th scope="col">Ontvangen</th>

    </tr>
  </thead>
  <tbody>
     @foreach($messages as $message)
    <tr>
        <td>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $message->id }}">
                Lees bericht
            </button>
        </td>
        <td>
            {{ $message->created_at->format("d-m-Y H:i:s") }}
        </td>
    </tr>


<div class="modal fade" id="{{ $message->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
         {{ $message->title }}
        <h5 class="modal-title" id="exampleModalLabel">{{ $message->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ $message->message }}
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
      </div>

    </div>
  </div>
</div>

            @endforeach
              </tbody>
</table>
        </div>
    </div>
@endsection
