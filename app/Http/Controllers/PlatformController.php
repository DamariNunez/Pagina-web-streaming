<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Lang;
use App\Platform;

class PlatformController extends Controller
{
    const PAGINATE_SIZE = 10;

    function index (Request $request){
        
        $platformName = null;
        if($request->has('platformName')){
            $platformName = $request->platformName;
            $platforms = Platform::where('name', 'like','%'.$platformName.'%')->paginate(self::PAGINATE_SIZE);
        }else{
            $platforms = Platform::paginate(self::PAGINATE_SIZE);
        }

        return view('platforms.index',['platforms' => $platforms, 'platformName' => $platformName]);
    }

    function create (){
        return view('platforms.create');
    }

    function store (Request $request){

        $this->validatePlatform($request)->validate();
        $existe = Platform::where('name', '=', $request->platformName)->exists();

        if(!$existe && $request != null){
            $new_platform = new Platform;
            $new_platform->name = $request->platformName;
            $new_platform->save();
            return redirect()->route('platforms.index')->with('success', Lang::get('alerts.platforms_created_success'));
        }

        return redirect()->route('platforms.index')->with('danger', Lang::get('alerts.platforms_created_error'));
    }

    function edit (Platform $platform){
        return view('platforms.create', ['platform' => $platform]);
    }

    function update (Request $request, Platform $platform){

        $this->validatePlatform($request)->validate();
        $existe = Platform::where('id', '=', $platform->id)->exists();

        if($existe && $request != null && $platform != null){
            $platform->name = $request->platformName;
            $platform->save();
            return redirect()->route('platforms.index')->with('success', Lang::get('alerts.platforms_updated_success'));
        }

        return redirect()->route('platforms.index')->with('danger',Lang::get('alerts.platforms_updated_error'));
    }

    function delete (Request $request, Platform $platform){

        $existe = Platform::where('id', '=', $platform->id)->exists();

        if($existe && $platform != null){
            $platform->delete();
            return redirect()->route('platforms.index')->with('success', Lang::get('alerts.platforms_deleted_success'));
        }

        return redirect()->route('platforms.index')->with('danger', Lang::get('alerts.platforms_deleted_error'));
    }

    function validatePlatform (Request $request){

        return Validator::make($request -> all(),[
            'platformName'=>['required', 'string', 'max:225', 'min:2'],
        ]);
    }
}
