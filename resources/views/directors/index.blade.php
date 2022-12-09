@extends('layouts.main')

@section('title')
    {{__('strings.list_title_director')}}
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row">
                        <h1>{{__('strings.list_title_director')}}</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a class="header__link btn btn-sm btn-success" href="{{ route('directors.create')}}">{{__('strings.create_director')}}&nbsp;<i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                        <form action="" method="post">
                            @csrf
                            <input id="directorName" name="directorName" class="form-control" value="@isset($directorName) {{$directorName}} @endisset" placeholder="{{__('strings.search_director_placeholder')}}" />
                            <button type="submit" class="btn btn-primary">{{__('strings.search_btn')}}</button>
                            <a class="btn-cancel btn btn-secondary" href="/directors">Cancelar</a>
                        </form>
                    </div>
                    <div class="table-responsive mt-3">
                        @if($directors)
                            <table class="table table-striped align-items-center">
                                <thead class="thead-light">
                                    <th>{{__('strings.id_header')}}</th>
                                    <th>{{__('strings.name_header')}}</th>
                                    <th>{{__('strings.last_name_header')}}</th>
                                    <th>{{__('strings.date_of_birth_header')}}</th>
                                    <th>{{__('strings.nacionality_header')}}</th>
                                    <th>{{__('strings.actions_header')}}</th>
                                </thead>
                                <tbody>
                                @foreach ($directors as $director)
                                    <tr>
                                        <td>
                                            {{$director->id}}
                                        </td>
                                        <td>
                                            {{$director->name}}
                                        </td>
                                        <td>
                                            {{$director->lastName}}
                                        </td>
                                        <td>
                                            {{date('d/m/Y', strtotime($director->dateOfBirth)) }}
                                        </td>
                                        <td>
                                            {{$director->nacionality}}
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="director">
                                                <a class="btn btn-success" href="{{ route('directors.edit',$director)}}">{{__('strings.edit_btn')}}</a>
                                                &nbsp;&nbsp;
                                                <form id="delete-form-{{ $director->id }}" action="{{ route('directors.delete', [$director])}}" method="post" style="display: inline-block;">
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
                                {{__('strings.no_director')}}
                            </div>   
                        @endif     
                    </div>
                    <div class="row my-3 pr-3">
                        <div class="col">
                        </div>
                        <div class="col">
                        <div class="float-right">
                                {{$directors->links()}}
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
@endsection