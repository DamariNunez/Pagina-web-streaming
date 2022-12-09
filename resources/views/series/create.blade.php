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
    @isset($serie)
        {{__('strings.edit_title_serie')}}
    @else
        {{__('strings.create_title_serie')}} 
    @endisset       
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row">
                        @isset($serie)
                        <h1>{{__('strings.edit_title_serie')}} {{$serie->title}}<h1>
                        @else
                        <h1>{{__('strings.create_title_serie')}} <h1>
                        @endisset
                    </div>
                </div>
                <div class="card-body">
                    @isset($serie)
                    <form name="edit_serie" action="{{route('series.update', $serie)}}" method="POST">
                        @csrf
                    @else
                    <form name="create_serie" action="{{route('series.store')}}" method="POST">
                        @csrf   
                    @endisset
                        <div class="mb-3">
                            <label for="serieTitle" class="form-label">{{__('strings.title_placeholder_serie')}}</label>
                            <input id="serieTitle" name="serieTitle" type="text" placeholder="{{__('strings.title_placeholder_serie')}}" class="form-control" required 
                            @isset($serie) value="{{ old('serieTitle', $serie->title)}}" @else value="{{  old('serieTitle')}}" @endisset />
                            <label for="platformName" class="form-label">{{__('strings.select_placeholder_platform')}}</label>
                            <select id="platformName" name="platformName" class="form-control" required>
                                @foreach ($platforms as $platform)
                                    @isset($serie)
                                        <?php
                                        if ($platform->id == $serie->idPlatform){
                                            ?>
                                                <option selected>{{ $platform->name}}</option>
                                            <?php
                                        } 
                                        ?>
                                        <option>{{ $platform->name}}</option>
                                    @else
                                        <option>{{$platform->name}}</option>
                                    @endisset
                                @endforeach    
                            </select>   
                            <label for="actorName" class="form-label">{{__('strings.select_placeholder_actor')}}</label>
                            <select id="actorArray" name="actorArray[]" class="form-control" multiple required>
                                @foreach ($actors as $actor)
                                    @isset($serie)
                                        <?php
                                        $i = 0;
                                        $participateList = Participate::where('idSerie', $serie->id)->pluck('idActor');
                                        foreach ($participateList as $participate) {
                                            if ($actor->id == $participate){
                                                ?>
                                                    <option selected>{{ $actor->name.' '.$actor->lastName}}</option>
                                                <?php
                                                $i = 1;;
                                            }
                                        }
                                        if($i == 0 ){
                                            ?>
                                                <option>{{ $actor->name.' '.$actor->lastName}}</option>
                                            <?php
                                            }  
                                        ?>
                                    @else
                                        <option>{{$actor->name}} {{$actor->lastName}}</option>
                                    @endisset
                                @endforeach
                            </select>   
                            <label for="directorName" class="form-label">{{__('strings.select_placeholder_director')}}</label>
                            <select id="directorArray" name="directorArray[]" class="form-control" multiple required>
                                @foreach ($directors as $director)
                                    @isset($serie)
                                        <?php
                                        $i = 0;
                                        $directList = Direct::where('idSerie', $serie->id)->pluck('idDirector');
                                        foreach ($directList as $direct) {
                                            if ($director->id == $direct){
                                                ?>
                                                    <option selected>{{ $director->name.' '.$director->lastName}}</option>
                                                <?php
                                                $i = 1;;
                                            }
                                        }
                                        if($i == 0 ){
                                            ?>
                                                <option>{{ $director->name.' '.$director->lastName}}</option>
                                            <?php
                                            }  
                                        ?>
                                    @else
                                        <option>{{$director->name}} {{$director->lastName}}</option>
                                    @endisset
                                @endforeach
                            </select>   
                            <label for="audioName" class="form-label">{{__('strings.select_placeholder_audio')}}</label>
                            <select id="audioArray" name="audioArray[]" class="form-control" multiple required>
                                @foreach ($languages as $language)
                                    @isset($serie)
                                        <?php
                                        $i = 0;
                                        $audioAvailableList = AudioAvailable::where('idSerie', $serie->id)->pluck('idLanguage');
                                        foreach ($audioAvailableList as $audioAvailable) {
                                            if ($language->id == $audioAvailable){
                                                ?>
                                                    <option selected>{{$language->name}}</option>
                                                <?php
                                                $i = 1;;
                                            }
                                        }
                                        if($i == 0 ){
                                            ?>
                                                <option>{{$language->name}}</option>
                                            <?php
                                        }  
                                        ?>
                                    @else
                                        <option>{{$language->name}}</option>
                                    @endisset
                                @endforeach
                            </select>   
                            <label for="subtitleName" class="form-label">{{__('strings.select_placeholder_subtitle')}}</label>
                            <select id="subtitleArray" name="subtitleArray[]" class="form-control" multiple required>
                                @foreach ($languages as $language)
                                    @isset($serie)
                                        <?php
                                        $i = 0;
                                        $subtitleAvailableList = SubtitleAvailable::where('idSerie', $serie->id)->pluck('idLanguage');
                                        foreach ($subtitleAvailableList as $subtitleAvailable) {
                                            if ($language->id == $subtitleAvailable){
                                                ?>
                                                    <option selected>{{$language->name}}</option>
                                                <?php
                                                $i = 1;;
                                            }
                                        }
                                        if($i == 0 ){
                                            ?>
                                                <option>{{$language->name}}</option>
                                            <?php
                                        }  
                                        ?>
                                    @else
                                        <option>{{$language->name}}</option>
                                    @endisset
                                @endforeach
                            </select>   
                        </div>
                        <input type="submit" value="@isset($serie) {{__('strings.save_btn')}} @else {{__('strings.create_btn')}} @endisset" class="btn btn-primary" name="createBtn" />   
                    </form>      
                </div>
            </div>
        </div>    
    </div>
@endsection