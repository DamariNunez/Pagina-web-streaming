<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Lang;
use App\Language;


class LanguageController extends Controller
{
    const PAGINATE_SIZE = 10;

    function index (Request $request){
        $languages = null;
        $languageName = null;
        if($request->has('languageName')){
             $languageName = $request->languageName;
             $languages = Language::where('name', 'like','%'.$languageName.'%')->paginate(self::PAGINATE_SIZE);
        }else{
            $languages = Language::paginate(self::PAGINATE_SIZE);
        }

        return view('languages.index',['languages' => $languages, 'languageName' => $languageName]);
    }

    function create (){
        return view('languages.create');
    }

    function store (Request $request){

        $this->validateLanguage($request)->validate();
        $existe = Language::where('name', '=', $request->languageName)->where('iso_code', '=', $request->languageIsoCode)->exists();
        echo $existe;

        if(!$existe && $request != null){
            $new_language = new Language;
            $new_language->name = $request->languageName;
            $new_language->iso_code = $request->languageIsoCode;
            $new_language->save();
            return redirect()->route('languages.index')->with('success', Lang::get('alerts.languages_created_success'));
        }

        return redirect()->route('languages.index')->with('danger', Lang::get('alerts.languages_created_error'));
    }

    function edit (Language $language){
        return view('languages.create', ['language' => $language]);
    }

    function update (Request $request, Language $language){

        $this->validateLanguage($request)->validate();
        $existe = Language::where('id', '=', $language->id)->exists();

        if($existe && $request != null && $language != null){
            $language->name = $request->languageName;
            $language->iso_code = $request->languageIsoCode;
            $language->save();
            return redirect()->route('languages.index')->with('success', Lang::get('alerts.languages_updated_success'));
        }

        return redirect()->route('languages.index')->with('danger',Lang::get('alerts.languages_updated_error'));
    }

    function delete (Request $request, Language $language){

        $existe = Language::where('id', '=', $language->id)->exists();

        if($existe && $language != null){
            $language->delete();
            return redirect()->route('languages.index')->with('success', Lang::get('alerts.languages_deleted_success'));
        }

        return redirect()->route('languages.index')->with('danger', Lang::get('alerts.languages_deleted_error'));
    }

    function validateLanguage (Request $request){

        return Validator::make($request -> all(),[
            'languageName'=>['required', 'string', 'max:225', 'min:2'],
            'languageIsoCode'=>['required', 'string', 'max:225', 'min:2'],
        ]);
    }
}
