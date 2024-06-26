<header class="navbar sticky-top bg-dark p-0" >
  <nav class="navbar navbar-expand-lg navbar-dark ">
    <div class="container">
      <a class="navbar-brand" href="#">RSUD. FAUZIAH BIREUEN</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
         
        </ul>
        <ul class="navbar-nav"> 

          @auth
           <li class="nav-item dropdown">
         
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              
              Selamat Datang, {{ auth()-> user()->name }}
            </a>
         
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/dashboard"> <i class="bi bi-layout-text-sidebar-reverse"></i> My Dashbord</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item"> <i class="bi bi-box-arrow-right"></i> Logout </button>
                </form>
            
              </li>
            </ul>
          </li>

          @else   
          <li class="nav-item">
            <a href="/login" class="nav-link {{ ($active ===  "login")? 'active':'' }}"> <i class="bi bi-box-arrow-in-right"></i>
              Login </a>
          </li>

          @endauth
        </ul>
      </div>
    </div>
  </nav>
  </header>