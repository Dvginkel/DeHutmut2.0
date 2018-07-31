@extends('beheer.master') @section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<h2>Gebruikers overzicht</h2>
<div class="row">
  <div class="table-responsive">
    <table class="table table-striped table-sm">

      @foreach($users as $user)
      <tr>
        <td>
       
            <a href="/beheer/users/{{ $user->id}}/{{ $user->name }}" class="btn btn-primary"> {{ $user->name }}</a>
       
        </td>
      </tr>
      @endforeach
      </tbody>
    </table>
    </div>
  </div>
  @endsection