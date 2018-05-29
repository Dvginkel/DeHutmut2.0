<button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#addPost" aria-expanded="true"
    aria-controls="addPost">
    Bericht Toevoegen
</button>
<br>
<div class="collapse mb-3" id="addPost">

    <div class="starter-template">
        <h3>Nieuwsbericht Plaatsen</h3>
        <p class="lead">Op deze pagina kan je berichten plaatsen, wijzigen en verwijderen.</p>
    </div>
    <div class="starter-template">
        <form method="post" action="/beheer/posts/">
            @csrf
            <div class="form-group">
                <label for="title">Titel</label>
                <input type="text" class="form-control" id="title" aria-describedby="title" name="title">
            </div>
            <div class="form-group">
                <label for="message">Bericht</label>
                <textarea class="form-control" id="message" name="message"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary pull-right mb-5">Bericht plaatsen </button>
            </div>
        </form>
    </div>
</div>
<script src="../../../vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('message');
</script>