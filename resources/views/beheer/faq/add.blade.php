<hr>
<div class="col-md-12 mb-5 mt-5">
    <div class="faqHeader">Vraag Toevoegen</div>
    <form method="post" action="/beheer/faq">
        @csrf
        <div class="form-group">
            <label for="question">Vraag</label>
            <input type="text" class="form-control" id="question" name="question" placeholder="Type een vraag...">
        </div>
        <div class="form-group">
            <label for="anwser">Antwoord</label>
            <input type="text" class="form-control" id="anwser" name="anwser" placeholder="Antwoord op de bovengestelde vraag...">
        </div>
        <button type="submit" class="btn btn-primary pull-right">FAQ Toevoegen</button>
    </form>
</div>