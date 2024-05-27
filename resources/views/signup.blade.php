<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Item Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5 py-5">
        <h2 class="text-center mb-5">Jauns profils</h2>
        <form method="POST" action="/createuser">
            @csrf
            @if (isset($error))
            <p class="text-danger">{{$error}}</p>
            @endif
            <div>
                <label class="form-label">Vārds: </label>
                <input class="form-control mb-2" name="name" type="text" />
            </div>
            <div>
                <label class="form-label">E-pasts: </label>
                <input class="form-control mb-2" name="email" type="text" />
            </div>
            <div>
                <label class="form-label">Parole: </label>
                <input class="form-control mb-2" name="password" type="password" />
            </div>
            <div>
                <label class="form-label">Parole atkārtoti: </label>
                <input class="form-control mb-2" name="confirm_password" type="password" />
            </div>
            <div>
                <label class="form-label">Loma: </label>
                <input checked id="admin" name="role" type="radio" value="client"/>
                <label for="admin">Klients</label>
                <input id="admin" name="role" type="radio" value="admin"/>
                <label class="mb-3" for="admin">Administrators</label>
            </div>
            <input type="submit" value="Izveidot profilu" class="mb-5 btn btn-primary"/>
        </form>
        <p class="text-center">Vai jau ir izveidots profils?</p>
        <div class="text-center">
            <a href="/">Pierakstīties</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>