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
  <div class="col-md-12">
    <!-- Send Message  -->

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-block mb-1" data-toggle="modal" data-target="#addProduct">
      Bericht versturen naar...
    </button>

    <!-- Modal -->
    <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nieuw Product Toevoegen</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="/account/messages " enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="msgRecipient">Naam Ontvanger</label>
                <select class="selectpicker show-tick form-control" id="msgRecipient">
                  @foreach($users as $user)
                  <option value="{{ $user->id }}" id="mainCat" name="{{ $user->name }}">{{$user->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="msgSubject">Onderwerp / Titel van bericht</label>
                <input type="text" class="form-control" id="msgSubject" name="msgSubject" placeholder="Titel of Onderwerp voor bericht">
              </div>
              <div class="form-group">
                <label for="msgContent">Bericht</label>
                <input type="text" class="form-control" id="msgContent" name="msgContent" placeholder="Uw bericht">
              </div>
              <div class="form-group">
                <label for="description">Omschrijving</label>
                <textarea name="description" id="description" value="description" class="form-control"></textarea>
              </div>
              <!-- <div class="form-group">
              <label for="age">Leeftijd</label>
              <input type="tel" class="form-control" id="age" name="age" placeholder="Voor welke leeftijd is het?">
            </div> -->
              <div class="form-group">
                <button type="submit" class="btn btn-primary pull-right m-3">Bericht Verzenden</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>



    <!-- End Send Message  -->
    <h4>Mijn Inbox</h4>
    <br>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Onderwerp</th>
          <!-- <th scope="col">Ontvangen</th> -->

        </tr>
      </thead>
      <tbody>
        @foreach($messages as $message)
        <tr>
          <td>
            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#{{ $message->id }}">
              {{ $message->title }}
            </button>
          </td>
          <!-- <td>
            {{ $message->created_at->format("d-m-Y H:i:s") }}
          </td> -->
        </tr>


        <div class="modal fade" id="{{ $message->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                {{ $message->title }}
                <h5 class="modal-title" id="exampleModalLabel">{{ $message->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                {{ $message->message }}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
              </div>

            </div>
          </div>
        </div>

        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection