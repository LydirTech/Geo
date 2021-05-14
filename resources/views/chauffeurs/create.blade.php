@extends('layouts.app')

@section('title', __('chauffeur.list'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('chauffeur.create') }}</div>
            <form method="POST" action="{{ route('chauffeurs.store') }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="control-label">{{ __('chauffeur.name') }}</label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="num_tel" class="control-label">{{ __('chauffeur.num_tel') }}</label>
                        <input id="num_tel" type="number" class="form-control{{ $errors->has('num_tel') ? ' is-invalid' : '' }}" name="num_tel" value="{{ old('num_tel') }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="navette_id" class="control-label">{{ __('chauffeur.navette_id') }}</label>
                        <select id="navette_id" class="form-control{{ $errors->has('navette_id') ? ' is-invalid' : '' }}" name="navette_id" value="{{ old('navette_id') }}" required>
                            @foreach ( $listNavet as $a)
                            <option value="{{ $a->id }}">{{ $a->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('chauffeur.create') }}" class="btn btn-success">
                    <a href="{{ route('chauffeurs.index') }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

