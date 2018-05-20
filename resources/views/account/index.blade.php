@extends('layouts.master')
@section('content')
<style>
body{padding-top:30px;}

.glyphicon {  margin-bottom: 10px;margin-right: 10px;}

small {
display: block;
line-height: 1.428571429;
color: #999;
}
</style>
    <div class="row">
        <div class="col-md-12">
            <h4>Mijn Account</h4>
                <p>Op deze pagina zie je een overzicht van jou gegevens, zoals deze bij ons in het systeem staan.</p>
                <br>
                @include('account.profile')
        </div>
    </div>
@endsection
