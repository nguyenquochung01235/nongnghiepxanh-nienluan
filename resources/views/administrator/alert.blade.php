@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


@if (Session::has('error'))
<div class="card alert alert-danger"
    style="margin-bottom: 16px;">
        <div style="width: 100%;">
            <button type="button" class="btn btn-tool" 
            style="float: right;"
            data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <p>{{ Session::get('error') }}</p>
    </div>
    
@endif


@if (Session::has('success'))
<div class="card alert alert-success"
    style="margin-bottom: 16px;">
        <div style="width: 100%;">
            <button type="button" class="btn btn-tool" 
            style="float: right;"
            data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <p>{{ Session::get('success') }}</p>
    </div>
@endif