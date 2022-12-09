@extends('layouts.main')

@section('title')
    {{__('strings.list_title_platform')}}
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row">
                        <h1>{{__('strings.list_title_platform')}}</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a class="header__link btn btn-sm btn-success" href="{{ route('platforms.create')}}">{{__('strings.create_platform')}}&nbsp;<i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                        <form action="" method="post">
                            @csrf
                            <input id="platformName" name="platformName" class="form-control" value="@isset($platformName) {{$platformName}} @endisset" placeholder="{{__('strings.search_platform_placeholder')}}" />
                            <button type="submit" class="btn btn-primary">{{__('strings.search_btn')}}</button>
                            <a class="btn-cancel btn btn-secondary" href="/platforms">Cancelar</a>
                        </form>
                    </div>
                    <div class="table-responsive mt-3">
                        @if($platforms)
                            <table class="table table-striped align-items-center">
                                <thead class="thead-light">
                                    <th>{{__('strings.id_header')}}</th>
                                    <th>{{__('strings.name_header')}}</th>
                                    <th>{{__('strings.actions_header')}}</th>
                                </thead>
                                <tbody>
                                @foreach ($platforms as $platform)
                                    <tr>
                                        <td>
                                            {{$platform->id}}
                                        </td>
                                        <td>
                                            {{$platform->name}}
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="platform">
                                                <a class="btn btn-success" href="{{ route('platforms.edit',$platform)}}">{{__('strings.edit_btn')}}</a>
                                                &nbsp;&nbsp;
                                                <form id="delete-form-{{ $platform->id }}" action="{{ route('platforms.delete', [$platform])}}" method="post" style="display: inline-block;">
                                                    {{ method_field('delete')}}
                                                    {{ csrf_field()}}
                                                    <button tyoe="submit" class="btn btn-danger">{{__('strings.delete_btn')}}</button>                                                </form>    
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-warning mt-3">
                                {{__('strings.no_platforms')}}
                            </div>   
                        @endif     
                    </div>
                    <div class="row my-3 pr-3">
                        <div class="col">
                        </div>
                        <div class="col">
                            <div class="float-right">
                                {{$platforms->links()}}
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
@endsection