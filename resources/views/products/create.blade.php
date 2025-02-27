@extends('products.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="d-flex justify-content-center">
            <h2 class="mt-2 text-white">Create new product</h2>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row justify-content-center mt-3">
    <div class="col-10 col-md-6 d-flex justify-content-center">
        <form action="{{ route('products.store') }}" method="POST"
            style="width:500px; border: 1px solid white; border-radius: 8px; padding: 20px;">

            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Detail:</strong>
                        <textarea class="form-control" style="height:150px" name="detail"
                            placeholder="Detail"></textarea>
                    </div>
                </div>

                <div class="mb-1 d-flex justify-content-between mt-2 m2-2">
                    <button class="btn btn-primary" type="submit">Submit</button>
                    <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection