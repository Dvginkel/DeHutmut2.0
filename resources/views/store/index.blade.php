 @extends('layouts.master') @section('content')
<div class="container">
    <!-- Example row of columns -->
    <div class="row">

        <div class="col-md-12 ">
            <h1>De Hutmut Winkel </h1>
        </div>

       
        <div class="col-md-11 mb-3 mr-auto ml-auto">
            <div class="alert-box error">Opgelet! Wanneer u een lootje wint moet u binnen 12 uur contact opnemen met Doreth van Dam</div>
            <div class="alert-box warning">Wanneer de ophaal afspraak is gemaakt, moeten de gewonnen spullen  <strong>binnen 4 dagen</strong> opgehaald worden!</div>
            <div class="alert-box notice">Bij technische problemen neem contact op met Dennis van Ginkel Of per e-mail: dennis@dehutmut.nl</div>
        </div>

        @if(!empty($mainCategories)) @foreach($mainCategories as $mainCategory)

        <div class="col-md-4 mb-3">
            <div class="card">
                <p class="card-title ml-auto mr-auto">{{ $mainCategory->name }}</p>
                <img class="img-fluid" src="{{ $mainCategory->photo }}" alt="{{$mainCategory->name}}">
                <div class="card-body">
                    <p class="card-text ml-auto mr-auto">{{ $mainCategory->description }}</p>
                    <a href="/store/{{ $mainCategory->id }}/{{ $mainCategory->slug }}" class="btn mtn-md btn-primary btn-block">Bekijk Categorie</a>
                </div>
            </div>
        </div>
        <br> @endforeach @endif
       
    </div>
    {{ $mainCategories->links() }}
    <hr>
</div>
<!-- /container -->

@endsection