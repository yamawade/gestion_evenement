<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Gestion Evenement</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <button type="button" class="btn btn-success my-2 my-sm-0 offset-8" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Se Connecter
        </button>
        <!-- <a href="" class="btn btn-success my-2 my-sm-0 offset-8">Se Connecter</a> -->
        <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
    </nav>
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
                <a href="/ConnexionClient" class="btn btn-success">Faire réservation</a>
            </div>
          </div>
      @endforeach
    </ul>
  </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3>Vous Etes?</h3>
                <br>
                <a href="/ConnexionClient" class="btn btn-secondary offset-1">Client</a>
                <a href="/connexionAssociation" class="btn btn-warning offset-2">Association</a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>