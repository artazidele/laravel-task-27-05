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
        <h5>Labdien, {{Auth::user()['name']}}!</h5>
        @if (Auth::user()['role']!=="admin")
        <p>Šajā mājas lapā var apskatīt preces un to daudzumu un cenu.</p>
        @else
        <p>Šajā mājas lapā var apskatīt preces un to daudzumu un cenu, kā arī pievienot jaunu preci, labot un dzēst preces.</p>
        @endif
        <div>
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Preces nosaukums</th>
                        <th class="text-center">Vienību skaits</th>
                        <th class="text-center">Cena par vienu vienību</th>
                        <th class="text-center">Apskatīt</th>
                        @if (Auth::user()['role']==="admin") 
                        <th class="text-center">Labot</th>
                        <th class="text-center">Dzēst</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @if (count($items) > 0)
                        @foreach ($items as $item)
                            <tr>
                                <th class="text-center">{{ $item->id }}</th>
                                <th>{{ $item->title }}</th>
                                <th>{{ $item->count }}</th>
                                <th>{{ $item->price }}</th>
                                <th class="text-center"><a href="/view/{{ $item->id }}" class="btn btn-success">Apskatīt</a></th>
                                @if (Auth::user()['role']==="admin")
                                <th class="text-center"><a href="/edit/{{ $item->id }}" class="btn btn-primary">Labot</a></th>
                                <th class="text-center"><a href="/delete/{{ $item->id }}" class="btn btn-danger">Dzēst</a></th>
                                @endif
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>