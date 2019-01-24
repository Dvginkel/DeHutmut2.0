@extends('layouts.master') @section('content')

<div class="row">
  <div class="col-md-12" id="welcomeMessage">
    <h1>Vaak gestelde vragen</h1>
    <p>Door op een vraag te drukken krijg je antwoord op de betreffende vraag.</p>
  </div>
  <br>
  <div class="col-md-10 ">
    @foreach($faqs as $faq)
    <button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#{{$faq->id}}" aria-expanded="false"
      aria-controls="collapseExample">
      {{ $faq->question }}
    </button>
    <div class="collapse mb-3" id="{{ $faq->id }}">
      <div class="card card-body bg-light">
        {{ $faq->anwser }}
      </div>
    </div>
<br>
    @endforeach
  </div>
</div>
@endsection