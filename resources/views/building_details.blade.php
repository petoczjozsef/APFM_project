@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete - {{$building->building_name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('building.delete') }}" data-parsley-validate
                          class="form-horizontal form-label-left">
                        @csrf
                        <input type="hidden" name="id" value="{{$building->id}}">
                        <div class="modal-body">
                            Are you sure you want to delete this building?
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
                    <div class="card-header"><h3>Building - {{$building->building_name}}
                            <a href="{{asset("/buildings")}}" class="btn btn-outline-primary float-right">Back</a>
                        </h3></div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">Building Data</div>
                                    <div class="card-body">
                                        <form method="post" action="{{ route('building.update') }}"
                                              data-parsley-validate
                                              class="form-horizontal form-label-left">
                                            @csrf
                                            <input type="hidden" name="id" class="form-control"
                                                   value="{{$building->id}}">
                                            <div class="form-group">
                                                <label><strong>Name : </strong></label>
                                                <input type="text" name="building_name" class="form-control"
                                                       value="{{$building->building_name}}">
                                            </div>
                                            <div class="form-group">
                                                <label><strong>Contact Email : </strong></label>
                                                <input type="text" name="building_address" class="form-control"
                                                       value="{{$building->building_address}}">
                                            </div>
                                            <div class="form-group">
                                                <label><strong>Owner : </strong></label>
                                                <select class="form-control" name="owner_id">
                                                    @foreach ($building->owner as $selected_owner)
                                                        <option selected value="{{ $selected_owner->id }}">{{ $selected_owner->name }}</option>
                                                    @endforeach
                                                    @foreach ($owners as $owner)
                                                        <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <input type="hidden" name="old_owner_id" class="form-control"
                                                   value="{{$selected_owner->id}}">
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
                                    <div class="card-header">Owner data
                                        <a href="{{asset("/owner/details")}}/{{ $selected_owner->id }}" class="btn btn-primary float-right">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </div>

                                    <div class="card-body">
                                        <table class="table table-bordered nowrap" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td align="center"><i class="fa fa-address-card" style="font-size: 20px;"></i></td>
                                                <td>{{ $selected_owner->name }}</td>
                                            </tr>
                                            <tr>
                                                <td align="center"><i class="fa fa-at" style="font-size: 20px;"></i></td>
                                                <td>{{ $selected_owner->contact_email }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
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
