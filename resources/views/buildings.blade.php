@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>Buildings
                        <a href="{{asset("/building/new")}}" class="btn btn-primary float-right">Add Building</a>
                    </h3></div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Date</th>
                            <th>Owner</th>
                            <th>Edit</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($buildings as $building)
                            <tr>
                                <td>{{$num++}}</td>
                                <td>{{$building->building_name}}</td>
                                <td>{{$building->building_address}}</td>
                                <td>{{$building->created_at}}</td>
                                @foreach ($building->owner as $owner)
                                    <td>{{$owner->name}}</td>
                                @endforeach
                                <td><a href="{{asset("/building/details")}}/{{$building->id}}"
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
