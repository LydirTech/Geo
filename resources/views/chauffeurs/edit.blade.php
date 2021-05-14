@extends('layouts.app')

@section('title', __('chauffeur.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (request('action') == 'delete' && $chauffeur)
        @can('delete', $chauffeur)
            <div class="card">
                <div class="card-header">{{ __('chauffeur.delete') }}</div>
                <div class="card-body">
                    <label class="control-label text-primary">{{ __('chauffeur.name') }}</label>
                    <p>{{ $chauffeur->name }}</p>
                    <label class="control-label text-primary">{{ __('chauffeur.num_tel') }}</label>
                    <p>{{ $chauffeur->num_tel }}</p>
                    <label class="control-label text-primary">{{ __('chauffeur.navette_id') }}</label>
                    <p>{{ $chauffeur->navette_id}}</p>
                    {!! $errors->first('chauffeur_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('chauffeur.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('chauffeurs.destroy', $chauffeur) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="chauffeur_id" type="hidden" value="{{ $chauffeur->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('chauffeurs.edit', $chauffeur) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">{{ __('chauffeur.edit') }}</div>
            <form method="POST" action="{{ route('chauffeurs.update', $chauffeur) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="control-label">{{ __('chauffeur.name') }}</label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $chauffeur->name) }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="num_tel" class="control-label">{{ __('chauffeur.num_tel') }}</label>
                        <input id="num_tel" type="number" class="form-control{{ $errors->has('num_tel') ? ' is-invalid' : '' }}" name="num_tel" value="{{ old('num_tel', $chauffeur->num_tel) }}" required>
                        {!! $errors->first('num_tel', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="navette_id" class="control-label">{{ __('chauffeur.navette_id') }}</label>
                        <select id="navette_id" class="form-control{{ $errors->has('navette_id') ? ' is-invalid' : '' }}" name="navette_id" value="{{ old('navette_id', $chauffeur->navette_id) }}" required>
                            @foreach ( $listNavet as $a)
                            <option value="{{ $a->id }}"
                            @if ($a->id === $chauffeur->navette_id )
                                {{'selected'}}
                            @endif >{{ $a->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('chauffeur.update') }}" class="btn btn-success">
                    <a href="{{ route('chauffeurs.show', $chauffeur) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $chauffeur)
                        <a href="{{ route('chauffeurs.edit', [$chauffeur, 'action' => 'delete']) }}" id="del-chauffeur-{{ $chauffeur->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
