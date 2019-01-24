<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModalCenter">
    Vraag Toevoegen
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Nieuwe vraag Toevoegen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
            </div>
            <div class="modal-footer">
            De vragen worden meteen aan de website toegevoegd.
            </div>
        </div>
    </div>
</div>