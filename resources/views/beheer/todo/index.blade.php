@extends('beheer.master') @section('content')

<div class="container">
  <!-- Example row of columns -->
  <div class="row">
    <div class="col-md-9">
      <h2>ToDo Lijstje</h2>
      <p>Overzicht van de taken die nog gedaan moeten worden.</p>
    </div>
  </div>
  <table class="table">
    <tbody>
      @foreach($todos as $todo)
      <tr>
        <td>{{ $todo->id }}</td>
        <td>{{ $todo->title }}</td>
        <!-- <td>{{ $todo->description }}</td> -->
        <td>{{ $todo->name }}</td>
        <td>
          @if(isset($todo)) @if($todo->user_id === auth()->user()->id)
          <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#{{ $todo->id }}" aria-expanded="false"
            aria-controls="{{ $todo->id }}">
            View
          </button>
          @endif @endif
        </td>
        <div class="collapse" id="{{ $todo->id }}">
          <div class="card">
            <div class="card-header">
              {{ $todo->title }}
            </div>
            <div class="card-body">
              <!-- <h5 class="card-title">Special title treatment</h5> -->
              <p class="card-text">{{ $todo->description }}</p>
              <div class="form-group">
                <form action="/beheer/todo/{{$todo->id }}">
                  <input type="hidden" name="_method" value="PATCH">
                  <button class="btn btn-primary btn-block">Mark as Complete</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </tr>
      @endforeach
      <thead>
        <tr>
          <th scope="col">ÍD</th>
          <th scope="col">Title</th>
          <th scope="col">Wie</th>
          @if($todo->user_id === auth()->user()->id)
          <th scope="col">Actions</th>
          @endif
        </tr>
      </thead>
    </tbody>
  </table>
</div>
@endsection