@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Topics / Edit #{{$topic->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('topics.update', $topic->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('store_id')) has-error @endif">
                       <label for="store_id-field">Store_id</label>
                    <input type="text" id="store_id-field" name="store_id" class="form-control" value="{{ is_null(old("store_id")) ? $topic->store_id : old("store_id") }}"/>
                       @if($errors->has("store_id"))
                        <span class="help-block">{{ $errors->first("store_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('product_id')) has-error @endif">
                       <label for="product_id-field">Product_id</label>
                    <input type="text" id="product_id-field" name="product_id" class="form-control" value="{{ is_null(old("product_id")) ? $topic->product_id : old("product_id") }}"/>
                       @if($errors->has("product_id"))
                        <span class="help-block">{{ $errors->first("product_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('last_event')) has-error @endif">
                       <label for="last_event-field">Last_event</label>
                    <input type="text" id="last_event-field" name="last_event" class="form-control" value="{{ is_null(old("last_event")) ? $topic->last_event : old("last_event") }}"/>
                       @if($errors->has("last_event"))
                        <span class="help-block">{{ $errors->first("last_event") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('topics.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
