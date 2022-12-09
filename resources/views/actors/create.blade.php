@extends('layouts.main')

@section('title')
    @isset($actor)
        {{__('strings.edit_title_actor')}}
    @else
        {{__('strings.create_title_actor')}} 
    @endisset       
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row">
                        @isset($actor)
                        <h1>{{__('strings.edit_title_actor')}} {{$actor->name}}<h1>
                        @else
                        <h1>{{__('strings.create_title_actor')}} <h1>
                        @endisset
                    </div>
                </div>
                <div class="card-body">
                    @isset($actor)
                    <form name="edit_actor" action="{{route('actors.update', $actor)}}" method="POST">
                        @csrf
                    @else
                    <form name="create_actor" action="{{route('actors.store')}}" method="POST">
                        @csrf   
                    @endisset
                        <div class="mb-3">
                            <label for="actorName" class="form-label">{{__('strings.name_placeholder_actor')}}</label>
                            <input id="actorName" name="actorName" type="text" placeholder="{{__('strings.name_placeholder_actor')}}" class="form-control" required 
                            @isset($actor) value="{{ old('actorName', $actor->name)}}" @else value="{{  old('actorName')}}" @endisset />
                            <label for="actorLastName" class="form-label">{{__('strings.last_name_placeholder_actor')}}</label>
                            <input id="actorLastName" name="actorLastName" type="text" placeholder="{{__('strings.last_name_placeholder_actor')}}" class="form-control" required 
                            @isset($actor) value="{{ old('actorLastName', $actor->lastName)}}" @else value="{{  old('actorLastName')}}" @endisset />
                            <label for="actorDateOfBirth" class="form-label">{{__('strings.date_of_birth_placeholder_actor')}}</label>
                            <input id="actorDateOfBirth" name="actorDateOfBirth" type="date" max="<?=date('Y-m-d');?>" placeholder="{{__('strings.date_of_birth_placeholder_actor')}}" class="form-control" required 
                            @isset($actor) value="{{ old('actorDateOfBirth', $actor->dateOfBirth)}}" @else value="{{  old('actorDateOfBirth')}}" @endisset />
                            <label for="actorNacionality" class="form-label">{{__('strings.nacionality_placeholder_actor')}}</label>
                            <input id="actorNacionality" name="actorNacionality" type="text" placeholder="{{__('strings.nacionality_placeholder_actor')}}" class="form-control" required 
                            @isset($actor) value="{{ old('actorNacionality', $actor->nacionality)}}" @else value="{{  old('actorNacionality')}}" @endisset />
                        </div>
                        <input type="submit" value="@isset($actor) {{__('strings.save_btn')}} @else {{__('strings.create_btn')}} @endisset" class="btn btn-primary" name="createBtn" />   
                        <a class="btn-cancel btn btn-secondary" href="/actors">Cancelar</a>
                    </form>      
                </div>
            </div>
        </div>    
    </div>
@endsection