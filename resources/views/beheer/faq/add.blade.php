<div class="col-md-12 card bg-light">
    <h4 class="mt-1 mr-auto ml-auto">Vraag Toevoegen</h4>
        <form method="post" action="/beheer/faq">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="question">Vraag</label>
                    <input type="text" class="form-control" name="question" id="question" placeholder="Titel voor de vraag.">
                </div>
                <div class="form-group col-md-6">
                    <label for="anwser">Antwoord</label>
                    <input type="text" class="form-control" id="anwser" name="anwser" placeholder="Antwoord">
                </div>
            </div>
            <button type="submit" class="btn btn-primary pull-right mb-3">Toevoegen</button>
        </form>
    </div>