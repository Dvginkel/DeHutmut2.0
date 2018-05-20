@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12" id="welcomeMessage">
        <h1>Meest Recent Winnaars</h1>
            <p>Overzicht van de meest recente winnaars</p>
    </div>
    <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Wie</th>
                  <th scope="col">Wat</th>
                  <th scope="col">Wanneer</th>
                </tr>
              </thead>
              <tbody>
                @foreach($winners as $winner)
                <tr>
                  <td>{{ $winner->username }}</td>
                  <td>{{ $winner->productname }}</td>
                  <td>{{ $winner->gewonnenop($winner->created_at) }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
@endsection

