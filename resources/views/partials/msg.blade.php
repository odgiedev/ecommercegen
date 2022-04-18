<div class="row justify-content-center">
    <div class="col-11 col-md-4">
        @if ($errors->any())
        <div class="alert alert-danger mt-2 text-center">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(session('success'))
        <div class="alert alert-success mt-2 text-center">
            <p>{{session('success')}}</p>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger mt-2 text-center">
            <p>{{session('error')}}</p>
        </div>
        @endif
    </div>
</div>