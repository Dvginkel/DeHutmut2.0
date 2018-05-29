<script src="../../../js/posts.js">
</script>
<button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#editPost" aria-expanded="true"
    aria-controls="editPost">
    Bericht Wijzigen
</button>
<br> @if (session('message'))
<div class="alert alert-warning justify-content-center align-items-center" id="msgSucces">{{ session('message') }}</div>
@endif
<br>
<div class="collapse mb-3" id="editPost">
    <label for="postToEdit">Kies bericht dat je wilt wijzigen.</label>
    <select class="selectpicker form-control" id="postToEdit">
        <option selected="true">Kies bericht die je wilt aanpassen</option>
        @foreach($posts as $post)
        <option value="{{ $post->id }}">{{ $post->title }}</option>
        @endforeach
    </select>
    <div id="test">
        <form method="post" action="/beheer/posts/">
            @csrf @if(!empty($post))
            <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}"> @endif
            <div class="form-group">
                <label for="title">Titel</label>
                <input type="text" class="form-control" id="titleEdit" value="" aria-describedby="title" name="titleEdit">
            </div>
            <div class="form-group">
                <label for="messageEdit">Bericht</label>
                <textarea name="textarea" style="height:150px;" class="form-control" id="messageEdit" aria-describedby="messageEdit" name="messageEdit"></textarea>

            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary pull-right mb-5">Bericht Wijzigen </button>
            </div>
        </form>
    </div>
</div>
</div>
<script src="../../../vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('messageEdit');
</script>