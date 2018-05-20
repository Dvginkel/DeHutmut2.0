@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-10 ml-auto mr-auto" id="welcomeMessage">
        <h1>Actieve Lotingen</h1>
            <p>Overzicht van de lopende lotingen</p>
    </div>
    <div class="table-responsive col-md-10 mr-auto ml-auto">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Wat</th>
                  <th scope="col">Eindigt op</th>
                  <th scope="col">Vraag Lootje</th>
                </tr>
              </thead>
              <tbody>
                @foreach($activeTickets as $ticket)
                <tr>
                  <td>{{ $ticket->name }}</td>
                  <td>{{ $ticket->einde_loting }}</td>
                  <td class="mr-auto ml-auto">
                        @if(in_array($ticket->product_id, $connectedProductIds))
                              <small>
                                Je hebt al een lootje op dit product
                              </small>
                            @else
                             <form method="post" action="/ticket">
                                {{ csrf_field() }}
                                 <input type="hidden" name="product_id" value="{{ $ticket->product_id}}">
                                <input type="submit" name="register" class="mt-auto mb-auto btn btn-sm btn-primary btn-block" value="Vraag Lootje">
                            </form>
                        @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
@endsection

