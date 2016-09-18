@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Products / Edit #{{$product->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('products.update', $product->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('code')) has-error @endif">
                       <label for="code-field">Code</label>
                    <input type="text" id="code-field" name="code" class="form-control" value="{{ is_null(old("code")) ? $product->code : old("code") }}"/>
                       @if($errors->has("code"))
                        <span class="help-block">{{ $errors->first("code") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ is_null(old("name")) ? $product->name : old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('color')) has-error @endif">
                       <label for="color-field">Color</label>
                    <input type="text" id="color-field" name="color" class="form-control" value="{{ is_null(old("color")) ? $product->color : old("color") }}"/>
                       @if($errors->has("color"))
                        <span class="help-block">{{ $errors->first("color") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('capacity')) has-error @endif">
                       <label for="capacity-field">Capacity</label>
                    <input type="text" id="capacity-field" name="capacity" class="form-control" value="{{ is_null(old("capacity")) ? $product->capacity : old("capacity") }}"/>
                       @if($errors->has("capacity"))
                        <span class="help-block">{{ $errors->first("capacity") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('products.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection
