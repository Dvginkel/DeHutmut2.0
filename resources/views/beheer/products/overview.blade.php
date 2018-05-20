
<button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#productOverview" aria-expanded="true" aria-controls="productOverview">
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
      <td><img src="{{ $product->photo }}" class="img-fluid" alt="{{ $product->name }}"></td>
      <td>{{ $product->name }}</td>

      <td>
        <form method="GET" action="/beheer/products/{{ $product->id }}/edit">
            <button class="btn btn-warning btn-sm">Edit</button></td>
        </form>
        <form method="GET" action="/beheer/products/{{ $product->id }}/disable">
            <button class="btn btn-warning btn-sm">Disable</button></td>
        </form>
        <form method="GET" action="/beheer/products/{{ $product->id }}/delete">
            <button class="btn btn-warning btn-sm">Delete</button></td>
        </form>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

</div>


