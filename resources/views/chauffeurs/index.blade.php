@extends('layouts.app')


@section('title', __('chauffeur.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\Chauffeur)
            <a href="{{ route('chauffeurs.create') }}" class="btn btn-success">{{ __('chauffeur.create') }}</a>
        @endcan
    </div>
    <h1 class="page-title">{{ __('chauffeur.list') }} <small>{{ __('app.total') }} : {{ $chauffeurs->total() }} {{ __('chauffeur.chauffeur') }}</small></h1>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="control-label">{{ __('chauffeur.search') }}</label>
                        <input placeholder="{{ __('chauffeur.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('chauffeur.search') }}" class="btn btn-secondary">
                    <a href="{{ route('chauffeurs.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('chauffeur.name') }}</th>
                        <th>{{ __('chauffeur.num_tel') }}</th>
                        <th>{{ __('chauffeur.navette') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($chauffeurs as $key => $chauffeur)
                    <tr>
                        <td class="text-center">{{ $chauffeurs->firstItem() + $key }}</td>
                        <td>{{ $chauffeur->name }}</td>
                        <td>{{ $chauffeur->num_tel }}</td>
                        <td>{{ $chauffeur->getNavetteName($chauffeur->navette_id)}}</td>
                        <td class="text-center">
                            <a href="{{ route('chauffeurs.show', $chauffeur) }}" id="show-chauffeur-{{ $chauffeur->id }}">{{ __('app.show') }}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $chauffeurs->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
