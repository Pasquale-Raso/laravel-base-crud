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
    
    <div class="container ">
        <h1 class="mt-3">{{$comic->title}}</h1>
        <div class="mt-3 mb-3 d-flex justify-content-between ">
            <img class="img-detail" src="{{$comic->img}}" alt="{{$comic->title}}">
            <div class="ms-5 mt-3">
                <p>{{$comic->description}}</p>
                <div><h5>Prezzo: {{$comic->price}} $</h5></div>
                {{-- creazione campo per le date con carbon --}}
                <div class="text-end" >
                <p> <b>Creato il:</b> {{$comic->getFormattedDate('created_at')}} </p>
                </div>
                <div class="text-end" >
                <p> <b>Ultima modifica:</b> {{$comic->getFormattedDate('updated_at')}} </p>
                </div>
                
                {{-- -----------------------------------------}}
                
            </div>
        </div>
        <hr>
        <div class="d-flex justify-content-between mb-4 mt-4">
            <a href="{{ route('comics.edit', $comic->id)}}"><button class="btn btn-primary" type="submit" value="Modifica">Modifica</button></a>
        
            {{-- non si può usare un link che va in get ma un form che va in post  --}}
            <form method="POST" action="{{route('comics.destroy', $comic->id)}}" id="delete-form">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit" value="Elimina">Elimina</button>
            </form>

            <a href="{{ route('comics.index')}}"><button class="btn btn-primary" type="submit" value="Torna alla lista">Torna alla lista</button></a>
        </div>
    </div>
       <script>
        // per creare una modale all'evento della cancellazione che confermi se vuoi eliminare o meno un fumetto

        // cosa si deve fare:

        // intercettare un evento (intercettare il submit del form e mettere un id al form stesso id="delete-form")

        // indivividuare l'elemento che fa scattare l'evento (inserici qui sotto const deleteForm = document.getElementById('delete-form');)

        // bloccare il comportamento naturale

        // chiedere all'utente

        // agire di conseguenza

        const deleteFormElement = document.getElementById('delete-form');

        deleteFormElement.addEventListener('submit', function(event){
            event.preventDefault(); // bloccare il comportamento naturale
            const confirm = window.confirm('sei sicuro di voler eliminare il fumetto {{ $comic->title }}?');
            if (confirm) this.submit(); 
        });
    </script>
    
</body>
</html>