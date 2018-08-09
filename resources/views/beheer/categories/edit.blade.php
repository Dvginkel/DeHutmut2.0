<div class="container">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#editCategory">
        Categorie Wijzigen
    </button>

    <!-- Modal -->
    <div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Hoofd Categorie Aanpassen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-light">
                        {{  Form::model($categories1, array('route' => array('categories.edit', 1))) }}
                        

                        {{ Form::label('name', 'Kies Categorie') }}
                        {!! Form::select('name', $categories1, null, ['class' => 'form-control']) !!}
                    
                        {{ Form::label('name', 'Categorie Naam') }}
                        {{ Form::text('name', '', array('class' => 'form-control')) }}
                        {{ Form::label('name', 'Categorie Omschrijving') }}
                        {{ Form::text('description', '', array('class' => 'form-control')) }}
                        {{ Form::label('photo', 'Afbeelding van Categorie') }}
                        {{ Form::file('photo', ['class' => 'form-control ']) }}
                        {{ Form::submit('Opslaan', array('class' => 'mt-3 btn btn-primary btn-block')) }}
                        {{ Form::button('Annuleren', array('class' => 'btn btn-primary btn-block', 'data-target' => '#editCategory', 'data-toggle' => 'modal')) }}

                        {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>