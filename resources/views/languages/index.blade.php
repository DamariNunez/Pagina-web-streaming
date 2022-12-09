@extends('layouts.main')

@section('title')
    {{__('strings.list_title_languages')}}
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row">
                        <h1>{{__('strings.list_title_languages')}}</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a class="header__link btn btn-sm btn-success" href="{{ route('languages.create')}}">{{__('strings.create_languages')}}&nbsp;<i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                        <form action="" method="post">
                            @csrf
                            <input id="languageName" name="languageName" class="form-control" value="@isset($languagesName) {{$languagesName}} @endisset" placeholder="{{__('strings.search_language_placeholder')}}" />
                            <button type="submit" class="btn btn-primary">{{__('strings.search_btn')}}</button>
                            <a class="btn-cancel btn btn-secondary" href="/languages">Cancelar</a>
                        </form>
                    </div>
                    <div class="table-responsive mt-3">
                        @if($languages)
                            <table class="table table-striped align-items-center">
                                <thead class="thead-light">
                                    <th>{{__('strings.id_header')}}</th>
                                    <th>{{__('strings.name_header')}}</th>
                                    <th>{{__('strings.iso_code_header')}}</th>
                                    <th>{{__('strings.actions_header')}}</th>
                                </thead>
                                <tbody>
                                @foreach ($languages as $language)
                                    <tr>
                                        <td>
                                            {{$language->id}}
                                        </td>
                                        <td>
                                            {{$language->name}}
                                        </td>
                                        <td>
                                            {{$language->iso_code}}
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Language">
                                                <a class="btn btn-success" href="{{ route('languages.edit',$language)}}">{{__('strings.edit_btn')}}</a>
                                                &nbsp;&nbsp;
                                                <form id="delete-form-{{ $language->id }}" action="{{ route('languages.delete', $language)}}" method="post" style="display: inline-block;">
                                                    {{ method_field('delete')}}
                                                    {{ csrf_field()}}
                                                    <button tyoe="submit" class="btn btn-danger">{{__('strings.delete_btn')}}</button>
                                                </form>    
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-warning mt-3">
                                {{__('strings.no_languages')}}
                            </div>   
                        @endif     
                    </div>
                    <div class="row my-3 pr-3">
                        <div class="col">
                        </div>
                        <div class="col">
                            <div class="float-right">
                                @if($languages instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                    {{$languages->links()}}
                                @endif
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
@endsection