@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        menus <a href="{{ route('admin.menu.create') }}" class="btn btn-success btn-sm">
                            create
                        </a>
                    </div>

                    <div class="card-body">
                        @foreach($menus as $menu)
                            <div class="card-header">
                                <div>
                                    <span class="badge badge-primary">{{$menu->id}}</span>

                                </div>
                                <div class="row">
                                    <div class="col">{{ $menu->title }}</div>
                                    <div class="col text-center">
                                        <form class="form-inline" action="{{route('admin.menu.destroy',$menu->id)}}"
                                        method="post">
                                            @csrf @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                delete
                                            </button>
                                        </form>

                                    </div>
                                    <div class="col text-right">{{ $menu->created_at }}</div>
                                </div>




                            </div>
                        @endforeach
                    </div>

                    <div class="card-footer text-center">
                        {{ $menus->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
