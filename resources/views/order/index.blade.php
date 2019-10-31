@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">users</div>

                    <div class="card-body">
                        @foreach($users as $user)
                            <div class="card-header">
                                <div><span class="badge badge-primary">{{$user->id}}</span>
                                     @if($user->user_role=='user') <span class="badge badge-success">user</span> @else
                                        <span class="badge badge-danger">admin</span> @endif</div>

                                <div class="row">
                                    <div class="col">{{ $user->name }} -
                                        {{ $user->email }}</div>
{{--                                    <div class="col">--}}
{{--                                        @if($user->user_role=='user')--}}
{{--                                           <a class="btn btn-primary btn-sm" href="{{route('admin.user.edit',$user->id)--}}
{{--                                           }}">--}}
{{--                                               edit--}}
{{--                                           </a>--}}


{{--                                            <a class="btn btn-dark btn-sm" href="{{route('admin.user.edit',$user->id)--}}
{{--                                           }}">--}}
{{--                                                orders--}}
{{--                                            </a>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
                                    <div class="col text-right">{{ $user->created_at }}</div>
                                </div>




                            </div>
                        @endforeach
                    </div>

                    <div class="card-footer text-center">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
