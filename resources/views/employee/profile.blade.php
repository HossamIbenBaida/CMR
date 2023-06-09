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
                
                <a href="/profile/{{Session::get('employee')->id}}" class="active">Profile</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href="/entreprise/{{$employee->entreprise->id}}" class="">{{$employee->entreprise->name}}</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href="/Editprofile/{{Session::get('employee')->id}}">Modifier Mes  informations</a>
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
                <table>
                    <tbody>
                        <tr>
                            <td>Nom</td>
                            <td>:</td>
                            <td>{{$employee->name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>{{$employee->email}}</td>
                        </tr>
                        <tr>
                            <td>Adresse</td>
                            <td>:</td>
                            <td>{{$employee->adresse}}</td>
                        </tr>
                        <tr>
                            <td>date de naissanace </td>
                            <td>:</td>
                            <td>{{$employee->date_de_naissance}}</td>
                        </tr>
                        <tr>
                            <td>Entreprise</td>
                            <td>:</td>
                            <td>{{$employee->entreprise->name}}</td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
            
        </div>
    </div>
    <!-- End -->
</body>
</html>