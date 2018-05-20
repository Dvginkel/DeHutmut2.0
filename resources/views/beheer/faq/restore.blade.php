<div class="col-md-12 mb-5">
     <div class="faqHeader">Verwijderde Vragen</div>
     <table class="table">
        <thead>
            <tr>
                <th scope="col">Vraag</th>
                <th scope="col">Herstellen</th>
            </tr>
        </thead>
    @foreach($trashedFaqs as $trashedFaq)
          <tbody>
            <tr>
              <td>{{ $trashedFaq->question }}</td>
              <td><a href="/beheer/faq/{{ $trashedFaq->id}}/restore" class="btn btn-sm btn-success">Herstellen</a></td>
            </tr>
          </tbody>
    @endforeach
</div>
