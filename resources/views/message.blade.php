@if ($errors->any())
    <div class="notification is-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ($message = \Illuminate\Support\Facades\Session::get('success'))
    <div class="notification is-success">
        <strong style="height: 40px; display: inline-block; line-height: 40px;">{{ $message }}</strong>
    </div>
@endif
