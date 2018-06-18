<div class="container">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-block mb-3" data-toggle="modal" data-target="#exampleModalCenter">
        Toevoegen
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Hoofd Categorie Toevoegen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-block mb-3" data-toggle="modal" data-target="#newCategory">
                        Hoofd Categorie Toevoegen
                    </button>

                    <!-- Modal -->
                    <div class="modal fade mb-1" id="newCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Hoofd Categorie Toevoegen</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body bg-light">
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <!-- <form method="post" action="/beheer/categories/" > -->
                                    {{ Form::open(['method' => 'post', 'route' => 'categories', 'files' => true]) }} @csrf
                                    <div class="form-group">
                                        <span class="input-group-addon">

                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="categorieName">Categorie naam</label>
                                        <input type="text" class="form-control" id="categorieName" aria-describedby="categorieName" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="categoryDescription">Omschrijving</label>
                                        <input type="text" class="form-control" id="categoryDescription" aria-describedby="categoryDescription" name="description">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="photo" id="customFile">
                                            <label class="custom-file-label" for="customFile">Kies afbeelding voor de nieuwe categorie.</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-block">Categorie Toevoegen</button>
                                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#newCategory">Annuleren</button>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#newSubCategory">
                        Sub Categorie Toevoegen
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="newSubCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Sub Categorie Toevoegen</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body bg-light">
                                    <label for="mainCat">Kies Hoofd Categorie</label>

                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <!-- <form method="post" action="/beheer/categories/" > -->
                                    {{ Form::open(['method' => 'post', 'route' => 'addsubcat', 'files' => true]) }} @csrf
                                    <select class="selectpicker form-control" id="mainCat" name="manCatId">
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="form-group">
                                        <label for="categorieName">Categorie naam</label>
                                        <input type="text" class="form-control" id="categorieName" aria-describedby="categorieName" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="categoryDescription">Omschrijving</label>
                                        <input type="text" class="form-control" id="categoryDescription" aria-describedby="categoryDescription" name="description">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="subCatPhoto" id="subCatPhoto">
                                            <label class="custom-file-label" for="subCatPhoto">Kies afbeelding voor de nieuwe categorie.</label>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary btn-block">Sub Categorie Toevoegen</button>
                                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#newSubCategory">Annuleren</button>
                                    {{ Form::close() }}
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModalCenter">Annuleren</button>
                    </div>
                </div>
            </div>
        </div>