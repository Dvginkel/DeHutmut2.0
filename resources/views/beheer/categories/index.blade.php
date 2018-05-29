@extends('beheer.master') @section('content')
<script src="../js/beheer/categories.js"></script>

<main role="main">
    @if (session('status'))
    <div class="alert alert-success" id="status">
        {{ session('status') }}
    </div>
    @endif
    <h2>Categorie Beheer</h2>
    <div class="album mb-3">
        <div class="container">
            <div class="row">
                @if(!empty($categories)) @foreach($categories as $category)
                <div class="col-md-6" style="min-height: 300px;">
                    <div class="card mb-3 border-primary box-shadow">
                        <img class="card-img-top" src="{{ $category->photo }}" alt="{{ $category->name }}">
                        <div class="card-body">
                            <p class="card-text">{{ $category->name }}</p>
                            <p class="card-text">{{ $category->description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group ml-auto mr-auto">
                                    <form method="get" action="/beheer/categories/{{ $category->id }}/edit">
                                        <input type="submit" value="Edit" class="btn btn-sm bg-warning">
                                        <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach @else
                <div class="row">
                       <p>hallo</p>
                    </div>
                @endif
            </div>
        </div>
</main>
@endsection