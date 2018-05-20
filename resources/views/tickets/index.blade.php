        @extends('layouts.master')
        @section('content')
        <div class="row">
          <div class="col-md-12">
            <h2>Gefeliciteerd</h2>
            <article>Je loot nu mee op {{ $productName }}.</article>
          </div>

            <div class="form-group mt-3">
                <a href="/store"><button class="btn btn-primary btn-block">Terug naar de Winkel</button></a>
            </div>
        </div>
@endsection
