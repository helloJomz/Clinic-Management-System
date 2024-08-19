<style>
    <?php include '../assets/css/navbar.css'; ?>
    
</style>
<?php 

    session_start();

    if(!isset($_SESSION['verify_admin_login'])){

        header('location: admin.login.php');

    }

    $one    =   'request.search.php';
    $two    =   'medicine.inventory.php';
    $three  =   'settings.medicine.php';

    function multipleActive($one, $two, $three){
        $url_array =  explode('/', $_SERVER['REQUEST_URI']);
        $url = end($url_array);  

        if($one == $url || $two == $url || $three == $url || $four == $url){
            echo 'active';
        }else{
            echo 'not-active';
        }
        
    }

    $queueLink   =   'queue.php';

    function queueActive($queueLink){
        $url_array =  explode('/', $_SERVER['REQUEST_URI']);
        $url = end($url_array);  

        if($queueLink == $url){
            echo 'active';
        }else{
            echo 'not-active';
        }
    }

    $dashLink   =   'dashboard.php';

    function dashActive($dashLink){
        $url_array =  explode('/', $_SERVER['REQUEST_URI']);
        $url = end($url_array);  

        if($dashLink == $url){
            echo 'active';
        }else{
            echo 'not-active';
        }
    }


    $uno    =   'search.php';
    $dos    =   'student.php';
    $tres   =   'faculty.php';
    $kwatro =   'itechpersonnel.php';
    $singko =   'addpatient.php';
    $sais   =   'addpatient.faculty.php';
    $siyete =   'addpatient.itechpersonnel.php';

    function multiplePatient($uno, $dos, $tres, $kwatro, $singko, $sais, $siyete){
        $url_array =  explode('/', $_SERVER['REQUEST_URI']);
        $url = end($url_array);  

        if($uno == $url || $dos == $url || $tres == $url || $kwatro == $url || $singko == $url || $sais == $url || $siyete == $url){
            echo 'active';
        }else{
            echo 'not-active';
        }
        
    }

    $historyLink = 'history.php';

    function historyActive($historyLink){
        $url_array =  explode('/', $_SERVER['REQUEST_URI']);
        $url = end($url_array);  

        if($historyLink == $url){
            echo 'active';
        }else{
            echo 'not-active';
        }
    }

    $settingsOne = 'settings.queue.php';
    $settingsTwo = 'admin.table.php';

    function settingsActive($settingsOne, $settingsTwo){
        $url_array =  explode('/', $_SERVER['REQUEST_URI']);
        $url = end($url_array);  

        if($settingsOne == $url || $settingsTwo == $url){
            echo 'active';
        }else{
            echo 'not-active';
        }
        
    }

?>
<nav class="navbar navbar-expand-sm navbar-light bg-light w-100 nav-nav-main">
    <div class="container wrapper-imp-item">
        <div class="">
        <a href="dashboard.php" class="navbar-brand ">Webnic</a>
        </div>

        <div class="d-flex text-center imp-items-nav">
            <ul class="navbar-nav text-center imp-item-1">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link me-3 moveBell nav-link dropdown-toggle" id="notifDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <small class="badge bg-danger notifcount" ></small>
                        <i class="fas fa-bell bellNotif"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-light shadow-sm hover-li pe-2 ps-2 dropdown-notif position-absolute end-75" aria-labelledby="navbarDropdownMenuLink">
                        
                        <li class="notifbody w-100"><a class="dropdown-item w-100"></a></li>
                        <li class="text-center mt-2 dropdown-seeall"><a href="seeall.php" class="text-decoration-none ">See all</a></li>
                    </ul>
                    
                </li>
            </ul>
            
            <ul class="navbar-nav text-center imp-item-2">
                <li class="nav-item">
                    <p class="p-0 me-2 mt-2 moveName">
                    <?= $_SESSION['adminfn']." ".$_SESSION['adminln'];?>
                    </p>
                </li>
            </ul>

            <ul class="navbar-nav text-center ">
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?= $_SESSION['adminimg']; ?>" alt="" width="30" height="30" class="imgIcon shadow-sm">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-light shadow-sm hover-li position-absolute " aria-labelledby="navbarDropdownMenuLink">
                        <!-- <li><a class="dropdown-item" href="#" tabindex="1"><i class="fas fa-user me-2"></i>Profile</a></li> -->
                        <li ><a class="dropdown-item mt-2 text-center" href="admin.logout.php"><i class="fas fa-sign-out-alt me-2"></i>Sign Out</a></li>
                    </ul>
                </li>
            </ul>
                
            
        </div>


    </div>
</nav>


<div class="overlay p-2 navbar-color shadow navFollow" >



    <nav class="navbar navbar-expand-md navbar-dark d-flex justify-content-center main-nav w-100 nav-nav-main" id="navHere">
    <button
        class="navbar-toggler menu-icon w-100 float-end border-none"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#mainNav"
        aria-controls="mainNav"
        aria-expanded="false"
        aria-lable="Main Nav"
        >

               
    <span class="navbar-toggler-icon float-end"></span>

</button>
    <ul class="nav hover ps-5 ">
        
    <div class="collapse navbar-collapse" id="mainNav">

        <li class="nav-item dropdown"><a class="nav-link semi-bold <?php dashActive($dashLink) ?>" aria-current="page" href="dashboard.php"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a></li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle <?php multiplePatient($uno, $dos, $tres, $kwatro, $singko, $sais, $siyete) ?> " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-hospital-user me-2 "></i>Patient
            </a>
            <ul class="dropdown-menu dropdown-menu-light shadow-sm text-center hover-li ps-3 pe-3" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <form action="search.php" method="post">
                            
                                <button type="submit" name="navstudent" id="activeStudent" class="dropdown-item btn" style="padding: 10px 20px;">Student</button>
                                <input type="hidden" name="navword" value="student">
                            
                        </form>
                    </li>
                    <li>
                        <form action="search.php" method="post">
                            
                                <button type="submit" name="navstudent" id="activeFaculty" class="dropdown-item btn" style="padding: 10px 20px;">Faculty</button>
                                <input type="hidden" name="navword" value="faculty">
                           
                        </form>
                    </li>
                    <li>
                        <form action="search.php" method="post">
                           
                                <button type="submit" name="navstudent" id="activeItechPersonnel" class="dropdown-item btn" class="btn" style="padding: 10px 20px;">Itech Personnel</button>
                                <input type="hidden" name="navword" value="itech personnel">
                            
                        </form>
                    </li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle <?php multipleActive($one, $two, $three) ?>" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-file-prescription me-2"></i>Medicine 
            </a>
            <ul class="dropdown-menu dropdown-menu-light shadow-sm text-center hover-li ps-3 pe-3" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="request.search.php" id="activeRequest">Request</a></li>
                    <li><a class="dropdown-item" href="medicine.inventory.php" id="activeInventory">Inventory</a></li>
                    <li>
                    <a class="dropdown-item" href="settings.medicine.php" id="activeSettings">Settings
                    </a></li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link <?php historyActive($historyLink)?>" href="history.php">
                <i class="fas fa-history me-2"></i>History
            </a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link <?php queueActive($queueLink)?>" href="queue.php"><i class="fas fa-user-friends me-2 " id="queueActive"></i>Queue</a>
        </li>
        
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle <?php settingsActive($settingsOne, $settingsTwo) ?>" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-cog me-2"></i>Settings</a>
            
            <ul style="z-index: 100;" class="dropdown-menu dropdown-menu-light shadow-sm text-center hover-li ps-3 pe-3">
                <li><a class="dropdown-item "  href="settings.queue.php" id="activeSettingsQueue">Enable / Disable Queue</a></li>
                <li><a class="dropdown-item "  href="admin.table.php" id="activeAdminManager">Admin Account Manager</a></li>
            </ul>
        </li>
        
    </ul>

    </div>

    </nav>

</div>

<!--- MODAL FOR VISIT -->
<div class="modal fade" id="notification-read" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="notif-preview">

        <div class="notif-header border-bottom">
            <div>
                <h4><strong id="notif__title"></strong></h4>
            </div>
            
        </div>

        <div class="notif-body shadow-sm rounded mt-3">
            <p><strong id="notif__date"></strong></p> 

            <p id="notif__content"></p>
        </div>

        <div class="notif-footer mt-3">
            <p class="text-muted">Please immediately take action on what the notification says, if already done, you may delete this notification.
            <button class="btn notif__delete"><i class="fas fa-trash-alt text-danger"></i></button>  
            </p>
        </div>

      </div>
    </div>
  </div>
</div>


<script src="../assets/js/activelinks.js?<?php echo time();?>"></script>

<script src="../assets/js/notification.js?<?php echo time();?>"></script>