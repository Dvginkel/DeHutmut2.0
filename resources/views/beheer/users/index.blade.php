@extends('beheer.master') @section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<h2>Gebruikers overzicht</h2>
<div class="row">
  <div class="table-responsive">
    <table class="table table-striped table-sm">

      @foreach($users as $user)
      <tr>
        <td>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#{{ $user->id }}">
            {{ $user->name }}
          </button>

          <!-- Modal -->
          <div class="modal fade" id="{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $user->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Gebruiker Gegevens: {{ $user->name }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="container-fluid">
                    <p class="ml-1">Algemene Gegevens</p>
                    <div class="row border mb-3 card bg-light" id="general">
                      <div class="col-md-3">Naam</div>
                      <div class="col-md-9">{{ $user->name }}</div>
                      <div class="col-md-3">E-mailadres</div>
                      <div class="col-md-9">{{ $user->email }}</div>
                      <div class="col-md-3">Lid Sinds</div>
                      <div class="col-md-9">{{ $user->created_at->format('d-m-Y H:i:s') }}</div>
                    </div>
                    @if(!empty($user->roles))
                    <p class="ml-1">Rechten</p>
                    <div class="row border card bg-light mb-3" id="Rechten">
                      <div class="col-md-12">
                        @foreach($user->roles as $role)
                        <div class="form-check">
                          <input type="checkbox" checked class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">{{ $role->name }}</label>
                        </div>
                        @endforeach
                      </div>
                    </div>
                    @endif
                    <p class="ml-1">Acties</p>
                    <div class="row border p-3 mb-3 card bg-light" id="Rechten">
                      <div class="btn-group ml-auto mr-auto" id="Acties" role="group" aria-label="Basic example">
                        <button class="btn btn-outline-danger delete" value="{{ $user->id }}">Verwijderen</button>
                        <button class="btn btn-outline-dark block" value="{{ $user->id }}">Blokkeren</button>
                        <button class="btn btn-outline-warning deactivate" value="{{ $user->id }}">Deactiveren</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection