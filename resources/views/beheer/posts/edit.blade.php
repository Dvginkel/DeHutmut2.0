
<script src="../../../js/posts.js" ></script>
<button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#editPost" aria-expanded="true" aria-controls="editPost">
    Bericht Wijzigen
</button>
<br>
<div class="collapse mb-3" id="editPost">
    <select class="selectpicker form-control" id="postToEdit">
        <option selected="true">Kies bericht die je wilt aanpassen</option>
        @foreach($posts as $post)
      <option value="{{ $post->id }}">{{ $post->title }}</option>
      @endforeach
    </select>
        <form method="post" action="/beheer/posts/">
            @csrf
            <div class="form-group">
                <label for="title">Titel</label>
                <input type="text" class="form-control" id="title" aria-describedby="title" name="title">
            </div>
            <div class="form-group">
                <label for="message">Bericht</label>
                <textarea class="form-control" id="message"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary pull-right mb-5">Bericht plaatsen </button>
            </div>
        </form>
    </div>
</div>
<!--     <script src="../../../vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'message' );
    </script> -->
