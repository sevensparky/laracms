@if ($errors->any())
                        
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            
          <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
          </ul>

        </div>
    </div>
</div>
@endif