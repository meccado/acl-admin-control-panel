@if(Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            {!! implode('', $errors->all('
            <small class="error" style="color:red">:message</small>
            ')) !!}
        </ul>
    </div>
@endif
