@extends('layouts.app')

@section('content')

<div>
    
    <div class=" fs-1 text-white text-center bg-secondary">
        Booking System      </div>
    <div class="my-4">
        <p class="text-secondary fs-3 text-center ">Fomulaire d'authentification</p>
            <p class='text-secondary fs-5 text-center '>Veuiller vous connecter au systeme en 
                utilisant votre adresse email et votre mot de passe </p>
                @if(isset($title))
                    <x-testauth  :title="$title"/> 
                @endif


                <form class="w-25 container shadow card p-3 " action="{{route('test')}}" method="POST">
                    @csrf
                        <label class="from-label" for="email">Email</label>
                        <input class="form-control" placeholder="entre your email" value="{{old('email')}}" type="text" id="email" name="email"/>
                        @error('email')
                            <div class="form-error text-danger ">{{$message}}</div>
                        @enderror

                        <label class="from-label" for="password">Password</label>
                        <input class="form-control" placeholder="entre your password" value="{{old('password')}}" type="password" id="password" name="password"/>
                        @error('password')
                            <div class="form-error text-danger">{{$message}}</div>
                        @enderror
                        
                        <div class="d-flex flex-row">   
                            <button class="btn btn-warning w-10 m-4" onclick={{  Session::put('auth',1)}} > submit</button>
                            <a href="{{url('/')}}" class="btn btn-secondary w-10 m-4" onclick={{  Session::forget('auth')}} > cancel</a>
                        </div>
                        @if (isset($email))
                            <div class="alert alert-danger">{{$email}}</div>
                        @endif
                        @if (isset($password))
                            <div class="alert alert-danger">{{$password}}</div>
                        @endif
                </form>
    </div>
    <div class=" fs-3 text-white text-center my-5    bg-secondary">
        Sélection Régionale  Concours	Général	2019 
    </div>
</div>
    
@endsection