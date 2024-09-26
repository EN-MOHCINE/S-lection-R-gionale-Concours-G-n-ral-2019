<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>gestion des utilisateurs </title>
</head>

<body>
<div class=" fs-1 text-white text-center bg-secondary">
        Booking System  
        <a href="{{url('/')}}" class="btn btn-light ms-5"> logout</a> 
</div>
    <div class="my-4">
        <p class="text-secondary fs-3 text-center ">
            Accommodation User menu
        </p>
        <div class="row">
            <a href="{{url('/')}}" class="btn col-sm-2 col-3 btn-warning p-4"> Manage Accommodations </a> 
            <br/>
            <a href="{{url('/')}}" class="btn col-sm-2 col-3 btn-warning p-4 mx-5"> Mange Invocis </a> 
        </div>
    </div>
</body>
        
