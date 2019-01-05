@extends('layouts.master') @section('content')

<style>
.catTitle {
  height: 50px;
  width: 100%;
  background-color: magenta;
  text-align: center;
  padding-top:10px;
}
</style>
<div class="container">
    <!-- Example row of columns -->
    <div class="row">

        <div class="col-md-12 mt-1 mb-1" style="text-align: center;">
            <h1>De Hutmut Winkel </h1>
        </div>
        <div class="col-md-11 mb-3 mr-auto ml-auto">
            <div class="alert alert-danger">Opgelet! Wanneer u een lootje wint moet u binnen 12 uur contact opnemen met
                Doreth van Dam</div>
            <div class="alert alert-warning">Wanneer de ophaal afspraak is gemaakt, moeten de gewonnen spullen <strong>binnen
                    4 dagen</strong> opgehaald worden!</div>
            <div class="alert alert-info">Bij technische problemen neem contact op met Dennis van Ginkel Of per e-mail:
                dennis@dehutmut.nl</div>
        </div>
        @if(!empty($mainCategories)) @foreach($mainCategories as $mainCategory)
        <div class="col-md-4 mb-3">
            <div class="card">
            <h2 class="card-title catTitle ml-auto mr-auto">{{ $mainCategory->name }}</h2>
                <img class="img-fluid" src="{{ $mainCategory->photo }}" alt="{{$mainCategory->name}}">
                
                <h5 class="card-text ml-auto mr-auto">{{ $mainCategory->description }}</h5>
                @if($mainCategory->sub_categories_count <= 1) <a href="/store/{{ $mainCategory->id }}/{{ $mainCategory->slug }}"
                    class="btn btn-md btn-primary btn-block mx-auto p-auto">Bekijk
                    Categorie</a>
                    @else
                    <a href="/store/{{ $mainCategory->id }}/{{ $mainCategory->slug }}" class="btn btn-md btn-primary btn-block mx-auto mt-1 mb-5">Bekijk
                        (Sub) Categorieën</a>

                    @endif
            </div>
        </div>
        <br> @endforeach @endif
    </div>
    {{ $mainCategories->links() }}
    <hr>
</div>
<!-- /container -->
@endsection