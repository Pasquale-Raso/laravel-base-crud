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

  {{-- VALIDAZIONE fatta su updadate nel controller --}}
  @if ($errors->any())
    <div class="mt-3 p-0 pt-2 alert alert-danger container-form">
      <ul>
        @foreach ($errors->all() as $error) 
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div> 
  @endif
{{-----------------}}

    <form class=" container-form display-6 mt-5 " action="{{route ('comics.update', $comic->id)}}" method="POST">
      @method('PATCH')
      @csrf
      <div class="mb-4 d-flex align-items-center justify-content-center justify-content-between">
      <label class="me-5" for="title"> titolo</label>
      <input class="form-control @error("title") is-invalid @enderror" type="text" name="title" id="title" value="{{$comic->title}}">
      @error('title')
         <div class="invalid-feedback">
          <h6 class="text-end">{{ $message }}</h6>
        </div> 
      @enderror
      </div>

      <div class="mb-4 d-flex align-items-center justify-content-center justify-content-between">
        <label class="me-5" for="description">descrizione</label>
      <textarea class="form-control @error("description") is-invalid @enderror" name="description" id="description">{{$comic->description}}</textarea>
      @error('description')
         <div class="invalid-feedback">
          <h6 class="text-end">{{ $message }}</h6>
        </div> 
      @enderror
      </div>
      
      <div class=" mb-4 d-flex align-items-center justify-content-center justify-content-between">
        <label class="me-5" for="img"> immagine</label>
      <input class="form-control @error("img") is-invalid @enderror" type="text" name="img" id="img" value="{{$comic->img}}">
      @error('img')
         <div class="invalid-feedback">
          <h6 class="text-end">{{ $message }}</h6>
        </div> 
      @enderror
      </div>

      <div class="mb-4 d-flex align-items-center justify-content-center justify-content-between">
        <label class="me-5" for="price">prezzo</label>
      <input class="form-control @error("price") is-invalid @enderror" type="text" name="price" id="price" value="{{$comic->price}}">
      @error('price')
         <div class="invalid-feedback">
          <h6 class="text-end">{{ $message }}</h6>
        </div> 
      @enderror
      </div>
      <hr>
      <div class="d-flex align-items-center justify-content-center mb-5">
        <button class="btn btn-success" type="submit" value="Invia">Invia</button>
      </div>
    </form>
      <hr>
    <div class="container-form d-flex justify-content-center mt-5">
      <a href="{{ route('comics.index')}}"><button class="btn btn-primary" type="submit" value="Torna alla lista">Torna alla lista</button></a>
    </div>
</body>
</html>

