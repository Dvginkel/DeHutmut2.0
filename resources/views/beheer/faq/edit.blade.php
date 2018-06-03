@extends('beheer.master') 

@section('content')

<!-- Edit FORM -->
@if(!empty($faq))

<div class="col-md-12 card bg-light">
    <h4 class="mt-1 mr-auto ml-auto">Vraag Aanpassen</h4>
        <form method="post" action="/beheer/faq">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="question">Vraag</label>
                    <input type="text" class="form-control" id="question" placeholder="Titel voor de vraag.">
                </div>
                <div class="form-group col-md-6">
                    <label for="anwser">Antwoord</label>
                    <input type="text" class="form-control" id="anwser" placeholder="Antwoord">
                </div>
            </div>
            <button type="submit" class="btn btn-primary pull-right mb-3">Toevoegen</button>
        </form>
    </div>


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