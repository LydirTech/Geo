@extends('layouts.app')

@section('title', __('navette.detail'))

@section('content')

<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">{{ __('navette.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('navette.name') }}</td><td>{{ $navette->name }}</td></tr>
                        <tr><td>{{ __('navette.etabA_id') }}</td><td>{{ $navette->getEtabName($navette->etabA_id)}}</td></tr>
                        <tr><td>{{ __('navette.etabB_id') }}</td><td>{{ $navette->getEtabName($navette->etabB_id)}}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $navette)
                    <a href="{{ route('navettes.edit', $navette) }}" id="edit-outlet-{{ $navette->id }}" class="btn btn-warning">{{ __('navette.edit') }}</a>
                @endcan
                @if(auth()->check())
                    <a href="{{ route('navettes.index') }}" class="btn btn-link">{{ __('outlet.back_to_index') }}</a>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ trans('outlet.location') }}</div>
            <div class="card-body" id="mapid"></div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>
<link rel="stylesheet" href="leaflet-routing-machine.css">
<style>
    #mapid { height: 700px; }
    .leaflet-routing-alt {
    display: none;
}
</style>
@endsection
@push('scripts')
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<script>
    var map = L.map('mapid').setView([{{ ($navette->getEtabLat($navette->etabA_id)+$navette->getEtabLat($navette->etabB_id))/2 }}, {{ ($navette->getEtabLon($navette->etabA_id)+$navette->getEtabLon($navette->etabB_id))/2 }}], {{ config('leaflet.detail_zoom_level') }});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);



    L.Routing.control({
    waypoints: [
        L.latLng({{ $navette->getEtabLat($navette->etabA_id) }}, {{ $navette->getEtabLon($navette->etabA_id) }}),
        L.latLng({{ $navette->getEtabLat($navette->etabB_id) }}, {{ $navette->getEtabLon($navette->etabB_id) }})
        ],
        lineOptions: {
      styles: [{color: '#34495E', opacity: 1, weight: 5}]
            },


    }).addTo(map);

</script>
@endpush
