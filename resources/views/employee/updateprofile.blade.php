<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>

    <!-- Custom Css -->
    <link rel="stylesheet" href="/client/style2.css">
    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>
<body>
    <!-- Navbar top -->
    <div class="navbar-top">
        <div class="title">
            <h1>Profile</h1>
        </div>

        <!-- Navbar -->
        <ul>
            <li>
                <a href="/signout">
                    <i class="fa fa-sign-out-alt fa-2x"></i>
                </a>
            </li>
        </ul>
        <!-- End -->
    </div>
    <!-- End -->

    <!-- Sidenav -->
    <div class="sidenav">
        <div class="profile">
            <img src="https://imdezcode.files.wordpress.com/2020/02/imdezcode-logo.png" alt="" width="100" height="100">

            <div class="name">
                {{$employee->name}}
            </div>
            <div class="job">
                Web Developer
            </div>
        </div>

        <div class="sidenav-url">
            <div class="url">
                
                <a href="/profile/{{Session::get('employee')->id}}" >Profile</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href="/entreprise/{{$employee->entreprise->id}}" >{{$employee->entreprise->name}}</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href="/Editprofile/{{Session::get('employee')->id}}" class="active">Modifier Mes  informations</a>
                <hr align="center">
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- Main -->
    <div class="main">
        <h2>IDENTITY</h2>
        <div class="card">
            <div class="card-body">
                <i class="fa fa-pen fa-xs edit"></i>
                <div class="form-bg">

                    <h3> Validater l'invitation </h3>
                    @if (count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
            
                    </div>
                    
                     @endif
            
                    @if (Session::has('status'))
                    <div class="alert alert-danger">
                        {{Session::get('status')}}					
                    </div>
                        
                    @endif
                    <form class="form" action="{{url('/updateprofile')}}" method="POST">
                        {{ csrf_field() }}
                        <input placeholder="Nom" value={{$employee->name}} maxlength="50" name="name" type="text" readonly>
                        <input placeholder="E-mail" value={{$employee->email}} name="email" type="text" readonly>
                        <input placeholder="Mot de passe" type="password" name="password">
                        <input placeholder="Confirmez votre Mot de passe"  type="password" name="confirm_password">
                        <input placeholder="Numéro de telephone" value={{$employee->telephone}} name="telephone" type="text">
                        <input placeholder="Adresse" maxlength="50" value={{$employee->adresse}} name="adresse" type="text">
                        <input placeholder="Date de naissence" value={{$employee->date_de_naissance}} maxlength="50" name="date_de_naissance" type="date">
                        <button  type="submit" >Update</button>
                    </form>
                </div>
                
            </div>
            
        </div>
    </div>
    <!-- End -->
</body>
</html>