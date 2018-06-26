 @extends('layouts.master') @section('content')
<div class="container">
    <!-- Example row of columns -->
    <div class="row">

        <div class="col-md-12 ">
            <h1>De Hutmut Winkel </h1>
        </div>
       
        {{ $subCategories }}
        <div class=" col-md-12 ml-auto mr-auto">
        </div>
        
        <br> @if($subCategories->isEmpty())
        <p> Geen sub Categorieen gevonden</p>

        @else @foreach($subCategories as $subCategorie)
        <div class="col-md-4 mb-3">
            <div class="card">
                <p class="card-title ml-auto mr-auto">{{ $subCategorie->name }}</p>
                <img class="img" src="{{ $subCategorie->photo }}" alt="{{$subCategorie->name}}">
                <div class="card-body">
                    <p class="card-text">{{ $subCategorie->description }}</p>
                    <a href="/products/{{$subCategorie->id}}/{{$subCategorie->slug}}" class="btn mtn-md btn-primary btn-block">
                        <span class="badge badge-success">
                            @php 
                            $user = auth()->user();
                            $connectedProductIds = $user->tickets->pluck('draw_id')->toArray();
                                $products = App\Product::whereNotIn('id', $connectedProductIds)
                                ->where('cat_id', '=', $subCategorie->id)
                                ->where('active', '=', 1)
                                ->count();
                            @endphp

                            {{ $products }}
                        </span> Product(en) Bekijken</a>
                </div>
            </div>
        </div>
        <br> @endforeach @endif
    </div>

    <hr>

</div>
<!-- /container -->

@endsection