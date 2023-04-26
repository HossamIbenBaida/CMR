<!DOCTYPE html>
<html>
<head>
        <title>Validater l'invitation</title>
        <link rel="stylesheet" type="text/css" href="/client/style.css">

        <script src="/client/doc.js"></script>
 </head>
<body>
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
        <form class="form" action="{{url('/valider_invitation')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="admin_id" value="{{$admin_id}}">
            <input type="hidden" name="entreprise_id" value="{{$entreprise_id}}">
            <input placeholder="Nom" value="{{$nom}}" maxlength="50" name="name" type="text" readonly>
            <input placeholder="E-mail" value="{{$email}}" name="email" type="text" readonly>
            <input placeholder="Mot de passe"  type="password" name="password">
            <input placeholder="Confirmez votre Mot de passe"  type="password" name="confirm_password">
            <input placeholder="Numéro de telephone" name="telephone" type="text">
            <input placeholder="Adresse" maxlength="50"  name="adresse" type="text">
            <input placeholder="Date de naissence" maxlength="50" name="date_de_naissance" type="date">
            <button  type="submit" >Valider</button>
        </form>
    </div>
</body>
