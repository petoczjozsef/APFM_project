@extends('layouts.app')

@section('content')
    <div class="container">
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
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><h3>New Building
                            <a href="{{asset("/buildings")}}" class="btn btn-outline-primary float-right">Back</a>
                            </h3></div>

                        <div class="card-body">
                            <form method="post" action="{{ route('building.create') }}" data-parsley-validate
                                  class="form-horizontal form-label-left">
                                @csrf
                                <div class="form-group">
                                    <label><strong>Name : </strong></label>
                                    <input type="text" name="building_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label><strong>Address : </strong></label>
                                    <input type="text" name="building_address" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label><strong>Owners : </strong></label>
                                        <select class="form-control" name="owner_id">
                                            <option value=""></option>

                                            @foreach ($owners as $owner)
                                                <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                                            @endforeach

                                        </select>
                                </div>
                                <div class="form-group text-center">
                                    <input type="submit" class="btn btn-success" name="submit" value="Save">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
