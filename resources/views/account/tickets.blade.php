@extends('layouts.master') @section('content')
<div class="row">
  <div class="col-md-10 ml-auto mr-auto">
    <h4>Mijn Actieve lootjes</h4>
    <div class="form-group">
      <p>Hier zie je op welke producten je een lootje hebt.</p>
      <br>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">Productnaam</th>
            <th scope="col">Einde loting</th>
          </tr>
        </thead>
        <tbody>
          @foreach($activeTickets as $activeTicket)
          <tr>
            <td>{{ $activeTicket->product_name }}</td>
            <td>{{ $activeTicket->created_at->format('d-m-Y H:i') }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection