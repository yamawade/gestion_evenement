<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="container offset-2">
    <div class="card mb-4 offset-1" style="width:80%;">
        <img src="{{ asset('/images/'.$evenement->image) }}" class="img-fluid rounded-start" alt="" style="height: 500px; width: 100%;">
        <div class="row">
            <div class="card-body">
                <h5 class="card-title">Nom du Evenement: {{$evenement->nom}}</h5>
                <p class="card-text">Date Limite: {{$evenement->date_limite_inscription}}</p>
                <p class="card-text">Description: {{ $evenement->description}}</p>
                <p class="card-text">Lieu: {{ $evenement->lieu}}</p>
                <p class="card-text">Est_cloturer_ou_pas: {{ $evenement->est_cloturer_ou_pas}}</p>
                <p class="card-text">Date Evenement: {{ $evenement->date_evenement}}</p>
                <a href="" class="btn btn-success">Modifier</a>
                <a href="" class="btn btn-danger">supprimer</a>
                <a href="" class="btn btn-info">Retour</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>