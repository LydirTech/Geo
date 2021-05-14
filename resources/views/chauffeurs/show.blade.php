@extends('layouts.app')

@section('title', __('chauffeur.detail'))

@section('content')

<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">{{ __('chauffeur.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('chauffeur.name') }}</td><td>{{ $chauffeur->name }}</td></tr>
                        <tr><td>{{ __('chauffeur.num_tel') }}</td><td>{{ $chauffeur->num_tel}}</td></tr>
                        <tr><td>{{ __('chauffeur.etabB_id') }}</td><td>{{ $chauffeur->getNavetteName($chauffeur->navette_id)}}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $chauffeur)
                    <a href="{{ route('chauffeurs.edit', $chauffeur) }}" id="edit-outlet-{{ $chauffeur->id }}" class="btn btn-warning">{{ __('chauffeur.edit') }}</a>
                @endcan
                @if(auth()->check())
                    <a href="{{ route('chauffeurs.index') }}" class="btn btn-link">{{ __('outlet.back_to_index') }}</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
