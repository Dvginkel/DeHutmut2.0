<script src="https://www.gstatic.com/firebasejs/4.13.0/firebase.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="/js/push.js"></script>

@include('sweetalert::alert')
<div class="col-xs-12">
  <div class="well well-sm">
    <div class="row">

      <div class="col-sm-6 col-md-4">
        {{--
        <img src="#" alt="" width="50%" class="img-rounded img-responsive" /> --}}
      </div>
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            Mijn Gegevens
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ $user->name }}
            </h5>
            <div class="alert alert-success ml-auto mr-auto" id="mailChangedMessage"></div>
            <h5 class="card-title" id="oldEmail">{{ $user->email }}
              <span>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Veranderen
                </button>
              </span>
            </h5>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <form method="post" role="form" action="/account/info">
                      <h5 class="modal-title" id="exampleModalLabel">Wijzig je e-mailadres</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">

                    <div class="form-group">
                      <label for="newUserMail">Je nieuwe e-mailadres</label>
                      <input type="email" class="form-control" id="newUserMail" placeholder="Voer je nieuwe e-mailadres in...">
                    </div>
                    <div class="form-group">
                      <label for="newUserMailConfirm">Je nieuwe e-mailadres (nogmaals)</label>
                      <input type="email" class="form-control" id="newUserMailConfirm" placeholder="Voer je nieuwe e-mailadres nogmaals in... ">
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="updateEmailñ">Opslaan</button>
                  </div>
                </div>
              </div>
            </div>
            <h5 class="card-title" id="memberSince">Lid sinds {{ $user->created_at->format('d-m-Y') }}</h5>
          </div>
          </form>
        </div>
      </div>
    </div>
    <div class="row">
      @if(!$userPushActivated)
      <div class="col-sm-12 mt-3">
        <div class="card">
          <div class="card-header">
            Push Notificaties Ontvangen
          </div>
          <div class="card-body">
            <p class="card-title">Als je push notificaties wilt ontvangen. Kan je je aanmelden met onderstaande knop</p>
            <p class="card-text">
              <div class="alert alert-warning" style="width: 100%;">Alleen Android telefoons kunnen gebruikmaken van Push Notificaties</div>
            </p>
            <button type="submit" id="registerPushBtn" class="btn btn-primary btn-block">Aanmelden voor Push Notificaties</button>
          </div>
        </div>
      </div>
      @endif
    </div>
  </div>
</div>
</div>