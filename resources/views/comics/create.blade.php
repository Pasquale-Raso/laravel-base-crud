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
  
{{-- VALIDAZIONE fatta su store nel controller --}}
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
  <form class="container-form display-6 mt-5 " action="{{route('comics.store')}}" method="POST">
    @csrf
    <div class=" mb-4 d-flex align-items-center justify-content-center justify-content-between">
      <label class="me-5" for="title">Titolo</label>
      <input class="form-control @error("title") is-invalid @enderror" type="text" name="title" id="title" value="{{old('title',$comic->title)}}">

      {{-- per far uscire sotto il box la scritta di errore {{$message}} lo da in automatico laravel --}}
      @error('title')
         <div class="invalid-feedback">
          <h6 class="text-end">{{ $message }}</h6>
        </div> 
      @enderror
    </div>

      <div class="mb-4 d-flex align-items-center justify-content-center justify-content-between">
        <label class="me-5" for="description">Descrizione</label>
        <textarea class="form-control @error("description") is-invalid @enderror" name="description" id="description">{{ old('description',$comic->description)}}</textarea>

        {{-- per far uscire sotto il box la scritta di errore {{$message}} lo da in automatico laravel --}}
      @error('description')
         <div class="invalid-feedback">
          <h6 class="text-end">{{ $message }}</h6>
        </div> 
      @enderror
        </div>
      
      <div class=" mb-4 d-flex align-items-center justify-content-center justify-content-between">
        <label class="me-5" for="img">Immagine</label>
        <input  class="form-control @error("img") is-invalid @enderror" type="text" name="img" id="img" value="{{old('img',$comic->img)}}">
         {{-- per far uscire sotto il box la scritta di errore {{$message}} lo da in automatico laravel --}}
      @error('img')
         <div class="invalid-feedback">
          <h6 class="text-end">{{ $message }}</h6>
        </div> 
      @enderror
      </div>

      <div class="mb-4 d-flex align-items-center justify-content-center justify-content-between">
        <label class="me-5" for="price">Prezzo</label>
        <input class="form-control @error("price") is-invalid @enderror" type="text" name="price" id="price" value="{{old('price',$comic->price)}}">
         {{-- per far uscire sotto il box la scritta di errore {{$message}} lo da in automatico laravel --}}
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
</body>
</html>