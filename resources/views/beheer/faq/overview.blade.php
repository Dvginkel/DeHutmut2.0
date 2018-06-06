<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#faqOverview">
    Overzicht
</button>

<!-- Modal -->
<div class="modal fade" id="faqOverview" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Overzicht vragen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="col-md-12 card bg-light">
                    <h4 class="mt-1 mr-auto ml-auto">Overzicht</h4>
                    <small>Deze vragen zijn te vinden op de website onder kopje FAQ.</small>
                    <table class="table table-sm">
                        <tbody>
                            @foreach($faqs as $faq )
                            <tr>
                                <td>{{ $faq->question }}</td>
                                <td>{{ $faq->anwser }}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                De vragen worden meteen aan de website toegevoegd.
            </div>
        </div>
    </div>
</div>