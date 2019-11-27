@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">users</div>

                    <div class="card-body">
                        @foreach($orders as $order)
                            <div class="card-header">

                                <a href="/order/{{ $order->id }}">
                                    <div><span class="badge badge-primary">{{$order->id}}</span>
                                        @if($order->priority=='low')
                                            <span class="badge badge-info">low</span>

                                        @elseif($order->priority=='medium')
                                            <span class="badge badge-warning">medium</span>
                                        @else
                                            <span class="badge badge-danger">high</span>

                                        @endif</div>

                                    <div class="row">
                                        <div class="col">{{ $order->note }} </div>

                                        <div class="col text-right">{{ $order->created_at }}</div>
                                    </div>

                                </a>

                            </div>
                        @endforeach
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
