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
        Booking System  <a href="{{route('out')}}" class="btn btn-dark ms-5"> logout</a>  
    </div>
    <h1 class="text-secondary text-center">Gestion des utilisateurs</h1>
    @if(Session::has('update'))    
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong></strong>{{Session::get('update')}} 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="{{Session::forget("update");}}"> </button>
    </div>
    
    @endif

    <div class="m-3">
                <p class="text-secondary fs-4">Sort and filter</p>
                <form action="{{route('sort')}}" method="get">
                    @csrf
                    Role : 
                    <select name="sortRole" onchange="this.form.submit()">
                        <option value="">choisi role </option>
                        <option value="Admnistrator" >Admnistrator</option>
                        <option value="Client">Client </option>
                        <option value="Manager">Manager</option>
                    </select>
                    <br/>
                    sort by     
                        <select name="sortcol" onchange="this.form.submit()">
                            <option value="FullName">Full Name</option>
                            <option value="RoleName">Role </option>
                            <option value="Email">Email</option>
                        </select>
                        <a href="{{route('admin')}}" class="btn btn-dark " >Refresh</a> 
                </form>
                <button class="btn btn-dark">Export (csv)</button><br/>
                <div class="fw-bold fs-3">
                    nombre d'utulisateurs :
                    <span class="badge  text-dark"> {{count($utilisateurs)}}</span>
                </div>
        <br/>
        <table class="table table-striped w-50  shadow m-4 p-1 text-center">
            <tr>
                <td>Full Name </td>
                <td>Role</td>
                <td>Email</td>
                <td>Editer</td>
            </tr>
            @foreach ($utilisateurs as $utilisateur)
                <tr>
                    <td>{{$utilisateur->FullName}}</td>
                    <td>{{$utilisateur->RoleName}}</td>
                    <td>{{$utilisateur->Email}}</td>
                    <td><a href="{{route('editer',$utilisateur->Email,'/edit')}}" class="btn btn-warning">editer</a></td>
                </tr>
            @endforeach
        </table>
    </div>

    

    
</body>
</html>