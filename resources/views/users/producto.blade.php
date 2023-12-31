@extends('layouts.app_users')
@section('content')
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Vive una Nueva Experiencia</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Link
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Link</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <br>
        <h2>Nombre de la cabana</h2>
    </div>


    <button type="button" class="btn btn-outline-success"><i class="fas fa-share-from-square"></i> Compartir</button>



    <button type="button" class="btn btn-outline-success"><i class="fas fa-heart"></i> Guardar</button>
    <div style="padding:1.5rem !important">
        <!-- /.user-block -->
        <div class="row mb-3">
            <div class="col-sm-6">
                <img class="img-fluid" src="{{ asset('img/cabana 1.jpeg') }}" alt="Photo">
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-6">
                        <img class="img-fluid mb-3" src="{{ asset('img/cabana 2.jpeg') }}" alt="Photo">
                        <img class="img-fluid" src="{{ asset('img/cabana 3.jpeg') }}" alt="Photo">
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <img class="img-fluid mb-3" src="{{ asset('img/cabana 4.jpeg') }}" alt="Photo">
                        <img class="img-fluid" src="{{ asset('img/cabana 5.jpeg') }}" alt="Photo">
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.col -->
        </div>

    </div>
@endsection
