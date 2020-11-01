@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{$company->name}}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('companies.index')}}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{$company->name}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>City: </strong>
                {{$company->city->name}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date Created: </strong>
                {{$company->created_at}}
            </div>
            <div class="form-group">
                <strong>Last Updated: </strong>
                {{$company->updated_at}}
            </div>
        </div>
    </div>
@endsection
