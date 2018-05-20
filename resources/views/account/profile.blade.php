<script src="https://www.gstatic.com/firebasejs/4.13.0/firebase.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="/js/push.js"></script>
@include('sweetalert::alert')
        <div class="col-xs-12">
            <div class="well well-sm">
                <div class="row">
                    <div class="alert alert-success ml-auto mr-auto" id="mailChangedMessage"></div>
                    <!--   <div class="col-sm-6 col-md-4">
                         <img src="/storage/store/noimage.png" alt=""  width="50%" class="img-rounded img-responsive" />
                    </div> -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                Mijn Gegevens
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $user->name }} <!-- <span><button id="changeMail" class="btn btn-sm btn-primary pull-right">Naam veranderen</button></span> --></h5>
                                <h5 class="card-title" id="oldEmail">{{ $user->email }} <span><button id="changeMail" class="btn btn-sm btn-primary pull-right">Veranderen</button></span></h5>
                                <!-- <h5 class="card-title" id="memberSince">{{ $user->created_at->format('d-m-Y') }}</h5> -->
                                <h5 class="card-title" id="memberSince">Lid sinds {{ $user->created_at->format('d-m-Y') }}</h5>
                                <button id="saveBtn" class="btn btn-md btn-primary pull-right">Opslaan</button>
                            </div>
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
                                <p class="card-title">Als je push notificaties wilt ontvangen. Kan je je aanmelden met   onderstaande knop</p>
                                <p class="card-text"><div class="alert alert-warning" style="width: 100%;">Alleen Android telefoons kunnen gebruikmaken van Push Notificaties</div></p>
                                <button type="submit" id="registerPushBtn" class="btn btn-primary btn-block">Aanmelden voor Push Notificaties</button>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            </div>
        </div>

