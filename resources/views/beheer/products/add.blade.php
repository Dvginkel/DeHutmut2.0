<script src="../../../js/beheer/categories.js"></script>
<script src="../../../js/beheer/sizes.js"></script>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-block mb-1" data-toggle="modal" data-target="#addProduct">
  Product Toevoegen
</button>

<!-- Modal -->
<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nieuw Product Toevoegen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="/beheer/products " enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label for="mainCat">Kies Categorie</label>
            <select class="selectpicker show-tick form-control" id="mainCat">
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
          <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Leeftijd"/>
              <span class="input-group-addon"></span>
              <select class="form-control">
                <option value="year">Jaar</option>
                <option value="month">Maand</option>
              </select>
          </div>
          <!-- <div class="form-group">
            <label for="age">Leeftijd</label>
            <input type="tel" class="form-control" id="age" name="age" placeholder="Voor welke leeftijd is het?">
          </div> -->
          <div class="form-group">
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" accept="image/*" capture="camera" name="photo" id="inputGroupFile04">
                <label class="custom-file-label" for="inputGroupFile04">Foto Maken of Kiezen</label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary pull-right m-3">Product Toevoegen</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>