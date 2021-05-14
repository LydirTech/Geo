@extends('layouts.app')

@section('title', __('navette.list'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('navette.create') }}</div>
            <form method="POST" action="{{ route('navettes.store') }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="control-label">{{ __('navette.name') }}</label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="etabA_id" class="control-label">{{ __('navette.etabA_id') }}</label>
                        <select id="etabA_id" class="form-control{{ $errors->has('etabA_id') ? ' is-invalid' : '' }}" name="etabA_id" value="{{ old('etabA_id') }}" required>
                            @foreach ( $listEtab as $a)
                            <option value="{{ $a->id }}">{{ $a->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="etabB_id" class="control-label">{{ __('navette.etabB_id') }}</label>
                        <select id="etabB_id" class="form-control{{ $errors->has('etabB_id') ? ' is-invalid' : '' }}" name="etabB_id" value="{{ old('etabB_id') }}" required>
                            @foreach ( $listEtab as $a)
                            <option value="{{ $a->id }}">{{ $a->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('navette.create') }}" class="btn btn-success">
                    <a href="{{ route('navettes.index') }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

