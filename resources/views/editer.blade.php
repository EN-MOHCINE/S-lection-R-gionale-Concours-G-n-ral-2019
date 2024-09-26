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
        Booking System <a href="{{route('out')}}" class="btn btn-dark ms-5"> logout</a>   
    </div>
    <h1 class="text-secondary text-center">Gestion des utilisateurs {{"editer"}}</h1>

    <div class="m-3">
        <form class="form" action="{{route('update1',$user->Email)}}" method="post">
            @method('PUT')
            @csrf
            <div class="row">
            <div class="col">
                <label for="email" class="form-label text-secondary" >Email : </label>
                <input type="email" name="email" id="email" 
                        placeholder='Enter your adress email' disabled class="form-control" value="{{$user->Email}}">

                <label for="gender" class="form-label text-secondary">Gender :</label>
                <select name="gender" id="gender" class="form-control">
                    <option value="{{$user->Gender}}" selected>{{$user->Gender}}</option>
                    <option value="{{$user->Gender === "Male" ? "Female" : "Male"}}">{{$user->Gender === "Male" ? "Female" : "Male"}}</option>
                </select>

                <label for="role" class="form-label text-secondary">Role :</label>
                <select name="roles" class="form-control">
                    <option value={{$user->RoleID}}>
                        {{ DB::table('roles')->select('RoleName')->where('RoleID', $user->RoleID)->value('RoleName')}}
                    </option>
                    <?php $roles=DB::table("roles")->select('RoleName','RoleID')->get() ?>
                    @foreach($roles as $role)
                    <option value="{{$role->RoleID}}">{{$role->RoleName}}</option>
                    @endforeach

                </select>
                <label for="dateBirth" class="form-label text-secondary" >Date Of Birth : </label>
                <input type="date" name="dateBith" id="dateBirth" placeholder='Enter your dateBith' class="form-control" value="{{$user->DateOfBirth}}">

                <label for="mobile" class="form-label text-secondary" >Mobile : </label>
                <input type="text" name="mobile" id="mobile" placeholder='Enter your mobile' class="form-control" value="{{$user->MobileNo}}">
                
            </div>
            <div class="col">
                <h5 class=" text-center text-secondary fw-bold my-4">Change password</h5>
                <p class="text-secondary text-center">Leave these fields blank if you do not want to change the password</p>
                <label for="password" class="form-label text-secondary" >Password : </label>
                <input type="password" name="password" id="password" placeholder='Enter your password' class="form-control" >
                @if ($errors->has('password'))
                    <div class="text-danger">{{ $errors->first('password') }}</div>
                @endif


                <label for="passwordAg" class="form-label text-secondary" >Password Again : </label>
                <input type="password" name="passwordAg" id="passwordAg" placeholder='Enter your password Again' class="form-control" >
                @if ($errors->has('passwordAg'))
                <div class="text-danger">{{ $errors->first('password') }}</div>
            @endif
            </div>
            </div> 
            <center class="my-5">
                <button class="btn btn-secondary me-3" >Save</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </center>
        </form>

    </div>

    

    
</body>
</html>