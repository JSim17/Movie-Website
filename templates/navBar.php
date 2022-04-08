<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="LoginModalLabel">Login</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
            <form action="..\includes\login-inc.php" method="post">
                <div class="mb-3">
                    <label for="title" class="form-label"><i class="bi bi-person-fill"></i> Username</label>
                    <input type="input" name="username" class="form-control" placeholder="Username" required><br />

                    <label for="body" class="form-label"><i class="bi bi-lock-fill"></i> Password</label>
                    <input type="password" name="password" class="form-control" placeholder="password" required><br />
                    
                    <a href="../pages/register.php"><i class="bi bi-person-plus"></i> Register?</a>
                </div>
            </div>
            
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <input class="btn btn-primary" type="submit" name="login" value="Login" />
            </form>
            </div>
        </div>
    </div>
</div>
	
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-md">
    <a class="navbar-brand" href="../pages/index.php" ><i class="bi bi-film"></i> GoodFilms</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../pages/index.php">Home</a>
            </li>
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Movies
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../pages/popular.php">Popular</a></li>
                <li><a class="dropdown-item" href="../pages/upcoming.php">Upcoming</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link active" href="../pages/movie-add.php"><i class="bi bi-plus-lg"></i></a>
            </li>

            <?php if(isset($_SESSION['loggedin'])){ ?>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../pages/profile.php">Profile</a></li>
                </ul>
                </li>
            <?php } ?>
        </ul>
        <?php 
            if(isset($_SESSION['loggedin'])){
                echo "<a class='nav-link active' href='../includes/logout-inc.php' name='Logout'style='color: white'>Log Out</a>";
            }
            else {
                echo "<li class='nav-item me-2'>
                <button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#loginModal' href=''>Login</button>
                </li>";
            }
        ?>

        <form action="../includes/movie-search.php" method="POST" class="d-flex">
            <input class="form-control me-2" type="text" name="search" placeholder="Search" aria-label="Search" onkeyup="showResult(this.value)">
            <div id="liveSearch"></div>
            <button class="btn btn-outline-success" type="submit" name="submit-search">Search</button>
        </form>
    </div>
    </div>
</nav>
<p id="results"></p>