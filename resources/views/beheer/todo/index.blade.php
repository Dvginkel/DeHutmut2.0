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
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#todoDetails">
            Bekijken
          </button>
          <!-- Modal -->
          <div class="modal fade" id="todoDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">{{ $todo->title }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  {{ $todo->description }}
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Completed</button>
                  <button type="button" class="btn btn-danger">Verwijderen</button>
                </div>
              </div>
            </div>
          </div>

          @endif @endif
        </td>
      </tr>

      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Title</th>
          <th scope="col">Wie</th>
          @if($todo->user_id === auth()->user()->id)
          <th scope="col">Actions</th>
          @endif
        </tr>
        @endforeach
      </thead>
    </tbody>
  </table>
</div>
@endsection