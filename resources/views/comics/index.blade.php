<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css\app.css')}}">

    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="mt-3 d-flex justify-content-between align-items-center">
            <h1>ELENCO FUMETTI</h1>
            <form method="GET">
                <div class="input-group" >
                    <button class="btn btn-primary" type="submit">Cerca</button>
                    <input type="text" class="form-control boxsquare" placeholder="Cerca fumetto..." name="search" value="{{$search}}"/>
                </div>
            </form>
            <a href="{{ route('comics.create')}}"><button class="btn btn-primary" type="submit" value="Inserisci nuovo fumetto">Inserisci nuovo fumetto</button></a>
        </div>
        <hr>

        @forelse ($comics as $comic)
        <div class="d-flex justify-content-between align-items-center mt-3 mb-3">
               
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('comics.show', $comic->id)}}">
                        <img class="icon-Img me-3" src="{{$comic->img}}" alt="{{$comic->title}}">
                    </a>
                    <h5><a href="{{ route('comics.show', $comic->id)}}">{{$comic->title}}</a></h5>
                </div>
                <h6>Prezzo: {{$comic->price}} £</h6>
        </div>
        <hr>
        @empty
            {{-- risultato ricerca nullo USA EMPTY --}}
            <div class="text-center">
                <img src="{{ asset('img/images.jpg') }}" alt="images">
                <h3>Spiacente!</h3> <h5>nessun risultato per la tua ricerca </h5><h2> <i>"{{$search}}"</i></h2><hr>                
        </div>
        
        @endforelse
    </div>
</body>
</html>