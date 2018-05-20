<script src="{{ URL::asset('/js/filter.js') }}"></script>

<!-- Filter products -->
<div class="col-lg-12 mt-4 mb-4">
    <button class="btn btn-secondary btn-block mt-2" type="button" data-toggle="collapse" data-target="#filters" aria-expanded="false" aria-controls="collapseExample">
        Zoeken
    </button>
<form method="POST" action="/products/search/">
@csrf
    @if(isset($cat_id))
    <input type="hidden" name="cat_id" value="{{$cat_id}}">
    @endif
    <div class="collapse border border-secondary mt-1 mb-3" id="filters">
        <div class="col-md-4">
            <select class="custom-select custom-select-lg mb-3 mt-2" name="productSize" id="size">
                <option selected>Maat</option>
                @foreach($sizes as $size)
                <option value="{{ $size->size }}" >{{$size->size}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <select class="custom-select custom-select-lg mb-3 " id="color" name="productColor">
                <option selected>Kleur</option>
                @foreach($colors as $color)
                <option value="{{ $color->color }}">{{$color->color}}</option>
                @endforeach
            </select>
        </div>

      <!--   <div class="col-md-4">
            <select class="custom-select custom-select-lg mb-3" id="age" name="productAge">
                <optgroup label="Kies leeftijd">
                    <option selected>Leeftijd</option>
                    @foreach($ages as $age)
                    <option value="{{ $age->leeftijd }}">{{ $age->leeftijd }}</option>
                    @endforeach
                </optgroup>
            </select>
        </div> -->
        <div class="col-md-12">
            <div class="col-md-2">

                <button class="btn btn-primary mb-3 form-control" id="search">Zoeken</button>
            </div>
        </div>
    </div>
</form>
 <hr>
</div>
