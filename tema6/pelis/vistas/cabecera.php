<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Heroes · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/heroes/">

    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <style>

      main {
        background-color: rgba(0, 0, 0, .25);
      }

      aside {
        height: 100vh;
        height: -webkit-fill-available;
        max-height: 100vh;
      }

    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  </head>
  <body>
    
      <div class='d-flex'>

        <aside class="sticky-top">
          <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px; height: 100vh; ">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
              <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
              <span class="fs-4">PELIS</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
              <li>
                <a href="#" class="nav-link text-white" id="accion">
                  <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
                  Acción
                </a>
              </li>
              <li>
                <a href="#" class="nav-link text-white" id="scifi">
                  <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                  Scifi
                </a>
              </li>
              <li>
                <a href="#" class="nav-link text-white" id="comedia">
                  <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                  Comedia
                </a>
              </li>
              <li>
                <a href="#" class="nav-link text-white" id="drama">
                  <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
                  Drama
                </a>
              </li>
              <li>
                <a href="#" class="nav-link text-white" id="thriller">
                  <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
                  Thriller
                </a>
              </li>
            </ul>
            <hr>
            <div class="dropdown">
              <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>mdo</strong>
              </a>
              <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
              </ul>
            </div>
          </div>
        </aside>

      <main class='w-100'>
        <div class='container' id='principal'>Hola mundo</div>
  




      </main>

      </div>


      

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


    <script>

      window.onload = llamarInicio();

      //Función que carga todas las pelis de la api desde el principio
      async function llamarInicio() {
        const response = await fetch("./index.php?accion=llamarAPI&genero=todas&page=1");
        const data = await response.text();

        document.getElementById("principal").innerHTML = data;
      }

      //Llamando a la API desde PHP
      document.getElementById("accion").onclick=  async function() {
        const response = await fetch("./index.php?accion=llamarAPI&genero=28&page=1");
        const data = await response.text();
        document.getElementById("principal").innerHTML = data;
      };
      document.getElementById("scifi").onclick=  async function() {
        const response = await fetch("./index.php?accion=llamarAPI&genero=878&page=1");
        const data = await response.text();
        document.getElementById("principal").innerHTML = data;
      };
      document.getElementById("comedia").onclick=  async function() {
        const response = await fetch("./index.php?accion=llamarAPI&genero=35&page=1");
        const data = await response.text();
        document.getElementById("principal").innerHTML = data;
      };
      document.getElementById("drama").onclick=  async function() {
        const response = await fetch("./index.php?accion=llamarAPI&genero=18&page=1");
        const data = await response.text();
        document.getElementById("principal").innerHTML = data;
      };
      document.getElementById("thriller").onclick=  async function() {
        const response = await fetch("./index.php?accion=llamarAPI&genero=53&page=1");
        const data = await response.text();
        document.getElementById("principal").innerHTML = data;
      };

      //Botones prev y next de paginación
      document.getElementById("principal").onclick=  async function(e) {
        
        let botonPrev = e.target.closest("li[id=prev]");
		    if (botonPrev) {
          let pagina = botonPrev.value;
          let genero = botonPrev.getAttribute('genero');
          console.log(genero);
          if (pagina == 0)
            pagina = 1;

          const response = await fetch("./index.php?accion=llamarAPI&genero="+genero+"&page="+pagina);
          const data = await response.text();
          document.getElementById("principal").innerHTML = data;
        }

        let botonNext = e.target.closest("li[id=next]");
		    if (botonNext) {
          let pagina = botonNext.value;
          let genero = botonNext.getAttribute('genero');
          console.log(pagina);
          const response = await fetch("./index.php?accion=llamarAPI&genero="+genero+"&page="+pagina);
          const data = await response.text();
          document.getElementById("principal").innerHTML = data;
        }
      };

      
      //Llamando a la API directamente desde Javascript
      /*
      document.getElementById("scifi").onclick=  async function() {

        const options = {
          method: 'GET',
          headers: {
            accept: 'application/json',
            Authorization: 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJhNzRjMTIyYjIyODA3YTc2Yjc2MzdhYzE0MDdhMDQ1ZSIsInN1YiI6IjVjNDYwZGM1YzNhMzY4NDc4OTgzOTk4NiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.TaZmdoU2ddpuvzch2srxQGa3w2C636Xq-X6Bzc1uN6U'
          }
        };

        const response = await fetch('https://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=en-US&page=1&sort_by=popularity.desc&with_genres=Science Fiction', options);
        const data = await response.json();

        for( elemento in data.results) {
          console.log(data.results[elemento].original_title);
          document.getElementById("principal").innerHTML += data.results[elemento].original_title + "<br>";
        }

        //document.getElementById("principal").innerHTML = data;
      };
      */
      



    </script>

  </body>