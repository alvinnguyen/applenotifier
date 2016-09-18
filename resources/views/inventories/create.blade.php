@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Inventories / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('inventories.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('product_id')) has-error @endif">
                       <label for="product_id-field">Product_id</label>
                    <input type="text" id="product_id-field" name="product_id" class="form-control" value="{{ old("product_id") }}"/>
                       @if($errors->has("product_id"))
                        <span class="help-block">{{ $errors->first("product_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('store_id')) has-error @endif">
                       <label for="store_id-field">Store_id</label>
                    <input type="text" id="store_id-field" name="store_id" class="form-control" value="{{ old("store_id") }}"/>
                       @if($errors->has("store_id"))
                        <span class="help-block">{{ $errors->first("store_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('inventory')) has-error @endif">
                       <label for="inventory-field">Inventory</label>
                    <input type="text" id="inventory-field" name="inventory" class="form-control" value="{{ old("inventory") }}"/>
                       @if($errors->has("inventory"))
                        <span class="help-block">{{ $errors->first("inventory") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('inventories.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
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
