@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Jobs</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('Jobs.create')}}" title="Create a product"> <em
                        class="fas fa-plus-circle"></em>
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
            <th id="title">Title</th>
            <th id="company">Company</th>
            <th id="type">Type</th>
            <th id="created_at">Date Created</th>
            <th id="updated_at">Date Updated</th>
            <th id="actions">Actions</th>
        </tr>
        @foreach ($jobs as $job)
            <tr>
                <td>{{$job->id}}</td>
                <td>{{$job->title}}</td>
                <td>{{$job->company->name}}</td>
                <td>{{$job->type}}</td>
                <td>{{$job->created_at}}</td>
                <td>{{$job->updated_at}}</td>
                <td>
                    @guest
                        <a href="{{route('Jobs.show', $job)}}" title="show">
                            <em class="fas fa-eye text-success  fa-lg"></em>
                        </a>
                    @else
                        <form action="{{route('Jobs.destroy', $job)}}" method="POST">

                            <a href="{{route('Jobs.show', $job)}}" title="show">
                                <em class="fas fa-eye text-success  fa-lg"></em>
                            </a>

                            <a href="{{route('Jobs.edit', $job)}}">
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

    {!! $jobs->links() !!}
@endsection
