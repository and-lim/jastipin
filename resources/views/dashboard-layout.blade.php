@extends('layout')


    <div class="hero hero-header" style="height: 50vh">
        <div class="container">
             <h1 class="text-white text-center">Dashboard</h1>
        </div>
     </div>

     <div class="container my-3 py-5 dashboard">
        <div class="row">
            <div class="col-lg-3">
                <div class="menu-header text-center mb-3">Menu</div>
                <ul class="nav flex-column gap-2" id="nav-tab" role="tablist">
                    <li class="dashboard-nav">
                        <a class="nav-link active d-flex align-items-center" id="nav-dashboard-tab" data-bs-toggle="tab" data-bs-target="#nav-dashboard" type="button" role="tab" aria-controls="nav-dashboard" aria-selected="true">
                            <i class="fa fa-columns"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    
                    <li class="dashboard-nav">
                        <a class="nav-link d-flex align-items-center" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="false">
                            <i class="fa fa-user"></i>
                            <span>Profile </span>
                        </a>
                    </li> 
                 
                    <li class="dashboard-nav">
                        <a class="nav-link d-flex align-items-center" id="nav-item-tab" data-bs-toggle="tab" data-bs-target="#nav-item" type="button" role="tab" aria-controls="nav-item" aria-selected="false">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Item List</span>
                        </a>
                    </li>

                    <li class="dashboard-nav ">
                        <a class="nav-link d-flex align-items-center" id="nav-trip-tab" data-bs-toggle="tab" data-bs-target="#nav-trip" type="button" role="tab" aria-controls="nav-trip" aria-selected="false">
                            <i class="fa fa-map-marker-alt"></i>
                            <span>Trip List</span>
                        </a>
                    </li>
                      <li class="dashboard-nav">
                        <a class="nav-link d-flex align-items-center" id="nav-request-tab" data-bs-toggle="tab" data-bs-target="#nav-request" type="button" role="tab" aria-controls="nav-request" aria-selected="false">
                            <i class="fa fa-question-circle"></i>
                            <span>Request</span>
                        </a>
                    </li> 
                    @auth
                    <form action="/logout" method="POST">
                    @csrf
                    <li class="dashboard-nav">
                        <button class="btn btn-link nav-link text-decoration-none d-flex gap-4 align-items-center" type="submit" id="logout">
                            <i class="fa fa-power-off"></i>
                            <span>Logout</span>
                        </button>
                    </li>
                    </form>
                    @endauth
                </ul>
            </div>
            <div class="col-lg-9">
                <div class="menu-header text-center mb-3">Dashboard</div>
                @yield('content')
            </div>
        </div>
    </div>
    