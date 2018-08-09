@extends('beheer.master')

@section('content')
<main role="main">
   @include('beheer.categories.add')
   
</main>
@include('beheer.categories.edit')
@endsection