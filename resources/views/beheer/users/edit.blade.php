 @extends('beheer.master') @section('content') @foreach($user as $item) @endforeach
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <p>Beheer</p>
        </li>
        <li class="breadcrumb-item">
            <a href="/beheer/users/">Users</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{ $item->name }}</li>
    </ol>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="contrainer">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Algemeen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#lootjes" role="tab" aria-controls="lootjes" aria-selected="false">Lootjes</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Messages</a>
                    </li> -->
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="contrainer">
                            <div class="row">
                                <div class="col-md-12 bg-light">
                                    <form>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Naam</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput" value="{{ $item->name }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2">E-mailadres</label>
                                            <input type="email" class="form-control" id="formGroupExampleInput2" value="{{ $item->email }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput3">Lids sinds</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput3" value="{{ $item->created_at }}" readonly>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane" id="lootjes" role="tabpanel" aria-labelledby="lootjes-tab">
                        <div class="contrainer">
                            <div class="row">
                                <div class="col-md-10 bg-light">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Product</th>
                                                    <th scope="col">Actie</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($productNames as $productName)
                                                <tr>
                                                    <td>{{ $productName->name }}</td>
                                                    <td>
                                                        <form method="post" action="/beheer/users/{{ $item->id}}/disable">
                                                            @csrf
                                                            <input type="hidden" value="{{ $productName->id }}" name="productId">
                                                            <input type="hidden" value="{{ $item->id }}" name="userId">
                                                            <button class="btn btn-primary">Deactiveren</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">...</div>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection