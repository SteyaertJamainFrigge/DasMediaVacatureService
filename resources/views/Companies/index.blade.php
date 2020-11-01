@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Companies</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{secure_url('companies.create')}}" title="Create a Company"> <em class="fas fa-plus-circle"></em>
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>Success</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th id="id">Id</th>
            <th id="name">Name</th>
            <th id="city">City</th>
            <th id="created_at">Date Created</th>
            <th id="updated_at">Last Updated</th>
            <th id="actions">Actions</th>
        </tr>
        @foreach ($companies as $company)
            <tr>
                <td>{{$company->id}}</td>
                <td>{{$company->name}}</td>
                <td>{{$company->city->name}}</td>
                <td>{{$company->created_at}}</td>
                <td>{{$company->updated_at}}</td>
                <td>
                    @guest
                        <a href="{{secure_url('companies.show', $company)}}" title="show">
                            <em class="fas fa-eye text-success  fa-lg"></em>
                        </a>
                    @else
                        <form action="{{secure_url('companies.destroy', $company)}}" method="POST">

                            <a href="{{secure_url('companies.show', $company)}}" title="show">
                                <em class="fas fa-eye text-success  fa-lg"></em>
                            </a>

                            <a href="{{secure_url('companies.edit', $company)}}">
                                <em class="fas fa-edit  fa-lg"></em>
                            </a>
                            @csrf
                            @method('DELETE')

                            <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                <em class="fas fa-trash fa-lg text-danger"></em>
                            </button>
                        </form>
                    @endguest
                </td>
            </tr>
        @endforeach
    </table>

    {!! $companies->links() !!}
@endsection
