<?php 
    require '../assets/shared/header.php';
    require '../assets/shared/navbar.php';
    require '../includes/dbcon.inc.php';
    require '../includes/class.autoloader.inc.php';

    $globalHelper = new GlobalHelper();

    if(!isset($_SESSION['verify_admin_login'])){

        header('location: admin.login.php');

    }

?>

<?php $title = "Dashboard";?>
<title><?php echo $title; ?></title>

<style> 
    body{
        font-family: 'Nunito', sans-serif;
        background-color: #f2f2f2;
    }

    .semi-bold{
        font-weight: 600;
    }

    .regular{
        font-weight: 400;
    }

    .title-card-color{
        color: #4e73df;
    }

    .courses{
        max-height: 150px;
    }

    .card-row2{
        background-color: #fff;
    }

    .qr-code{
        width: 300px;
    }

</style>

<?php 
    $sql = "SELECT * FROM student ORDER BY id";
    $result = mysqli_query($conn, $sql);
    $numrow = mysqli_num_rows($result);

    $sql1 = "SELECT * FROM faculty ORDER BY id";
    $result1 = mysqli_query($conn, $sql1);
    $numrow1 = mysqli_num_rows($result1);

    $sql2 = "SELECT * FROM itechpersonnel ORDER BY id";
    $result2 = mysqli_query($conn, $sql2);
    $numrow2 = mysqli_num_rows($result2);




    //COUNT COURSES
    $course = 'DCET';
    $dcet = $globalHelper->count_courses($conn, $course);

    $course = 'DCVET';
    $dcvet = $globalHelper->count_courses($conn, $course);

    $course = 'DECET';
    $decet = $globalHelper->count_courses($conn, $course);

    $course = 'DEET';
    $deet = $globalHelper->count_courses($conn, $course);

    $course = 'DICT';
    $dict = $globalHelper->count_courses($conn, $course);

    $course = 'DMET';
    $dmet = $globalHelper->count_courses($conn, $course);

    $course = 'DOMT';
    $domt = $globalHelper->count_courses($conn, $course);

    $course = 'DRET';
    $dret = $globalHelper->count_courses($conn, $course);


    //COUNT FACULTY
    $faculty = 'Computer Management';
    $comp = $globalHelper->count_faculty($conn, $faculty);

    $faculty = 'Engineering Technology';
    $eng = $globalHelper->count_faculty($conn, $faculty);

    //COUNT PERSONNEL
    $itechpersonnel = 'Staff';
    $staff = $globalHelper->count_personnel($conn, $itechpersonnel);

    $itechpersonnel = 'Maintenance Personnel';
    $maintenance = $globalHelper->count_personnel($conn, $itechpersonnel);

    $itechpersonnel = 'Security Personnel';
    $security = $globalHelper->count_personnel($conn, $itechpersonnel);

    

?>

<div class="container mt-4 ">
    <div class="row">
        <div>
            <h3 class="regular title-card-color ">Dashboard</h3>
        </div>
    </div>
</div>

<div class="container mt-3 ps-2 pe-2 pb-2">
    <div class="row">
        <div class="card col-md-4 mb-2 shadow rounded me-3">
            <div class="card-body">
                <div class="text-center">
                    <h5 class="card-title semi-bold title-card-color">STUDENT</h5>
                    <h4 class="fw-bold"><?= $numrow ?></h4>
                </div>

                <div class="table-responsive courses rounded shadow-sm">
                    <table class="table">
                        <tr>
                            <td><strong>DCET</strong></td>
                            <td class="text-end"><span class="badge bg-primary text-white"><?= $dcet; ?></span></td>
                        </tr>
                        <tr>
                            <td><strong>DCVET</strong></td>
                            <td class="text-end"><span class="badge bg-primary text-white"><?= $dcvet; ?></span></td>
                        </tr>
                        <tr>
                            <td><strong>DECET</strong></td>
                            <td class="text-end"><span class="badge bg-primary text-white"><?= $decet; ?></span></td>
                        </tr>
                        <tr>
                            <td><strong>DEET</strong></td>
                            <td class="text-end"><span class="badge bg-primary text-white"><?= $deet; ?></span></td>
                        </tr>
                        <tr>
                            <td><strong>DICT</strong></td>
                            <td class="text-end"><span class="badge bg-primary text-white"><?= $dict; ?></span></td>
                        </tr>
                        <tr>
                            <td><strong>DMET</strong></td>
                            <td class="text-end"><span class="badge bg-primary text-white"><?= $dmet; ?></span></td>
                        </tr>
                        <tr>
                            <td><strong>DOMT</strong></td>
                            <td class="text-end"><span class="badge bg-primary text-white"><?= $domt; ?></span></td>
                        </tr>
                        <tr>
                            <td><strong>DRET</strong></td>
                            <td class="text-end"><span class="badge bg-primary text-white"><?= $dret; ?></span></td>
                        </tr>
                    </table>
                </div>   
            </div>
        </div>
        <div class="card col-md-3 mb-2 shadow rounded me-3 ">
            <div class="card-body">
                <h5 class="card-title text-center semi-bold title-card-color">FACULTY</h5>
                <h4 class="text-center fw-bold"><?= $numrow1 ?></h4>   

                <div class="table-responsive courses rounded shadow-sm">
                    <table class="table">
                        <tr>
                            <td><strong>Computer Management</strong></td>
                            <td class="text-end"><span class="badge bg-primary text-white"><?= $comp; ?></span></td>
                        </tr>
                        <tr>
                            <td><strong>Engineering Technology</strong></td>
                            <td class="text-end"><span class="badge bg-primary text-white"><?= $eng; ?></span></td>
                        </tr>
                    </table>
                </div>   

            </div>
        </div>
        <div class="card col-md-3 mb-2 shadow rounded ">
            <div class="card-body">
                <h5 class="card-title text-center semi-bold title-card-color">ITECH PERSONNEL</h5>
                <h4 class="fw-bold text-center"><?= $numrow2 ?></h4>

                <div class="table-responsive courses rounded shadow-sm">
                    <table class="table">
                        <tr>
                            <td><strong>Staff</strong></td>
                            <td class="text-end"><span class="badge bg-primary text-white"><?= $staff; ?></span></td>
                        </tr>
                        <tr>
                            <td><strong>Maintenance Personnel</strong></td>
                            <td class="text-end"><span class="badge bg-primary text-white"><?= $maintenance; ?></span></td>
                        </tr>
                        <tr>
                            <td><strong>Security Personnel</strong></td>
                            <td class="text-end"><span class="badge bg-primary text-white"><?= $security; ?></span></td>
                        </tr>
                    </table>
                </div>   
                
            </div>
        </div>
    </div>




</div>

<?php 
    require '../assets/shared/footer.php';
?>