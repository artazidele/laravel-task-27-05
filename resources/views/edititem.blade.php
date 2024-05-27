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
    <nav class="navbar px-5 py-3 mb-3 bg-secondary text-white">
        <div class="navbar navbar-left">
            @if (Auth::user()['role']==="admin")
                <div class="nav-item px-5">
                    <a class="nav-link" href="/newitem">Jauna prece</a>
                </div>
            @endif
            <div class="nav-item px-5">
                <a class="nav-link" href="/table">Visas preces</a>
            </div>
        </div>
        <div class="nav-item">
            <a class="nav-link" href="/logout">Iziet</a>
        </div>
    </nav>
    <div class="container">
        <h4 class="mb-5">Labot preces datus</h4>
        @if (isset($error))
            <p class="text-danger">{{$error}}</p>
        @endif
        <form method="POST" action="/edit/{{$item->id}}">
            @csrf
            <div>
                <label class="form-label">Nosaukums: </label>
                <input class="form-control mb-2" name="title" type="text" value="{{$item->title}}" />
            </div>
            <div>
                <label class="form-label">Skaits: </label>
                <input class="form-control mb-2" name="count" type="number" value="{{$item->count}}" />
            </div>
            <div>
                <label class="form-label">Cena: </label>
                <input class="form-control mb-4" name="price" type="number" step=".01" value="{{$item->price}}" />
            </div>
            <input class="btn btn-primary" type="submit" value="Saglabāt izmaiņas" />
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>