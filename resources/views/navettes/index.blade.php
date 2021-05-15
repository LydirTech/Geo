@extends('layouts.app')


@section('title', __('navette.list'))

@section('content')
<div class="container">
    <div class="mb-3">
        <div class="float-right">
            @can('create', new App\Navette)
                <a href="{{ route('navettes.create') }}" class="btn btn-success">{{ __('navette.create') }}</a>
            @endcan
        </div>
        <h1 class="page-title">{{ __('navette.list') }} <small>{{ __('app.total') }} : {{ $navettes->total() }} {{ __('navette.Navette') }}</small></h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                        <div class="form-group">
                            <label for="q" class="control-label">{{ __('navette.search') }}</label>
                            <input placeholder="{{ __('navette.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                        </div>
                        <input type="submit" value="{{ __('navette.search') }}" class="btn btn-secondary">
                        <a href="{{ route('navettes.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                    </form>
                </div>
                <table class="table table-sm table-responsive-sm">
                    <thead>
                        <tr>
                            <th class="text-center">{{ __('app.table_no') }}</th>
                            <th>{{ __('navette.name') }}</th>
                            <th>{{ __('navette.etabA_id') }}</th>
                            <th>{{ __('navette.etabB_id') }}</th>
                            <th class="text-center">{{ __('app.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($navettes as $key => $navette)
                        <tr>
                            <td class="text-center">{{ $navettes->firstItem() + $key }}</td>
                            <td>{{ $navette->name }}</td>
                            <td>{{ $navette->getEtabName($navette->etabA_id)}}</td>
                            <td>{{ $navette->getEtabName($navette->etabB_id)}}</td>
                            <td class="text-center">
                                <a href="{{ route('navettes.show', $navette) }}" id="show-navette-{{ $navette->id }}">{{ __('app.show') }}</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card-body">{{ $navettes->appends(Request::except('page'))->render() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
