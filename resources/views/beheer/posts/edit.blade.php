
<button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#editPost" aria-expanded="true" aria-controls="editPost">
    Bericht Wijzigen
</button>
<br>
<div class="collapse mb-3" id="editPost">

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
        CKEDITOR.replace( 'message' );
    </script>
