<script src="../../../js/beheer/categories.js"></script>
<script src="../../../js/beheer/sizes.js"></script>

<div>
  <button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#addProduct" aria-expanded="true"
    aria-controls="addProduct">
    Product Toevoegen
  </button>
  <br>
  <br>
  <div class="collapse mb-3" id="addProduct">
    <form method="post" action="/beheer/products " enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <select class="selectpicker show-tick form-control" id="mainCat">
          <option selected="true">Kies Categorie</option>
          @foreach($categories as $category)
          <option value="{{ $category->id }}" id="mainCat" name="{{ $category->name }}">{{$category->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <select class="selectpicker form-control" id="subCat" name="subCat">
        </select>
      </div>
      <div class="form-group">
        <label for="name">Product Nummer</label>
        <input type="text" class="form-control" id="prodId" name="prodId" placeholder="Productnummer">
      </div>
      <div class="form-group">
        <label for="name">Productnaam</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Productnaam">
      </div>
      <div class="form-group">
        <label for="description">Omschrijving</label>
        <textarea name="description" id="description" value="description" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <label for="color">Kleur(en)</label>
        <input type="text" class="form-control" id="color" name="color" placeholder="Kleur(en) van product">
      </div>
      <div class="form-group">
        <label for="size">Maat</label>
        <input type="tel" class="form-control" name="size" id="size">
      </div>
      <div class="form-group">
        <label for="age">Leeftijd</label>
        <input type="tel" class="form-control" id="age" name="age" placeholder="Voor welke leeftijd is het?">
      </div>
      <div class="form-group">
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" accept="image/*" capture="camera" name="photo" id="inputGroupFile04">
            <label class="custom-file-label" for="inputGroupFile04">Product foto</label>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Product Toevoegen</button>
    </form>
  </div>
  <hr>