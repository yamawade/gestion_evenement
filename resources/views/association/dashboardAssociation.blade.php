<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>COUCOU, {{ auth()->guard('association')->user()->nom_association}} 
    </h1>

    <a href="#" onclick="document.getElementById('form-logout').submit()">
    <form action="/deconnexionAssociation" method="post" id="form-logout">@csrf</form>
    Se Déconnecter
</a>
</body>
</html>