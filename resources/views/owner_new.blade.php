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
                        <div class="card-header"><h3>New Owner
                                <a href="{{asset("/owners")}}" class="btn btn-outline-primary float-right">Back</a>
                            </h3></div>

                        <div class="card-body">
                            <form method="post" action="{{ route('owner.create') }}" data-parsley-validate
                                  class="form-horizontal form-label-left">
                                @csrf
                                <div class="form-group">
                                    <label><strong>Name : </strong></label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label><strong>Contact Email : </strong></label>
                                    <input type="email" name="contact_email" class="form-control">
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
