@extends('beheer.master') @section('content')

<div class="container mt-5">
    @include('beheer.faq.add')
</div>
<hr>
<div class="container">
    @include('beheer.faq.overview')
</div>
<hr>
<div class="container">
    @include('beheer.faq.edit')
</div>

<script src="../../../js/beheer/faq.js"></script>
@endsection