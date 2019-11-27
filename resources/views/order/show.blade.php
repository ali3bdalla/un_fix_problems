@extends('layouts.app')

@section("styles")
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        /*#map {*/
        /*    height: 100%;*/
        /*}*/

        /*!* Optional: Makes the sample page fill the window. *!*/
        /*html, body {*/
        /*    height: 100%;*/
        /*    margin: 0;*/
        /*    padding: 0;*/
        /*}*/
    </style>
@stop
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $order->user->name }}</div>

                    <div class="card-body">
                        <div class="card">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($order["attachment"])}}"
                                 class="card-img-top" alt="..." style="height: 350px">
                            <div class="card-body">
                                <h5 class="card-title">{{ $order->status }}</h5>
                                <p class="card-text">{{ $order->note }}</p>
                                <form action="{{ route('order.edit',$order->id) }}" method="get">
                                    <div class="form-group">
                                        <select class="form-control" name="priority">
                                            <option value="low" @if($order->priority=="low") selected
                                                    @endif>low</option>
                                            <option value="medium"  @if($order->priority=="medium") selected
                                                    @endif>medium</option>
                                            <option value="high"  @if($order->priority=="high") selected
                                                    @endif>high</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">update</button>
                                    </div>

                                </form>
                            </div>

                            <div class="card-footer">
                                <div id="map" style="height: 500px"></div>
                            </div>
                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')

    <script>
        var map;

        var lat = parseFloat('{{ $order->lat }}');
        var long = parseFloat('{{ $order->long }}');

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: lat, lng: long},
                zoom: 8
            });
        }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5mZwIOalfG5xGHOxjKpymj94kbY6zOVk&callback=initMap"
            async defer></script>
@endsection