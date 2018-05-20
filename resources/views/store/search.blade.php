 @extends('layouts.master')
 @section('content')

<script src="../../js/registerLootje.js"></script>

    <div class="row">
        <div class="col-md-12 ml-auto mr-auto" id="status">
            @if (session('error'))
                <div class="alert alert-warning justify-content-center align-items-center" id="msgSucces">{{ session('error') }}</div>
            @endif
        </div>
        <div class="col-md-12 ml-auto mr-auto form-group">
                <a href="/store"><button class="btn btn-primary">Terug naar de Winkel</button></a>
        </div>
        <hr>

         <div class="col-md-12" id="defaultLoadedProducts">
            @if ($searchResults->isEmpty())
                <p>Geen resultaten gevonden</p>
            @else
            @foreach($searchResults as $searchResult)
            <div class="card">
                <img class="card-img-top img-responsive" width="50%" src="{{ $searchResult->photo }}" alt="{{ $searchResult->name }}">
                <div class="card-body">
                    <h5 class="card-title">Product: {{ $searchResult->name }}</h5>
                    <p class="card-text">Omschrijving: {{ $searchResult->description }}</p>
                    <p class="card-text">Kleur: {{ $searchResult->color }}</p>
                    <p class="card-text">Maat: {{ $searchResult->size }}</p>
                    <p class="card-text">{{ $searchResult->age }}</p>
                    <form method="post" action="/ticket">
                        {{ csrf_field() }}
                         <input type="hidden" name="product_id" value="{{ $searchResult->id}}">
                        <input type="submit" name="register" class="btn btn-primary btn-block" value="Vraag Lootje">
                    </form>

                </div>
            </div>
            <br>
            @endforeach
            @endif
            <div class="col-md-12">
            </div>
        </div>
    </div>
@endsection
