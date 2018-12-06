<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#faqEdit">
    Wijzigen
</button>

<!-- Modal -->
<div class="modal fade" id="faqEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Vraag Wijzigen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="questionToEdit">Kies vraag die je wilt wijzigen</label>
                <!-- Select Question To edit -->
                <select class="selectpicker form-control mb-1" id="questionToEdit">
                    <option>Kies vraag</option>
                    @foreach($faqs as $faq)
                    <option value="{{ $faq->id }}">{{ $faq->question }}</option>
                    @endforeach
                </select>
                <!-- /Select Question To edit -->


                <!-- Edit FORM -->

                <div class="col-md-12 card bg-light">
                    <form method="post" action="/beheer/faq/" id="faqForm">
                        @csrf
                        <div class="form-group">
                            <label for="question">Vraag</label>
                            <input id="faqQuestion" class="form-control" name="question" value="">
                        </div>
                        <div class="form-group" id="test">
                            <label for="anwser">Antwoord</label>
                            <input id="faqAnwser" class="form-control" name="anwser" value="">
                        </div>
                        <input type="hidden" name="id" id="faqId" value="{{ $faq->id }}">
                        <button type="submit" class="btn btn-primary pull-right mb-3">Wijzigingen Opslaan</button>
                        <a href="/beheer/faq/{{ $faq->id }}/delete" class="btn btn-primary pull-right mb-3" role="button">Verwijderen</a>
                    </form>
                    <script src="../../../js/beheer/faq.js"></script>
                </div>

            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>