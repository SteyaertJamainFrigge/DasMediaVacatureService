@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Cities</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{secure_url('cities.create')}}" title="Create a City"> <em class="fas fa-plus-circle"></em>
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
            <th id="created_at">Date Created</th>
            <th id="updated_at">Last Modified</th>
            <th id="created_at">Actions</th>
        </tr>
        @foreach ($cities as $city)
            <tr>
                <td>{{$city->id}}</td>
                <td>{{$city->name}}</td>
                <td>{{$city->created_at}}</td>
                <td>{{$city->updated_at}}</td>
                <td>
                    @guest
                        <a href="{{secure_url('cities.show', $city)}}" title="show">
                            <em class="fas fa-eye text-success  fa-lg"></em>
                        </a>
                    @else
                        <form action="{{secure_url('cities.destroy', $city)}}" method="POST">

                            <a href="{{secure_url('cities.show', $city)}}" title="show">
                                <em class="fas fa-eye text-success  fa-lg"></em>
                            </a>

                            <a href="{{secure_url('cities.edit', $city)}}">
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

    {!! $cities->links() !!}
@endsection
