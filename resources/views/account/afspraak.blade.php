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
        <div class="col-md-10 ml-auto mr-auto">

            <h4>Ophaal Afspraak maken</h4>
                <p>Maak via deze pagina een afspraak met Doreth om je gewonnen product(en) op te halen.</p>
                <br>
                 @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="message">
                    {{ session('message') }}
                </div>
            @endif
            <br>
                <!--   @foreach($gewonnenProducten as $gewonnenProduct)
                        <option>{{ $gewonnenProduct->name }}</option>
                        @endforeach -->
            <table class="table">
            <thead>
                <tr>
                  <th scope="col">Product</th>
                  <th scope="col">Gewonnen</th>
                  <th scope="col">Afspraak maken</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{ $gewonnenProduct->name }}</td>
                  <td>{{ $gewonnenProduct->created_at->format('d-m-Y H:i:s') }}</td>
                  <td>
                    <form method="POST" action="/account/afspraak">
                        {{ csrf_field() }}
                        <input type="hidden" name="product_id" value="{{ $gewonnenProduct->id}}">
                        <button class="btn btn-primary">Afspraak Maken</button></td>
                    </form>
                </tr>
              </tbody>
            </table>

        </div>
    </div>
@endsection
