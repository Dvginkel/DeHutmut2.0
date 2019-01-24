@extends('beheer.master')

@section('content')
<main role="main" class="mt-5">
   @include('beheer.categories.add')
   
</main>
@include('beheer.categories.edit')
@endsection