@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors as $error) 
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {!! session('success') !!}
</div>
@endif