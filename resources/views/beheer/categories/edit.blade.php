@extends('beheer.master') @section('content') @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<meta name="csrf-token" content="{{ csrf_token() }}"> @if(!empty($category))
<form method="post" action="/beheer/categories/{{$category->id}}">
    @csrf
    <div class="form-group">
        <span class="input-group-addon">
            <img src="{{ $category->photo }}" name="photo" id="photo" class="img-fluid rounded mx-auto d-block" alt="{{ $category->name}}">
        </span>
    </div>
    <div class="form-group">
        <label for="categorieName">Categorie naam</label>
        <input type="text" class="form-control" id="categorieName" aria-describedby="categorieName" name="name" value="{{ $category->name}}">
    </div>
    <div class="form-group">
        <label for="categoryDescription">Omschrijving</label>
        <input type="text" class="form-control" id="categoryDescription" aria-describedby="categoryDescription" name="description"
            value="{{ $category->description}}">
    </div>
    <div class="form-group mb-3">
        <input id="categoryActive" class="form-input" name="active" type="checkbox" value="{{ $category->id }}" @if($category->active == 1) checked=checked @endif >
        <label id="lblActive" class="form-check-label" for="categoryActive">Categorie Actief</label>
        <small>
            <br>
            <strong>Als vinkje uitstaat, Is de categorie uitgeschakeld.</strong>
        </small>
    </div>

    <button type="submit" class="btn btn-primary pull-right mb-5">Wijzigingen Opslaan</button>
</form>
@endif @endsection