@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('response'))
                <div class="alert alert-success" role="alert">
                    {{ session('response') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header"><h3>Owners
                        <a href="{{asset("/owner/new")}}" class="btn btn-primary float-right">Add Owner</a>
                    </h3></div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Edit</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($owners as $owner)
                            <tr>
                                <td>{{$num++}}</td>
                                <td>{{$owner->name}}</td>
                                <td>{{$owner->contact_email}}</td>
                                <td>{{$owner->created_at}}</td>
                                <td><a href="{{asset("/owner/details")}}/{{$owner->id}}"
                                       class="btn btn-outline-primary">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
