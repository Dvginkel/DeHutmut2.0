 @extends('layouts.master') @section('content')
<div class="container">
    <!-- Example row of columns -->
    <div class="row">

        <div class="col-md-12 ">
            <h1>De Hutmut Winkel </h1>
        </div>

        @if(!empty($mainCategories)) @foreach($mainCategories as $mainCategory)

        <div class="col-md-4 mb-3">
            <div class="card">
                <p class="card-title ml-auto mr-auto">{{ $mainCategory->name }}</p>
                <img class="img" src="{{ $mainCategory->photo }}" alt="{{$mainCategory->name}}">
                <div class="card-body">
                    <p class="card-text">{{ $mainCategory->description }}</p>
                    <a href="/store/{{ $mainCategory->id }}/{{ $mainCategory->slug }}" class="btn mtn-md btn-primary btn-block">Bekijk Categorie</a>
                </div>
            </div>
        </div>
        <br> @endforeach @endif
    </div>
    <hr>
</div>
<!-- /container -->

@endsection