@extends('beheer.master')
@section('content')
<script src="../js/beheer/categories.js" ></script>
@if (session('status'))
    <div class="alert alert-success" id="status">
        {{ session('status') }}
    </div>
@endif
@include('beheer.products.add')
@include('beheer.products.overview')
@endsection

