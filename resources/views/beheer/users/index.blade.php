@extends('beheer.master')

@section('users')
<h2>Gebruikers overzicht</h2>
<div class="row">
          <div class="table-responsive">
            <table class="table table-striped table-sm">

                @foreach($users as $user)
                <tr>
                  <td>
                     <a class="btn btn-primary btn-block" data-toggle="collapse" href="# {{ $user->id }}" role="button" aria-expanded="false" aria-controls=" {{ $user->id }}">
                     {{ $user->name }}
                    </a>
                    <div class="collapse" id=" {{ $user->id }}">
                      <div class="card card-body">
                        <h4>Gebruiker Gegevens</h4>
                        <form>
                          <div class="form-group">
                            <label for="name">Naam</label>
                            <input type="text" class="form-control" disabled id="exampleInputEmail1" value="{{ $user->name}}" aria-describedby="name" placeholder="Naam">
                          </div>
                          <div class="form-group">
                            <label for="email">E-mailadres</label>
                            <input type="email" class="form-control" id="email" placeholder="Emailadres" value="{{ $user->email }}">
                          </div>
                          <div class="form-group">
                            <label for="member">Lid sinds</label>
                            <input type="text" class="form-control" disabled id="member" value="{{ $user->created_at }}" aria-describedby="member" placeholder="Naam">
                          </div>
                         <!--  <button type="submit" class="btn btn-primary">Submit</button> -->
                        </form>
                        <hr>
                          @include('beheer.users.role')
                        <hr>
                        <h4>Acties</h4>
                        <div>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-sm btn-outline-danger mr-1">Verwijderen</button>
                            <button type="button" class="btn  btn-sm btn-outline-info mr-1">Uitschakelen</button>
                            <button type="button" class="btn  btn-sm btn-outline-danger">Blokkeren</button>
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
