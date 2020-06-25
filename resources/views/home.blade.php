@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="mini-stat clearfix bg-facebook rounded">
                                <a href="{{asset("owners")}}"></a>
                                <span class="mini-stat-icon"><i class="fa fa-money fg-facebook"></i></span>
                                <div class="mini-stat-info">
                                    <h3>Owners</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="mini-stat clearfix bg-facebook rounded">
                                <a href="{{asset("buildings")}}"></a>
                                <span class="mini-stat-icon"><i class="fa fa-building fg-facebook"></i></span>
                                <div class="mini-stat-info">
                                    <h3>Buildings</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="mini-stat clearfix bg-facebook rounded">
                                <span class="mini-stat-icon"><i class="fa fa-user fg-facebook"></i></span>
                                <div class="mini-stat-info">
                                    <h3>Users</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
