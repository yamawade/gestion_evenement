<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1>COUCOU, {{ auth()->guard('association')->user()->nom_association}} 
    </h1>

    <a href="#" onclick="document.getElementById('form-logout').submit()">
        <form action="/deconnexionAssociation" method="post" id="form-logout">@csrf</form>
        Se Déconnecter
    </a>
    <ul>
        @foreach($errors->all() as $error)
        <li class="alert alert-danger">{{$error}}</li>
        @endforeach
    </ul>
    <div class="card offset-3 mt-4" style="width: 600px;">
        <form action="/insererEvenement" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-header text-center bg-primary text-white">
               AJOUT EVENEMENT
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="libelleEvenemnt" class="form-label mt-4">Libelle</label>
                    <input type="text" class="form-control" id="libelleEvenemnt" name="libelle">
                </div>
                <div class="form-group">
                    <label for="dateLimite" class="form-label mt-4">Date Limite Inscription</label>
                    <input type="date" class="form-control" id="dateLimite" name="date_limite_inscription">
                </div>
                <div class="form-group">
                    <label for="description" class="form-label mt-4">Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Description" ></textarea>
                </div>
                <div class="form-group">
                    <label for="image" class="form-label mt-4">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="form-group">
                    <label for="lieuEvenement" class="form-label mt-4">Lieu</label>
                    <input type="text" class="form-control" id="lieuEvenement" name="lieu">    
                </div>
                <div class="form-group">
                    <label for="password" class="form-label mt-4">Est_cloturer_ou_pas</label>
                    <select name="est_cloturer_ou_pas" id="" class="form-control">
                        <option value="">Selectionnez</option>
                        <option value="1">Cloturer</option>
                        <option value="0">Pas_Cloturer</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dateEvenement" class="form-label mt-4">Date Evenement</label>
                    <input type="date" class="form-control" id="dateEvenement" name="date_evenement">
                </div>
                <input type="hidden" name="association_id" value="{{auth()->guard('association')->user()->id}}">
                <button type="submit" class="btn btn-primary btn-lg offset-5 mt-4 text-white">Soumettre</button>
            </div>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>