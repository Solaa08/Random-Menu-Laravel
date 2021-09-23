<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tutoriel Laravel 8 CRUD</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.2/r-2.2.9/datatables.min.css"/>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap4.min.css"> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.2/r-2.2.9/datatables.min.js"></script>
    <script src="{{ asset('js/app.js') }}" type="text/js" defer></script>
</head>

<body>

    <div class="container-fluid">
      <div class="row flex-nowrap">
          <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
              <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                  <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                      <span class="fs-5 d-none d-sm-inline">Menu</span>
                  </a>
                  <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                      <li class="nav-item">
                          <a href="/dashboard" class="nav-link align-middle px-0">
                              <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">User</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="/recette" class="nav-link align-middle px-0">
                              <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Recettes</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="/ingredient" class="nav-link align-middle px-0">
                              <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Ingredients</span>
                          </a>
                      </li>
                      <br>
                      <li class="nav-item">
                        <a href="/table" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Table</span>
                        </a>
                    </li>
              </div>
          </div>
          <div class="col py-3">
            @yield('content')
          </div>
      </div>
  </div>
    @yield('script')
</body>
</html>
