@extends('beheer.master')
@section('content')
<div class="container mt-5">
    @if (session('status'))
        <div class="alert alert-success" id="status">
            {{ session('status') }}
        </div>
    @endif
    <div class="col-lg-12 mb-1">
        <div class="faqHeader">Veel Gestelde Vragen</div>
            @foreach($faqs as $faq)
                <div class="card mb-3">
                    <div class="card-header">
                        <h4 class="card-header">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#{{ $faq->id }}">{{ $faq->question }}
                        </h4>
                    </div>
                <div id="{{ $faq->id }}" class="panel-collapse collapse in mb-5">
                    <div class="card-block m-1">
                        {{ $faq->anwser }}
                    </div>
                </div>
                    <div  class="col-md-12 ml-auto mr-auto mb-1">
                        <a href="/beheer/faq/{{ $faq->id}}/edit" class="btn btn-sm btn-primary ml-auto mr-auto mb-1 mt-1">Vraag aanpassen</a>
                        <a href="/beheer/faq/{{ $faq->id}}/delete" class="btn btn-sm btn-danger ml-auto mr-auto mb-1 mt-1">Vraag Verwijderen</a>
                    </div>
                </div>
            @endforeach
        </div>

 @include('beheer.faq.restore')
   @include('beheer.faq.add')

</div> <!-- container -->


<script src="../../../js/beheer/faq.js" ></script>

@endsection
