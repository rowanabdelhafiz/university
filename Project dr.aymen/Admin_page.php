<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="Dashboard.css">
    
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
     
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    
                </span>

                <div class="text logo-text">
                    <h1><span class="name">Leader</span></h1>
                    <span class="profession">Sections</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="register.php">
                            <span class="text nav-text"> ADD Officer</span>
                        </a>
                    </li>
                    <br>
                    <li class="nav-link">
                        <a href="Update-user.php">
                            <span class="text nav-text" align='center'> Update <br>Officer information</span>
                        </a>
                    </li>
                    <br>
                    <li class="nav-link">
                        <a href="Remove-officer.php">
                            <span class="text nav-text" >Remove Officer</span>
                        </a>
                    </li>
                    <br>
                    <li class="nav-link">
                        <a href="#">
                            <span class="text nav-text">Change Leader code</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="index.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Log Out</span>
                    </a>
                </li>
                
            </div>
        </div>

    </nav>

    <section class="home">
        <div class="text">Dashboard Sidebar</div>
    </section>

    <script>
        const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})
;
    </script>

</body>
</html>