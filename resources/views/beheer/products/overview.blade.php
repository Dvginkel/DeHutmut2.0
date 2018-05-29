<button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#productOverview" aria-expanded="true"
  aria-controls="productOverview">
  Producten Overzicht
</button>

<div class="collapse" id="productOverview">
  <div class="mb-3 border-bottom">
    <h1>Product Beheer</h1>
    <div class="col-md-12 mr-auto ml-auto">
      {{$products->links()}}
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Foto</th>
          <th scope="col">Product</th>
          <th scope="col">Acties</th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $product)
        <tr>
          <td>
            <img src="{{ $product->photo }}" class="img-fluid" alt="{{ $product->name }}">
          </td>
          <td>
            {{ $product->name }} @if($product->active === 0) (staat niet op de website) @endif
          </td>

          <td>
            <div class="btn-group-vertical" role="group" aria-label="Basic example">
              <button type="button" class="btn btn-warning">Wijzigen</button>
              @if($product->active === 0)
              <button type="button" class="btn btn-primary">Enable</button>
              @endif
              <button type="button" class="btn btn-danger">Delete</button>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>