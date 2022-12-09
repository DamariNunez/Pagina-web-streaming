<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Director;
use App\Direct;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Lang;

class DirectorController extends Controller
{
    const PAGINATE_SIZE = 10;

    public function index (Request $request){
        
        $directorName = null;
        if ($request->has('directorName')){
            $directorName = $request->directorName;
            $directors = Director::where('name', 'like', '%'. $directorName. '%')
                                   ->orwhere('lastName', 'like', '%'. $directorName. '%')
                                   ->orwhere('nacionality', 'like', '%'. $directorName. '%')
                                   ->paginate(self::PAGINATE_SIZE);
        }else{
            $directors = Director::paginate(self::PAGINATE_SIZE);
        }
        return view('directors.index', ['directors' => $directors, 'directorName' => $directorName]);
    }

    public function create (){
        return view('directors.create');
    }

    public function store (Request $request){
        $this->validateDirector($request)->validate();

        $existe = Director::where('name','=', $request->directorName)
                        ->where('lastName', '=', $request->directorLastName)->exists();
        if(!$existe && $request != null){
            $director = new Director();
            $director->name = $request->directorName;
            $director->lastName = $request->directorLastName;
            $director->dateOfBirth = $request->directorDateOfBirth;
            $director->nacionality = $request->directorNacionality;
            $director->save();
            return redirect()->route('directors.index')->with('success', Lang::get('alerts.directors_created_successfully'));
        }

        return redirect()->route('directors.index')->with('danger', Lang::get('alerts.directors_created_error'));
    }

    public function edit (Director $director){
        return view('directors.create', ['director' => $director]);
    }

    public function update (Request $request, Director $director){

        $this->validateDirector($request)->validate();
        $existe = Director::where('id', $director->id)->exists();
        if($request != null and $director != null and $existe){
            $director->name = $request->directorName;
            $director->lastName = $request->directorLastName;
            $director->dateOfBirth = $request->directorDateOfBirth;
            $director->nacionality = $request->directorNacionality;
            $director->save();
            return redirect()->route('directors.index')->with('success', Lang::get('alerts.directors_updated_successfully'));

        }

        return redirect()->route('directors.index')->with('danger', Lang::get('alerts.directors_updated_error'));
    }

    public function delete (Request $request, Director $director){

        $existe = Director::where('id', $director->id)->exists();
        $existDirector = Direct::where('idDirector', $director->id)->exists();
        if($director != null && $existe && !$existDirector){
            $director->delete();
            return redirect()->route('directors.index')->with('success', Lang::get('alerts.directors_deleted_successfully'));
        }
        return redirect()->route('directors.index')->with('danger', Lang::get('alerts.directors_deleted_error'));
    }

    function validateDirector($request){
        return Validator::make($request->all(), [
            'directorName' => ['required', 'string', 'max:255', 'min:2'],
            'directorLastName' => ['required', 'string', 'max:255', 'min:2'],
            'directorDateOfBirth' => ['required', 'date', 'max:11', 'min:10'],
            'directorNacionality' => ['required', 'string', 'max:255', 'min:2']
        ]);
    }
}

