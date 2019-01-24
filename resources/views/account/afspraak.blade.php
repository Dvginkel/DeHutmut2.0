@extends('layouts.master') @section('content')
<style>
    body {
        padding-top: 30px;
    }

    .glyphicon {
        margin-bottom: 10px;
        margin-right: 10px;
    }

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
        <br> @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="message">
            {{ session('message') }}
        </div>
        @endif
        <br>
        
            @php
                $count = count($gewonnenProducten)
            @endphp

            @if($count === 1)
                @foreach($gewonnenProducten as $gewonnenProduct)
               
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{$gewonnenProduct->photo}}" alt="">
                    <div class="card-body">
                        <h5 class="card-title"> {{ $gewonnenProduct->productname }}</h5>
                        <p class="card-text">Gewonnen op: {{ $gewonnenProduct->created_at->format('d-m-Y H:i:s') }}.</p>
                        <form method="POST" action="/account/afspraak">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="product_id" value="{{ $gewonnenProduct->product_id}}">
                                    <button class="btn btn-primary">Afspraak Maken</button>
                        </form>
                    </div>
                </div>
                
                       
                        
                           
                        
                    
                @endforeach
                @else 
                
                @foreach($gewonnenProducten as $gewonnenProduct)
                <div class="card mb-1" width="25%">
                <img class="card-img-top" src=" {{ $gewonnenProduct->photo }}" alt="{{ $gewonnenProduct->productname }}">
                    <div class="card-body">
                        <h5 class="card-title"> {{ $gewonnenProduct->productname }}</h5>
                        <p class="card-text">Gewonnen op: {{ $gewonnenProduct->created_at->format('d-m-Y H:i:s') }}.</p>
                        <form method="POST" action="/account/afspraak">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="product_id" value="{{ $gewonnenProduct->product_id}}">
                                    <button class="btn btn-primary">Afspraak Maken</button>
                        </form>
                    </div>
                </div>
                
                @endforeach
                   <div class="ml-auto mr-auto">
                        <form method="POST" action="/account/afspraak">
                            {{ csrf_field() }}
                            @foreach($test as $item)
                                <input type="hidden" name="product_id[]" value="{{  $item }}">
                            @endforeach
                            <button class="btn btn-primary">Afspraak voor alles</button>
                        </form>
                    </div>
            @endif

            </tbody>
        </table>

    </div>
</div>
@endsection