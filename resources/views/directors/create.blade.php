@extends('layouts.main')

@section('title')
    @isset($director)
        {{__('strings.edit_title_director')}}
    @else
        {{__('strings.create_title_director')}} 
    @endisset       
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row">
                        @isset($director)
                        <h1>{{__('strings.edit_title_director')}} {{$director->name}}<h1>
                        @else
                        <h1>{{__('strings.create_title_director')}} <h1>
                        @endisset
                    </div>
                </div>
                <div class="card-body">
                    @isset($director)
                    <form name="edit_director" action="{{route('directors.update', $director)}}" method="POST">
                        @csrf
                    @else
                    <form name="create_director" action="{{route('directors.store')}}" method="POST">
                        @csrf   
                    @endisset
                        <div class="mb-3">
                            <label for="directorName" class="form-label">{{__('strings.name_placeholder_director')}}</label>
                            <input id="directorName" name="directorName" type="text" placeholder="{{__('strings.name_placeholder_director')}}" class="form-control" required 
                            @isset($director) value="{{ old('directorName', $director->name)}}" @else value="{{  old('directorName')}}" @endisset />
                            <label for="directorLastName" class="form-label">{{__('strings.last_name_placeholder_director')}}</label>
                            <input id="directorLastName" name="directorLastName" type="text" placeholder="{{__('strings.last_name_placeholder_director')}}" class="form-control" required 
                            @isset($director) value="{{ old('directorLastName', $director->lastName)}}" @else value="{{  old('directorLastName')}}" @endisset />
                            <label for="directorDateOfBirth" class="form-label">{{__('strings.date_of_birth_placeholder_director')}}</label>
                            <input id="directorDateOfBirth" name="directorDateOfBirth" type="date" max="<?=date('Y-m-d');?>" placeholder="{{__('strings.date_of_birth_placeholder_director')}}" class="form-control" required 
                            @isset($director) value="{{ old('directorDateOfBirth', $director->dateOfBirth)}}" @else value="{{  old('directorDateOfBirth')}}" @endisset />
                            <label for="directorNacionality" class="form-label">{{__('strings.nacionality_placeholder_director')}}</label>
                            <input id="directorNacionality" name="directorNacionality" type="text" placeholder="{{__('strings.nacionality_placeholder_director')}}" class="form-control" required 
                            @isset($director) value="{{ old('directorNacionality', $director->nacionality)}}" @else value="{{  old('directorNacionality')}}" @endisset />
                        </div>
                        <input type="submit" value="@isset($director) {{__('strings.save_btn')}} @else {{__('strings.create_btn')}} @endisset" class="btn btn-primary" name="createBtn" />  
                        <a class="btn-cancel btn btn-secondary" href="/directors">Cancelar</a> 
                    </form>      
                </div>
            </div>
        </div>    
    </div>
@endsection