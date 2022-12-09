<?php
    use App\Language;
    use App\Platform;
    use App\Actor;
    use App\Director;
    use App\Direct;
    use App\Participate;
    use App\AudioAvailable;
    use App\SubtitleAvailable;
?>

@extends('layouts.main')

@section('title')
    {{__('strings.list_title_serie')}}
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row">
                        <h1>{{__('strings.list_title_serie')}}</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a class="header__link btn btn-sm btn-success" href="{{ route('series.create')}}">{{__('strings.create_serie')}}&nbsp;<i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                        <form action="" method="post">
                            @csrf
                            <input id="serieTitle" name="serieTitle" class="form-control" value="@isset($serieTitle) {{$serieTitle}} @endisset" placeholder="{{__('strings.search_serie_placeholder')}}" />
                            <button type="submit" class="btn btn-primary">{{__('strings.search_btn')}}</button>
                            <a class="btn-cancel btn btn-secondary" href="/series">Cancelar</a>
                        </form>
                    </div>
                    <div class="table-responsive mt-3">
                        @if($series)
                            <table class="table table-striped align-items-center">
                                <thead class="thead-light">
                                    <th>{{__('strings.id_header')}}</th>
                                    <th>{{__('strings.title_header')}}</th>
                                    <th>{{__('strings.platform_header')}}</th>
                                    <th>{{__('strings.actor_header')}}</th>
                                    <th>{{__('strings.director_header')}}</th>
                                    <th>{{__('strings.language_header')}}</th>
                                    <th>{{__('strings.subtitle_header')}}</th>
                                    <th>{{__('strings.actions_header')}}</th>
                                </thead>
                                <tbody>
                                @foreach ($series as $serie)
                                    <tr>
                                        <td>
                                            {{$serie->id}}
                                        </td>
                                        <td>
                                            {{$serie->title}}
                                        </td>
                                        <td>
                                            <?php
                                            $platform = Platform::where('id', $serie->idPlatform)->get();
                                            ?>
                                            {{$platform[0]->name}}
                                        </td>
                                        <td>
                                            <?php
                                            $participateList = Participate::where('idSerie', $serie->id)->pluck('idActor');
                                            if(!empty($participateList)){
                                                foreach ($participateList as $participate) {
                                                    $actor = Actor::where('id', $participate)->get();
                                                    ?>
                                                        -{{$actor[0]->name}} {{$actor[0]->lastName}}
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $directList = Direct::where('idSerie', $serie->id)->pluck('idDirector');
                                            if(!empty($directList)){
                                                foreach ($directList as $direct) {
                                                    $director = Director::where('id', $direct)->get();
                                                    ?>
                                                        -{{$director[0]->name}} {{$director[0]->lastName}}
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $audioAvailableList = AudioAvailable::where('idSerie', $serie->id)->pluck('idLanguage');
                                            if(!empty($audioAvailableList)){
                                                foreach ($audioAvailableList as $audioAvailable) {
                                                    $audio = Language::where('id', $audioAvailable)->get();
                                                    ?>
                                                        -{{$audio[0]->name}}
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $subtitleAvailableList = SubtitleAvailable::where('idSerie', $serie->id)->pluck('idLanguage');
                                            if(!empty($subtitleAvailableList)){
                                                foreach ($subtitleAvailableList as $subtitleAvailable) {
                                                    $subtitle = Language::where('id', $subtitleAvailable)->get();
                                                    ?>
                                                        -{{$subtitle[0]->name}}
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Serie">
                                                <a class="btn btn-success" href="{{ route('series.edit',$serie)}}">{{__('strings.edit_btn')}}</a>
                                                &nbsp;&nbsp;
                                                <form id="delete-form-{{ $serie->id }}" action="{{ route('series.delete', [$serie])}}" method="post" style="display: inline-block;">
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
                                {{__('strings.no_series')}}
                            </div>   
                        @endif     
                    </div>
                    <div class="row my-3 pr-3">
                        <div class="col">
                        </div>
                        <div class="col">
                            <div class="float-right">
                                {{$series->links()}}
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
@endsection