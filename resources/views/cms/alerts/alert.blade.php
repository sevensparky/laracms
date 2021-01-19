@if (session()->has('success'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span class="btn btn-success btn-sm ml-3" aria-hidden="true">&times;</span>
    </button>

    <h6 class="text-right text-dark">{{ session()->get('success') }}</h6>

</div>
@endif



@if (session()->has('error'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span class="btn btn-danger btn-sm ml-3" aria-hidden="true">&times;</span>
    </button>

    <h6 class="text-right text-dark">{{ session()->get('error') }}</h6>

</div>
@endif