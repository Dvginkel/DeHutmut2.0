 @extends('layouts.master') @section('content')
<script>
    function goBack() {
        window.history.back();
    }
</script>
<script src="../../js/registerLootje.js"></script>

<div class="row">
    <div class="col-md-12 ml-auto mr-auto" id="status">
        @if (session('error'))
        <div class="alert alert-warning justify-content-center align-items-center" id="msgSucces">{{ session('error') }}</div>
        @endif
    </div>
    <div class="col-md-12 ml-auto mr-auto form-group">
        <a href="/store">
            <button class="btn btn-primary">Terug naar de Winkel</button>
        </a>

    </div>
    <div class="col-md-12 ml-auto mr-auto">
        {{ $products->links()}}
    </div>
    <div class="col-md-12" id="defaultLoadedProducts">

        @include('layouts.filter') @if($products->isEmpty())
        <p> Geen producten gevonden @else @foreach($products as $product)
            <div class="card">
                <img class="card-img-top" src="{{ $product->photo }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title ml-auto mr-auto">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <form method="post" action="/ticket">
                        {{ csrf_field() }}
                        <input type="hidden" name="product_id" value="{{ $product->id}}">
                        <input type="submit" name="register" class="btn btn-primary btn-block" value="Vraag Lootje">
                    </form>
                    <!-- <button class="btn btn-primary btn-block" id="{{$product->id }}">Vraag een Lootje</button> -->
                </div>
            </div>
            <br> @endforeach @endif
            <div class=" col-md ml-auto mr-auto">
                {{ $products->links()}}
            </div>
    </div>
</div>
@endsection