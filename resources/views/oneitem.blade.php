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
        <h2 class="mb-5">Preces dati</h2>
        <h5 class="mb-5">Preces nosaukums: {{$item->title}}</h5>
        <h5 class="mb-5">Vienību skaits: {{$item->count}}</h5>
        <h5 class="mb-5">Cena par vienu vienību: {{$item->price}}</h5>
        @if (Auth::user()['role']==="admin")
            <a href="/edit/{{ $item->id }}" class="btn btn-primary">Labot</a>
            <a href="/delete/{{ $item->id }}" class="btn btn-danger">Dzēst</a>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>