<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
      <div class="row">
          <div class="col">
              <ul class="nav">
                  <li class="nav-item">
                      <a class="nav-link" href="/tag">Tag</a>
                  </li>
              </ul>
          </div>
      </div>
  </div>
  <div class="container">
      <div class="row">
          <div class="col">
              <ul class="nav">
                  <li class="nav-item">
                      <a class="nav-link" href="/category">Category</a>
                  </li>
              </ul>
          </div>
      </div>
  </div>
  <div class="container">
      <div class="row">
          <div class="col">
              <ul class="nav">
                  <li class="nav-item">
                      <a class="nav-link" href="/post">Post</a>
                  </li>
              </ul>
          </div>
      </div>
  </div>
  <div class="container">
      <div class="row">
          <div class="col">
              @yield('content')
          </div>
      </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>