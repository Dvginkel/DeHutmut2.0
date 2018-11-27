@extends('layouts.master') @section('content')

<script>
  $(document).ready(function () {
    $('[data-rel=popover]').popover({
      html: true,
      trigger: "hover"
    });
  })
</script>

<div class="row">
  <div class="col-md-12 mt-3" id="welcomeMessage">
    <h1>Winnaars</h1>
    <p>Overzicht van de meest recente winnaars</p>
  </div>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Wie</th>
          <th scope="col">Wat</th>
          <th scope="col">Gewonnen op</th>
        </tr>
      </thead>
      <tbody>
        @foreach($winners as $winner)
        <tr>
          <td>{{ $winner->username }}</td>

          <td> <a class="btn btn-primary btn-block" data-toggle="collapse" href="#{{ $winner->id }}" role="button"
              aria-expanded="false" aria-controls="#{{ $winner->id }}">
              {{ $winner->productname }}
            </a>
            <div class="collapse" id="{{ $winner->id }}">
              <div class="card card-body">
                <img src='{{ $winner->photo }}' width=100% height=100%>
              </div>
            </div>
          </td>
          <td>{{ $winner->gewonnenop($winner->created_at) }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection