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

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
             <a href="/dashboardAssociation" class="btn btn-primary">Ajout Evenement</a>
                <h2 class="offset-4">LISTES DES EVENEMENTS</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>LIBELLE</th>
                        <th>DATE LIMITE</th>
                        <th>DESCRIPTION</th>
                        <th>IMAGE</th>
                        <th>LIEU</th>
                        <th>DATE EVENEMENT</th>
                        <th>ACTION</th>
                    </tr>
                    @foreach($evenements as $evenement)
                        <tr>
                            <td>{{$evenement->libelle}}</td>
                            <td>{{$evenement->date_limite_inscription}}</td>
                            <td>{{$evenement->description}}</td>
                            <td>{{$evenement->image}}</td>
                            <td>{{$evenement->lieu}}</td>
                            <td>{{$evenement->date_evenement}}</td>
                            <td>
                                <!-- <a href="" class="btn btn-warning btn-sm">Modifier</a>
                                <a href="" class="btn btn-danger btn-sm">Supprimer</a> -->
                                <a href="/detailEvenement/{{$evenement->id}}" class="btn btn-secondary">Voir Détails</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>