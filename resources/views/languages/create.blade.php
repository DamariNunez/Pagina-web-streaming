@extends('layouts.main')

@section('title')
    @isset($actor)
        {{__('strings.edit_title_languages')}}
    @else
        {{__('strings.create_title_languages')}} 
    @endisset       
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row">
                        @isset($language)
                        <h1>{{__('strings.edit_title_languages')}} {{$language->name_language}}<h1>
                        @else
                        <h1>{{__('strings.create_title_languages')}} <h1>
                        @endisset
                    </div>
                </div>
                <div class="card-body">
                    @isset($language)
                    <form name="edit_language" action="{{route('languages.update', $language)}}" method="POST">
                        @csrf
                    @else
                    <form name="create_language" action="{{route('languages.store')}}" method="POST">
                        @csrf   
                    @endisset
                        <div class="mb-3">
                            <label for="languageName" class="form-label">{{__('strings.name_placeholder_language')}}</label>
                            <input id="languageName" name="languageName" type="text" placeholder="{{__('strings.name_placeholder_language')}}" class="form-control" required 
                            @isset($language) value="{{ old('languageName', $language->name)}}" @else value="{{  old('languageName')}}" @endisset />
                            <label for="languageIsoCode" class="form-label">{{__('strings.iso_code_placeholder_language')}}</label>
                            <input id="languageIsoCode" name="languageIsoCode" type="text" placeholder="{{__('strings.iso_code_placeholder_language')}}" class="form-control" required 
                            @isset($language) value="{{ old('languageIsoCode', $language->iso_code)}}" @else value="{{  old('languageIsoCode')}}" @endisset />
                        </div>
                        <input type="submit" value="@isset($language) {{__('strings.save_btn')}} @else {{__('strings.create_btn')}} @endisset" class="btn btn-primary" name="createBtn" />   
                        <a class="btn-cancel btn btn-secondary" href="/languages">Cancelar</a>
                    </form>      
                </div>
            </div>
        </div>    
    </div>
@endsection