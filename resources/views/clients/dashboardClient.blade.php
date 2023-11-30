<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
  <h1>Salut {{auth()->user()->prenom}} {{auth()->user()->nom}}</h1>

  <a href="#" onclick="document.getElementById('form-logout').submit()">
    <form action="/deconnexionUser" method="post" id="form-logout">@csrf</form>
    Se Déconnecter
  </a>
  <div class="container">
    <ul class="d-flex flex-wrap justify-content-between">
      @foreach($evenements as $evenement)
          <div class="card mt-4" style="width: 20rem;">
            <img src="{{ url('/images/'.$evenement->image) }}" class="card-img-top" alt="" width="4²0">
            <div class="card-body">
              <h5 class="card-title">{{$evenement->libelle}}</h5>
                <p class="card-text">{{$evenement->description}}</p>
                <p class="card-text">{{$evenement->lieu}}</p>
                <p class="card-text">{{$evenement->date_limite_inscription}}</p>
                <p class="card-text">{{$evenement->date_evenement}}</p>
                <a href="/reservation/{{$evenement->id}}" class="btn btn-success">Faire réservation</a>
            </div>
          </div>
      @endforeach
    </ul>
  </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>