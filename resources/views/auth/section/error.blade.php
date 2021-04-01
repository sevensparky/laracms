@if ($errors->any())
<div class="alert alert-danger mt-3">
   
    <ol>
        @foreach ($errors->all() as $error)
            <li class="text-right">
                {{ $error }}
            </li>
        @endforeach
    </ol>
</div>
@endif