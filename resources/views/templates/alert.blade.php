@if(Session::has('pesan'))
    <div class="col-xs-12">
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{ Session::get('pesan') }}</strong>
        </div>
    </div>
@endif
