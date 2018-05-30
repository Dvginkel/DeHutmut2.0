@extends('beheer.master') @section('content')
<!-- <script src="../js/beheer/categories.js"></script> -->
<script>
    $('#status').fadeOut(3000);
</script>
<main role="main">
    @if (session('message'))
    <div class="alert alert-success  alert-dismissible fade show " id="status">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ session('message') }}
    </div>
    @endif

    <h2>Categorie Toevoegen</h2>
    <div class="album mb-3">
        <div class="container">
            <div class="row">
                <form method="POST" action="/beheer/categories/">
                    @csrf
                    <div class="form-group">
                        <label for="catName">Categorie naam</label>
                        <input type="text" class="form-control" id="catName" name="catName">
                    </div>
                    <div class="form-group">
                        <label for="catDescription">Categorie Omschrijving</label>
                        <input type="text" class="form-control" id="catDescription" name="catDescription">
                    </div>
                    <div class="btn-group ml-auto mr-auto">
                        <input type="submit" value="Opslaan" class="btn btn-sm bg-primary">
                </form>
                </div>
                </form>
            </div>
        </div>
    </div>
    <hr>
    <h2>Categorie Overzicht</h2>
    <div class="album mb-3">
        <div class="container">
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>

                            <th scope="col">Naam</th>
                            <th scope="col">Zichtbaar</th>
                            <th scope="col">Actie</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                @if($category->active === 1) Ja @else Nee @endif
                            </td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $category->id }}">
                                    Wijzingen
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">Categorie: {{ $category->name }} wijzingen.</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid m-1">
                                                    <div class="row">
                                                        <div class="col-md-3">Naam:</div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" value="{{ $category->name }}" name="catNameUpdate">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">Omschrijving:</div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" value="{{ $category->description }}" name="catDescriptionUpdate">
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row alert-danger">
                                                        <div class="custom-control custom-checkbox ml-3">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                            <label class="custom-control-label" for="customCheck1">Categorie Verwijderen?</label>
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
    </div>
</main>
<!-- Button trigger modal -->


@endsection