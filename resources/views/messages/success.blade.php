@if (session('success'))
<div class="col-md-6">
    <div class="alert alert-success  alert-dismissible fade show " id="status">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ session('success') }}
    </div>
</div>
@endif