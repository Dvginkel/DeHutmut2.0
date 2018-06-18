<button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#productOverview" aria-expanded="true"
  aria-controls="productOverview">
  Producten Overzicht
</button>

<div class="collapse" id="productOverview">
  <div class="mb-3 border-bottom">
    <h1>Product Beheer</h1>
    <div class="col-md-6 mr-auto ml-auto">
      {{$products->links()}}
    </div>
        @foreach($products as $product)
        <tr>
        <div class="card bg-light">
            <img class="card-img-top" src="{{ $product->photo }}" alt="{{ $product->name }} ">
            <div class="card-body">
              <h5 class="card-title">{{ $product->description }} </h5>
              <p class="card-text">
                <div class="col-md-4">Maat: {{ $product->size }} </div>
                <div class="col-md-4">Kleur: {{ $product->color }} </div>
                <div class="col-md-4">Leeftijd: {{ $product->age }} </div>  </p>
            </div>
            <div class="btn-group-vertical" role="group" aria-label="Basic example">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $product->id }}">
                Wijzigen
              </button>
              <!-- Modal -->
              <div class="modal fade" id="{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">{{ $product->name }}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                          <div class="row">
                          <div class="form-group">
                          {!! Form::model($product, ['route' => ['productUpdate', $product->id]]) !!}
                          {{ Form::label('name', 'Product Naam') }}
                          {{ Form::text('name', null, ['class' => 'form-control']) }}
                          {{ Form::label('description', 'Product Omschrijving') }}
                          {{ Form::text('description', null, ['class' => 'form-control']) }}
                          {{ Form::label('color', 'Product Kleur(en)') }}
                          {{ Form::text('color', null, ['class' => 'form-control']) }}
                          {{ Form::label('size', 'Product Maat') }}
                          {{ Form::text('size', null, ['class' => 'form-control']) }}
                          {{ Form::label('age', 'Product Leeftijd') }}
                          {{ Form::text('age', null, ['class' => 'form-control']) }}
                          {{ Form::label('cat_id', 'Product Categorie') }}
                          <select name="cat_id" id="test" class="form-control">
                              <option>Kies een categorie voor product</option>
                              @foreach($categories as $category)
                                 @foreach($category->subCategories as $test2)
                                 <option value="{{ $test2->id }}"> {{ $category->name }} - {{ $test2->name }}</option>
                                 @endforeach  
                              @endforeach
                              </select>
                          {{ Form::label('photo', 'Product Foto') }}
                          {{ Form::text('photo', null, ['class' => 'form-control']) }}                          
                          {{ Form::label('active', 'Product Actief (Ja/Nee)') }}
                          @if($product->active  === 1)
                          {{ Form::checkbox('agree', 1, true, ['class' => 'form-control']) }}
                          @else 
                          {{ Form::checkbox('agree', 1, false, ['class' => 'form-control']) }}
                          @endif
                          {{ Form::label('created_at', 'Toegevoegd op') }}
                          {{ Form::text('created_at', null, ['class' => 'form-control', 'readonly' => true]) }}
                          {{ Form::label('updated_at', 'Laatst gewijzigd op') }}
                          {{ Form::text('updated_at', null, ['class' => 'form-control readonly', 'readonly' => true ]) }}
                          {{ Form::submit('Wijzigen Opslaan', array('class' => 'btn btn-primary mt-3')) }}
                          {!! Form::close() !!}
                        </div>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @if($product->active === 0)
              <button type="button" class="btn btn-primary">Enable</button>
              @endif
              <button type="button" class="btn btn-danger">Delete</button>
            </div>
          </div>   
          <br>   
        @endforeach
      <div class="col-md-6 mr-auto ml-auto">
        {{$products->links()}}
      </div>
    </div>
</div>