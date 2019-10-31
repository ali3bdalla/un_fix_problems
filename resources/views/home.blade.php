@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row text-center">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>user (<small>{{$users}}</small>)</h5>
                                    </div>
                                    <div class="card-body">
                                        <a href="{{ route('admin.user.index') }}" class="btn btn-primary
                                        btn-sm">view</a>

                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>menu (<small>{{$menus}}</small>)</h5>
                                    </div>
                                    <div class="card-body">
                                        <a href="{{ route('admin.menu.index') }}" class="btn btn-primary
                                        btn-sm">view</a>

                                        <a href="{{ route('admin.menu.create') }}" class="btn btn-success
                                        btn-sm">create</a>

                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>order (<small>{{$orders}}</small>)</h5>
                                    </div>
                                    <div class="card-body">
                                        <a href="{{ route('admin.order.index') }}" class="btn btn-primary
                                        btn-sm">view</a>

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
