<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>GES_EVENEMENT</title>
</head>
<body>
    <div class="card offset-3 mt-4 " style="width: 600px;">
        <form action="/loginClient" method="post">
            @csrf
            <div class="card-header text-center bg-primary text-white">
               CONNEXION
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="emailUser" class="form-label mt-4">Email</label>
                    <input type="text" class="form-control" id="emailUser" name="email">    
                </div>
                <div class="form-group">
                    <label for="password" class="form-label mt-4">Mot De Passe</label>
                    <input type="password" class="form-control" id="password" name="password" >
                </div>
                <button type="submit" class="btn btn-primary btn-lg offset-5 mt-4 text-white">Soumettre</button> 
                <p>Vous n'avez pas encore de compte? <a href="/inscription">Inscrivez-vous</a></p>
            </div>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>