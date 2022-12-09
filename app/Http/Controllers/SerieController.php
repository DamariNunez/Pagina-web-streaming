<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;
use App\Actor;
use App\Platform;
use App\Language;
use App\Director;
use App\Direct;
use App\Participate;
use App\AudioAvailable;
use App\SubtitleAvailable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Lang;

class SerieController extends Controller
{
    const PAGINATE_SIZE = 10;

    public function index (Request $request){
        
        $serieTitle = null;
        if ($request->has('serieTitle')){
            $serieTitle = $request->serieTitle;
            $series = Serie::where('title', 'like', '%'. $serieTitle. '%')
                            ->paginate(self::PAGINATE_SIZE);
        }else{
            $series = Serie::paginate(self::PAGINATE_SIZE);
        }
        return view('series.index', ['series' => $series, 'serieTitle' => $serieTitle]);
    }

    public function create (){
        $actors = Actor::all();
        $directors = Director::all();
        $platforms = Platform::all();
        $languages = Language::all();
        return view('series.create', ['actors' => $actors, 'directors' => $directors,
        'platforms' => $platforms, 'languages' => $languages]);
    }

    public function store (Request $request){

        $this->validateSerie($request)->validate();

        $serieStore = false;
        $actorStore = false;
        $directorStore = false;
        $audioStore = false;
        $subtitleStore = false;

        $existe = Serie::where('title','=', $request->serieTitle)->exists();
        if(!$existe && $request != null){
            //Almacenar serie
            if ($request->has('serieTitle')){
                $serie = new Serie();
                $serie->title = $request->serieTitle;
                if($request->has('platformName')){
                    $idPlatform =  Platform::where('name', $request->platformName)->pluck('id');
                    if (!empty($idPlatform)){
                        $serie->idPlatform = $idPlatform[0];
                    }
                }
                $serie->save();
                $serieStore = true;
            }

            //Obtener el id de la serie almacenada
            $idSerie = Serie::pluck('id')->last();
            
            //Almacenar Directores
            if($request->has('directorArray')){
                foreach($request->directorArray as $dir){
                    $arrayName = explode(' ', $dir);
                    $idDirector =  Director::where('name', $arrayName[0])
                                            ->where('lastName', $arrayName[1])
                                            ->pluck('id');
                    if (!empty($idDirector)){
                        $direct = new Direct();
                        $direct->idDirector = $idDirector[0];
                        $direct->idSerie = $idSerie;
                        $direct->save();
                        $directorStore = true;
                    }
                }
            }
            
            //Almacenar Actores
            if($request->has('actorArray')){
                foreach($request->actorArray as $act){
                    $arrayName = explode(' ', $act);
                    $idActor =  Actor::where('name', $arrayName[0])
                                     ->where('lastName', $arrayName[1])
                                     ->pluck('id');
                    if ($idActor != null){
                        $participate = new Participate();
                        $participate->idActor = $idActor[0];
                        $participate->idSerie = $idSerie;
                        $participate->save();
                        $actorStore = true;
                    }
                }
            }
            
            //Almacenar Audios
            if($request->has('audioArray')){
                foreach($request->audioArray as $aud){
                    $idLanguage = Language::where('name', $aud)
                                     ->pluck('id');
                    if ($idLanguage != null){
                        $audio = new AudioAvailable();
                        $audio->idLanguage = $idLanguage[0];
                        $audio->idSerie = $idSerie;
                        $audio->save();
                        $audioStore = true;
                    }
                }
            }
            
            //Almacenar Subtítulos
            if($request->has('subtitleArray')){
                foreach($request->subtitleArray as $sub){
                    $idLanguage = Language::where('name', $sub)
                                     ->pluck('id');
                    if ($idLanguage != null){
                        $subtitle = new SubtitleAvailable();
                        $subtitle->idLanguage = $idLanguage[0];
                        $subtitle->idSerie = $idSerie;
                        $subtitle->save();
                        $subtitleStore = true;
                    }
                }
            }
        }

        if ($serieStore == true && $directorStore == true && $actorStore == true && $audioStore == true && $subtitleStore == true){
            return redirect()->route('series.index')->with('success', Lang::get('alerts.series_created_successfully'));
        }

        return redirect()->route('series.index')->with('danger', Lang::get('alerts.series_created_error'));
    }

    public function edit (Serie $serie){
        $actors = Actor::all();
        $directors = Director::all();
        $platforms = Platform::all();
        $languages = Language::all();
        return view('series.create', ['serie' => $serie, 'actors' => $actors, 'directors' => $directors,
        'platforms' => $platforms, 'languages' => $languages]);
    }

    public function update (Request $request, Serie $serie){

        $this->validateSerie($request)->validate();

        $serieUpdate = false;
        $platformUpdate = false;
        $actorUpdate = false;
        $directorUpdate = false;
        $audioUpdate = false;
        $subtitleUpdate = false;

        $existe = Serie::where('id', $serie->id)->exists();
        if($request != null and $serie != null and $existe){
            //Editar Serie
            if ($request->has('serieTitle')){
                $serie->title = $request->serieTitle;
                $serie->save();
                $serieUpdate = true;
            }
            
            //Editar Plataforma
            if ($request->has('platformName')){
                $idPlatform = Platform::where('name', $request->platformName)->pluck('id');
                if ($idPlatform != null){
                    $serie->idPlatform = $idPlatform[0];
                    $serie->save();
                    $platformUpdate = true;
                }
            }
            
            //Editar Directores
            $directList = Direct::where('idSerie', $serie->id)->pluck('idDirector');
            if ($request->has('directorArray')){
                //Agregar Directores
                foreach ($request->directorArray as $dir){
                    $arrayName = explode(' ', $dir);
                    $idDirector =  Director::where('name', $arrayName[0])
                                            ->where('lastName', $arrayName[1])
                                            ->pluck('id');
                    if (!Direct::where('idSerie', $serie->id)->where('idDirector', $idDirector[0])->exists()){
                        $direct = new Direct();
                        $direct->idDirector = $idDirector[0];
                        $direct->idSerie = $serie->id;
                        $direct->save();
                        $directorUpdate = true;
                    }
                               
                }
                //Eliminar Directores
                $idDirectorArray[] = null;
                foreach ($request->directorArray as $dir){
                    $arrayName = explode(' ', $dir);
                    $idDirector =  Director::where('name', $arrayName[0])
                                            ->where('lastName', $arrayName[1])
                                            ->pluck('id');
                    array_push($idDirectorArray, $idDirector[0]);                        
                }
                foreach ($directList as $dir){
                    if (!in_array($dir, $idDirectorArray)){
                        $direct = Direct::where('idSerie', $serie->id)
                                        ->where('idDirector', $dir)->delete();
                        $directorUpdate = true;
                    }                        
                }
            }
         
            //Editar Actores
            $participateList = Participate::where('idSerie', $serie->id)->pluck('idActor');
            if ($request->has('actorArray')){
                //Agregar Actores
                foreach ($request->actorArray as $act){
                    $arrayName = explode(' ', $act);
                    $idActor =  Actor::where('name', $arrayName[0])
                                            ->where('lastName', $arrayName[1])
                                            ->pluck('id');
                    if (!Participate::where('idSerie', $serie->id)->where('idActor', $idActor[0])->exists()){
                        $participate = new Participate();
                        $participate->idActor = $idActor[0];
                        $participate->idSerie = $serie->id;
                        $participate->save();
                        $actorUpdate = true;
                    }
                               
                }
                //Eliminar Actores
                $idActorArray[] = null;
                foreach ($request->actorArray as $act){
                    $arrayName = explode(' ', $act);
                    $idActor =  Actor::where('name', $arrayName[0])
                                            ->where('lastName', $arrayName[1])
                                            ->pluck('id');
                    array_push($idActorArray, $idActor[0]);                        
                }
                foreach ($participateList as $par){
                    if (!in_array($par, $idActorArray)){
                        $participate = Participate::where('idSerie', $serie->id)
                                        ->where('idActor', $par)->delete();
                        $actorUpdate = true;                
                    }                        
                }
            }
            
            //Editar Audios
            $audioList = AudioAvailable::where('idSerie', $serie->id)->pluck('idLanguage');
            if ($request->has('audioArray')){
                //Agregar Audios
                foreach ($request->audioArray as $aud){
                    $idLanguage =  Language::where('name', $aud)->pluck('id');
                    if (!AudioAvailable::where('idSerie', $serie->id)->where('idLanguage', $idLanguage[0])->exists()){
                        $audioAvailable = new AudioAvailable();
                        $audioAvailable->idLanguage = $idLanguage[0];
                        $audioAvailable->idSerie = $serie->id;
                        $audioAvailable->save();
                        $audioUpdate = true;
                    }
                               
                }
                //Eliminar Audios
                $idLanguageArray[] = null;
                foreach ($request->audioArray as $aud){
                    $idLanguage =  Language::where('name', $aud)->pluck('id');
                    array_push($idLanguageArray, $idLanguage[0]);                        
                }
                foreach ($audioList as $audio){
                    if (!in_array($audio, $idLanguageArray)){
                        $audioAvailable = AudioAvailable::where('idSerie', $serie->id)
                                        ->where('idLanguage', $audio)->delete();
                        $audioUpdate = true;
                    }                        
                }
            }

            //Editar Subtítulos
            $subtitleList = SubtitleAvailable::where('idSerie', $serie->id)->pluck('idLanguage');
            if ($request->has('subtitleArray')){
                //Agregar Subtítulos
                foreach ($request->subtitleArray as $sub){
                    $idLanguage =  Language::where('name', $sub)->pluck('id');
                    if (!SubtitleAvailable::where('idSerie', $serie->id)->where('idLanguage', $idLanguage[0])->exists()){
                        $subtitleAvailable = new SubtitleAvailable();
                        $subtitleAvailable->idLanguage = $idLanguage[0];
                        $subtitleAvailable->idSerie = $serie->id;
                        $subtitleAvailable->save();
                        $subtitleUpdate = true;
                    }
                               
                }
                //Eliminar Subtítulos
                $idLanguageAudioArray[] = null;
                foreach ($request->subtitleArray as $sub){
                    $idLanguage =  Language::where('name', $sub)->pluck('id');
                    array_push($idLanguageAudioArray, $idLanguage[0]);                        
                }
                foreach ($subtitleList as $subtitle){
                    if (!in_array($subtitle, $idLanguageAudioArray)){
                        $subtitleAvailable = SubtitleAvailable::where('idSerie', $serie->id)
                                        ->where('idLanguage', $subtitle)->delete();
                        $subtitleUpdate = true;
                    }                        
                }
            }
        }

        if ($serieUpdate == true || $platformUpdate == true || $directorUpdate == true || $actorUpdate == true || $audioUpdate == true || $subtitleUpdate == true){
            return redirect()->route('series.index')->with('success', Lang::get('alerts.series_updated_successfully'));
        }
        
        return redirect()->route('series.index')->with('danger', Lang::get('alerts.series_updated_error'));
    }

    public function delete (Request $request, Serie $serie){

        $exist = Serie::where('id', $serie->id)->exists();
        $participateList = Participate::where('idSerie', $serie->id)->get();
        $directList = Direct::where('idSerie', $serie->id)->get();
        $audioList = AudioAvailable::where('idSerie', $serie->id)->get();
        $subtitleList = SubtitleAvailable::where('idSerie', $serie->id)->get();
        if($serie != null && $exist){
            foreach ($participateList as $participate){
                $participate->delete();
            }
            foreach ($directList as $direct){
                $direct->delete();
            }
            foreach ($audioList as $audio){
                $audio->delete();
            }
            foreach ($subtitleList as $subtitle){
                $subtitle->delete();
            }
            $serie->delete();
            return redirect()->route('series.index')->with('success', Lang::get('alerts.series_deleted_successfully'));
        }
        return redirect()->route('series.index')->with('danger', Lang::get('alerts.series_deleted_error'));
    }

    function validateSerie($request){
        return Validator::make($request->all(), [
            'serieTitle' => ['required', 'string', 'max:255', 'min:2']
        ]);
    }
}
