@extends('layout')
@section('header')
<div class="page-header">
        <h1>Topics / Show #{{$topic->id}}</h1>
        <form action="{{ route('topics.destroy', $topic->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('topics.edit', $topic->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="store_id">STORE_ID</label>
                     <p class="form-control-static">{{$topic->store_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="product_id">PRODUCT_ID</label>
                     <p class="form-control-static">{{$topic->product_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="last_event">LAST_EVENT</label>
                     <p class="form-control-static">{{$topic->last_event}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('topics.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection