@extends('layouts.app')

@section('title', __('navette.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (request('action') == 'delete' && $navette)
        @can('delete', $navette)
            <div class="card">
                <div class="card-header">{{ __('navette.delete') }}</div>
                <div class="card-body">
                    <label class="control-label text-primary">{{ __('navette.name') }}</label>
                    <p>{{ $navette->name }}</p>
                    <label class="control-label text-primary">{{ __('navette.etabA_id') }}</label>
                    <p>{{ $navette->getEtabName($navette->etabA_id)}}</p>
                    <label class="control-label text-primary">{{ __('navette.etabB_id') }}</label>
                    <p>{{ $navette->getEtabName($navette->etabB_id)}}</p>
                    {!! $errors->first('navette_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('navette.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('navettes.destroy', $navette) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="navette_id" type="hidden" value="{{ $navette->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('navettes.edit', $navette) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">{{ __('navette.edit') }}</div>
            <form method="POST" action="{{ route('navettes.update', $navette) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="control-label">{{ __('navette.name') }}</label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $navette->name) }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="etabA_id" class="control-label">{{ __('navette.etabA_id') }}</label>
                        <select id="etabA_id" class="form-control{{ $errors->has('etabA_id') ? ' is-invalid' : '' }}" name="etabA_id" value="{{ old('etabA_id', $navette->etabA_id) }}" required>
                            @foreach ( $listEtab as $a)
                            <option value="{{ $a->id }}"
                            @if ($a->id === $navette->etabA_id ))
                                {{'selected'}}
                            @endif >{{ $a->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="etabB_id" class="control-label">{{ __('navette.etabB_id') }}</label>
                        <select id="etabB_id" class="form-control{{ $errors->has('etabB_id') ? ' is-invalid' : '' }}" name="etabB_id" value="{{ old('etabB_id', $navette->etabB_id) }}" required>
                            @foreach ( $listEtab as $a)
                            <option value="{{ $a->id }}"
                            @if ($a->id === $navette->etabB_id )
                                {{'selected'}}
                            @endif >{{ $a->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div id="mapid"></div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('navette.update') }}" class="btn btn-success">
                    <a href="{{ route('navettes.show', $navette) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $navette)
                        <a href="{{ route('navettes.edit', [$navette, 'action' => 'delete']) }}" id="del-navette-{{ $navette->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection

