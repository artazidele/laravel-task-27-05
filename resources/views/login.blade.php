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
        <h3 class="mb-5 text-center">Lai apskatītu preces, lūdzu, pierakstieties sistēmā!</h3>
        <div>
        <form method="GET" action="/loginuser">
            @csrf
            @if ($errors->any())
            <p class="text-danger">E-pasts vai parole nav ievadīti pareizi.</p>
            @endif
            <div>
                <label class="form-label">E-pasts: </label>
                <input name="email" class="form-control mb-2" type="text" />
            </div>
            <div>
                <label class="form-label">Parole: </label>
                <input name="password" class="form-control mb-4" type="password" />
            </div>
            <input class="btn btn-primary text-center" type="submit" value="Pierakstīties" />
        </form>
        <p class="text-center">Vēl nav izveidots profils?</p>
        <div class="text-center">
            <a href="/signup">Izveidot profilu</a>
        </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>