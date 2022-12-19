@extends('adminlte::page')

@section('title','Admin home')

@section('content_header')
    <h1>Mis Primeros Auxilitos</h1>
@stop


@section('content')

<body>    
    <main>
    
      <section class="py-5 text-center container">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Bienvenido</h1>
            <p class="lead text-muted">¿Que deseas hacer?</p>
            <p>
              <a href="{{route('admin.user')}}" class="btn btn-primary my-2">Ver usuarios</a>
              <a href="{{route('admin.contenido')}}" class="btn btn-secondary my-2">Ver contenidos</a>
            </p>
          </div>
        </div>
      </section>
    
      <div class="album py-5 bg-light">
        <div class="container">
    
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
              <div class="card shadow-sm">
                Video
                <img class="bd-placeholder-img card-img-top rounded" width="100%" height="225" src="{{asset('/img/police.png')}}" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                {{-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                  <title>Video</title>
                  <rect width="100%" height="100%" fill="#55595c"/>
                  <text x="50%" y="50%" fill="#eceeef" dy=".3em">Curar con curita</text>
                </svg> --}}
    
                <div class="card-body">
                  <p class="card-text">Video con mas comentarios y me gustas</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-success">Ver</button>
                      <button type="button" class="btn btn-sm btn-outline-danger">Editar</button>
                    </div>
                    <small class="text-muted">9 min</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow-sm">
                Imagen
                <img class="bd-placeholder-img card-img-top rounded" width="100%" height="225" src="{{asset('/img/imgs/a.jpg')}}" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                  
                  {{-- <rect width="100%" height="100%" fill="#55595c"/> --}}
                  {{-- <text x="50%" y="50%" fill="#eceeef" dy=".3em">Atrapa el botiquin</text> --}}
                
                <div class="card-body">
                  <p class="card-text">Imagen más atractiva del momento!!!</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-success">Ver</button>
                      <button type="button" class="btn btn-sm btn-outline-danger">Editar</button>
                    </div>
                    <small class="text-muted">19 min</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow-sm">
                Juego
                <img class="bd-placeholder-img card-img-top rounded" width="100%" height="225" src="{{asset('/img/menu/challengue2.png')}}" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                {{-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                  <title>Juego</title>
                  <rect width="100%" height="100%" fill="#55595c"/>
                  <text x="50%" y="50%" fill="#eceeef" dy=".3em">Encuentra el objeto</text>
                </svg> --}}
                <div class="card-body">
                  <p class="card-text">Juego más querido por los niños.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-success">Ver</button>
                      <button type="button" class="btn btn-sm btn-outline-danger">Editar</button>
                    </div>
                    <small class="text-muted">20 min</small>
                  </div>
                </div>
              </div>
            </div>
    
    </main>
    
    {{-- <footer class="text-muted py-5">
      <div class="container">
        <p class="float-end mb-1">
          <a href="#">Back to top</a>
        </p>
        <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="../getting-started/introduction/">getting started guide</a>.</p>
      </div>
    </footer> --}}
    
    
        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    
          
</body>
@endsection

@section('css')
  <link rel="stylesheet" href="{{asset('css/admin.css')}}">
@stop