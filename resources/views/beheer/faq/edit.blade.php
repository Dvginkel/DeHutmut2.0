@extends('beheer.master') @section('content')

<!-- Create a navigation for Add, Edit, Delete -->
<nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample10" aria-controls="navbarsExample10"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span> Menu
  </button>

  <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/beheer/faq/add">Toevoegen</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Wijzigen</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Verwijderen</a>
      </li>
    </ul>
  </div>
</nav>
<!-- /Create a navigation for Add, Edit, Delete -->
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<!-- Edit FORM -->
@if(!empty($faq))

<form method="post" action="/beheer/faq/" id="faqForm">
  @csrf
  <div class="form-group">
    <label for="faqQuestion">Vraag</label>
    <!-- <input type="text" class="form-control border border-success" id="faqQuestion" aria-describedby="faqQuestion" name="question" value="{{ $faq->question }}" > -->
    <input id="faqQuestion" class="form-control" name="faqQuestion" value="{{ $faq->question }}">

  </div>
  <div class="form-group" id="test">
    <label for="faqAnwser">Antwoord</label>
    <!--   <input type="text" class="form-control border border-success" id="faqAnwser" aria-describedby="faqAnwser" name="anwser" value="{{ $faq->anwser }}"> -->

    <input id="faqAnwser" class="form-control" name="faqAnwser" value="{{ $faq->anwser }}">

  </div>
  <input type="hidden" name="faqId" id="faqId" value="{{ $faq->id }}">
  <button type="submit" class="btn btn-primary pull-right mb-5">Wijzigingen Opslaan</button>
</form>
@endif
<!-- /Edit FORM -->
<script src="../../../js/beheer/faq.js"></script>
@endsection