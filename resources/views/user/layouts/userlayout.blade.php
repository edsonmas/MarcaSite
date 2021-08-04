<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - MarcaSite</title>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <!-- FontsAwesome -->
    <script src="https://kit.fontawesome.com/b8166eb8db.js" crossorigin="anonymous"></script>
     <!-- Fonts -->
   <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

   <!-- Styles -->
   <style>
       html, body {
           background-color: #fff;
           color: #636b6f;
           font-family: 'Nunito', sans-serif;
           font-weight: 200;
           height: 100vh;
           margin: 0;
       }

       .full-height {
           height: 100vh;
       }

       .flex-center {
           align-items: center;
           display: flex;
           justify-content: center;
       }

       .position-ref {
           position: relative;
       }

       .top-right {
           position: absolute;
           right: 10px;
           top: 18px;
       }

       .content {
           text-align: center;
       }

       .title {
           font-size: 84px;
       }

       .links > a {
           color: #636b6f;
           padding: 0 25px;
           font-size: 13px;
           font-weight: 600;
           letter-spacing: .1rem;
           text-decoration: none;
           text-transform: uppercase;
       }

       .m-b-md {
           margin-bottom: 30px;
       }
   </style>
    
</head>
<body>
    <header>
        <div class="container" id="nav-container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                  
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('cursos.index') }}">Lista dos Cursos</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('cursos.create') }}">Cadastrar Curso</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Inscrever-se em um Curso</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>
        </div>
    </header>
    
    {{-- <div class="container">
        @yield('cursos_table')
    </div> --}}


    <script>
        console.log('teste');
    </script>
</body>
</html>


  
   
