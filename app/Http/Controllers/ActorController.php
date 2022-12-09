<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actor;
use App\Participate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Lang;

class ActorController extends Controller
{
    const PAGINATE_SIZE = 10;

    public function index (Request $request){
        
        $actorName = null;
        if ($request->has('actorName')){
            $actorName = $request->actorName;
            $actors = Actor::where('name', 'like', '%'. $actorName. '%')
                            ->orwhere('lastName', 'like', '%'. $actorName. '%')
                            ->orwhere('nacionality', 'like', '%'. $actorName. '%')
                            ->paginate(self::PAGINATE_SIZE);
        }else{
            $actors = Actor::paginate(self::PAGINATE_SIZE);
        }
        return view('actors.index', ['actors' => $actors, 'actorName' => $actorName]);
    }

    public function create (){
        return view('actors.create');
    }

    public function store (Request $request){

        $this->validateActor($request)->validate();

        $existe = Actor::where('name','=', $request->actorName)
                        ->where('lastName', '=', $request->actorLastName)->exists();
        if(!$existe && $request != null){
            $actor = new Actor();
            $actor->name = $request->actorName;
            $actor->lastName = $request->actorLastName;
            $actor->dateOfBirth = $request->actorDateOfBirth;
            $actor->nacionality = $request->actorNacionality;
            $actor->save();
            return redirect()->route('actors.index')->with('success', Lang::get('alerts.actors_created_successfully'));
        }

        return redirect()->route('actors.index')->with('danger', Lang::get('alerts.actors_created_error'));        
    }

    public function edit (Actor $actor){
        return view('actors.create', ['actor' => $actor]);
    }

    public function update (Request $request, Actor $actor){

        $this->validateActor($request)->validate();
        $existe = Actor::where('id', $actor->id)->exists();
        if($request != null and $actor != null and $existe){
            $actor->name = $request->actorName;
            $actor->lastName = $request->actorLastName;
            $actor->dateOfBirth = $request->actorDateOfBirth;
            $actor->nacionality = $request->actorNacionality;
            $actor->save();
            return redirect()->route('actors.index')->with('success', Lang::get('alerts.actors_updated_successfully'));
        }
        
        return redirect()->route('actors.index')->with('danger', Lang::get('alerts.actors_updated_error'));
    }

    public function delete (Request $request, Actor $actor){

        $exist = Actor::where('id', $actor->id)->exists();
        $existActor = Participate::where('idActor', $actor->id)->exists();
        if($actor != null && $exist && !$existActor){
            $actor->delete();
            return redirect()->route('actors.index')->with('success', Lang::get('alerts.actors_deleted_successfully'));
        }
        return redirect()->route('actors.index')->with('danger', Lang::get('alerts.actors_deleted_error'));
    }

    function validateActor($request){
        return Validator::make($request->all(), [
            'actorName' => ['required', 'string', 'max:255', 'min:2'],
            'actorLastName' => ['required', 'string', 'max:255', 'min:2'],
            'actorDateOfBirth' => ['required', 'date', 'max:11', 'min:10'],
            'actorNacionality' => ['required', 'string', 'max:255', 'min:2']
        ]);
    }
}
