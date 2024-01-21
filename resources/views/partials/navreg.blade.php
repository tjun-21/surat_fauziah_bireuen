<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="#">Menu Register</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
         <li class="nav-item">
                <a href="/pns" class="nav-link {{ ($active ===  "pns")? 'active':'' }}"> <i class="bi bi-person-badge-fill"></i>
                  PNS</a>
         </li>
          
          <li class="nav-item">
            <a href="/kontrak" class="nav-link {{ ($active ===  "kontrak")? 'active':'' }}"> <i class="bi bi-person-bounding-box"></i>
              Kontrak </a>
          </li>

          <li class="nav-item display: flex  justify-content: center">
            <a href="/p3k" class="nav-link {{ ($active ===  "p3k")? 'active':'' }}"> <i class="bi bi-person-badge"></i>
              P3K </a>
          </li>
         
        </ul>
        <ul class="navbar-nav ms-auto"> 

          <li class="nav-item">
            <a href="/login" class="nav-link {{ ($active ===  "login")? 'active':'' }}"> <i class="bi bi-box-arrow-in-right"></i>
              Login </a>
          </li>

        </ul>
      </div>
    </div>
  </nav>