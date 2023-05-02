@extends('layout')

@section('mainSection')
    <section>
        <div class="hero hero-header my-3" style="height: 50vh">
           <div class="container">
                <h1 class="text-white text-center">Dashboard</h1>
           </div>
        </div>

        <div class="container my-3 dashboard">
            <div class="row">
                <div class="col-lg-3">
                    <div class="menu-header text-center mb-3">Menu</div>
                    <ul class="nav flex-column gap-2">
                        <li class="nav-item">
                            <a class=" d-flex align-items-center nav-link active" aria-current="page" href="#">
                                <i class="fa fa-user"></i>
                                <span>menu</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class=" d-flex align-items-center nav-link active" aria-current="page" href="#">
                                <i class="fa fa-user"></i>
                                <span>menu</span>
                            </a>
                        </li>
                        <li class="nav-item">
                             <a class=" d-flex align-items-center nav-link active" aria-current="page" href="#">
                                <i class="fa fa-user"></i>
                                <span>menu</span>
                            </a>
                        </li>
                      </ul>
                </div>
            </div>
        </div>
    </section>
    
@endsection