@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete - {{$owner->name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('owner.delete') }}" data-parsley-validate
                           class="form-horizontal form-label-left">
                        @csrf
                        <input type="hidden" name="id" value="{{$owner->id}}">
                        <div class="modal-body">
                            Are you sure you want to delete this owner?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <div class="row justify-content-center">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('response'))
                    <div class="alert alert-success" role="alert">
                        {{ session('response') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header"><h3>Owner - {{$owner->name}}
                            <a href="{{asset("/owners")}}" class="btn btn-outline-primary float-right">Owners</a>
                        </h3></div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">Owner Data</div>
                                    <div class="card-body">
                                        <form method="post" action="{{ route('owner.update') }}" data-parsley-validate
                                              class="form-horizontal form-label-left">
                                            @csrf
                                            <input type="hidden" name="id" class="form-control" value="{{$owner->id}}">
                                            <div class="form-group">
                                                <label><strong>Name : </strong></label>
                                                <input type="text" name="name" class="form-control"
                                                       value="{{$owner->name}}">
                                            </div>
                                            <div class="form-group">
                                                <label><strong>Contact Email : </strong></label>
                                                <input type="email" name="contact_email" class="form-control"
                                                       value="{{$owner->contact_email}}">
                                            </div>
                                            <div class="form-group text-center">
                                                <input type="submit" class="btn btn-success" name="submit"
                                                       value="Update">
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">Buildings</div>

                                    <div class="card-body">
                                        <ul class="list-group">
                                            @foreach ($owner->buildings as $building)
                                                <li class="list-group-item">{{$building->building_name}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-body">
                        <button type="button" class="btn btn-danger float-right" data-toggle="modal"
                                data-target="#deleteModal">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
