@extends('beheer.master')
@section('content')
<script src="../../../js/beheer/categories.js" ></script>
<script src="../../../js/beheer/sizes.js" ></script>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(!empty($product))
<form method="post" action="/beheer/products/{{ $product->id}}">
  @csrf
  <div class="form-group">
      <span class="input-group-addon">
    <img src="{{ $product->photo }}" id="productPhoto" class="img-fluid rounded mx-auto d-block" alt="{{ $product->name}}">
    </span>
  </div>
  <div class="form-group">
    <label for="productNumber">Product nummer</label>
    <input type="text" class="form-control" id="productname" aria-describedby="productNumber" name="productNumber" value="{{ $product->product_number}}" >
  </div>
  <div class="form-group">
    <label for="productName">Productnaam</label>
    <input type="text" class="form-control" id="productname" aria-describedby="productName" name="productName" value="{{ $product->name}}" >
  </div>
  <div class="form-group">
    <label for="productDescription">Omschrijving</label>
    <input type="text" class="form-control" id="productDescription" aria-describedby="productDescription" name="productDescription" value="{{ $product->description}}" >
  </div>
  <div class="form-group">
    <label for="productSize">Maat</label>
    <input type="text" class="form-control" id="productSize" aria-describedby="productSize" name="productSize" value="{{ $product->size}}" >
  </div>
   <div class="form-group">
    <label for="productColor">Kleur</label>
    <input type="text" class="form-control" id="productColor" aria-describedby="productColor" name="productColor" value="{{ $product->color}}" >
  </div>
   <div class="form-group">
    <label for="productAge">Leeftijd</label>
    <input type="text" class="form-control" id="productAge" aria-describedby="productAge" name="productAge" value="{{ $product->age}}" >
  </div>
   <div class="form-group ">
      <select class="selectpicker selectpicker show-tick form-control" name="productCategorie">
      <option selected value="{{ $categorieName->name }}">{{ $categorieName->name }}</option>
      @foreach ($catTests as $catTest)
      <optgroup label="{{ $catTest->name }}">

            @foreach ($catTest->subCategories as $subCategories)
                <option value="{{ $subCategories->id }}">{{ $subCategories->name }}</option>

              @endforeach
      </optgroup>
      @endforeach
    </select>
</div>

  <div class="form-group mb-3">
     <input id="productActive" class="form-input" name="productActive" type="checkbox" value="{{ $product->active }}"
            @if($product->active == 1) checked=checked @endif
            >
      <label id="lblActive" class="form-check-label" for="productActive">Product Actief</label>
      <small><br><strong>Als vinkje uitstaat, staat product niet op de website</strong></small>
  </div>
  <input type="hidden" name="product_id" value="{{ $product->id}}">
  <button type="submit" class="btn btn-primary pull-right mb-5">Wijzigingen Opslaan</button>
</form>
@endif

@endsection
