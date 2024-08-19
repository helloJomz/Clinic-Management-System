<?php 
    require '../includes/dbcon.inc.php';
    require '../assets/shared/header.php';
    require '../assets/shared/navbar.php';
    require '../includes/class.autoloader.inc.php';
?>

<?php $title = "History Logs";?>
<title><?php echo $title; ?></title>

<style>

    body{
        background-color: #e2ebfc;
        font-family: 'Nunito', sans-serif;
    }

    .main-div{
        height: 550px;
    }

    .history-active{
        height: 5px;
        background-color: #4e73df;
    }

    .search{
        border-radius: 16px;
        border: solid 1.5px #D3D3D3;
        outline: none;
        padding: 5px 20px 5px 40px;
        font-size: 16px;
        -webkit-transition: 1s; /* Safari */
        transition: 1s;
    }

    .bg-white{
        background-color: #fff;
    }

    .search:hover{
        box-shadow: 0 0 5pt 0.5pt #D3D3D3;
    }

    .search:focus {
        box-shadow: 0 0 5pt 2pt #D3D3D3;
        outline-width: 0px;
    }

    .searchIcon{
        position: relative;
        left: 35px;
    }

    tbody{
        display: block;
        height: 340px;
        overflow-y: scroll;
        padding-bottom: 30px;
    }

    thead, tbody tr {
        display: table;
        width: 100%;
        table-layout: fixed;/* even columns width , fix width of table too*/
    }

    thead{
        background-color: #4e73df;
        color: white;
        
    }

    .activityDesc{
        padding: 0px 100px 0px 100px;
        background-color: yellow;
    }
    
    tbody tr:hover{
        background-color: #f2f2f2;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
        color: #4e73df;
        transition: 0.5s;
    }

    @media screen and (max-width: 508px){

        .ulti-wrapper{
            flex-wrap: wrap;
        }

        .main-div{
            height: 600px;
        }

        .categ-btn{
            flex: 1 0 ;
            margin-bottom: 5%;
        }

        .searchSettings{
            width: 100%;
        }
    }

    
</style>

<div class="container mt-4">

    <div class="main-div shadow rounded p-3 bg-white mx-auto">
    
        <div class="header-div d-flex justify-content-between">
            <div>
                <h4><strong>History</strong></h4> 
            </div>
            <div>
                <a href="generatereport.php" class="btn bg-danger text-white">Generate Report</a>
            </div>
        </div>

        <div class="sub-header-div mt-4 w-100">
            <div class="d-flex justify-content-between ulti-wrapper">
                <div class="d-flex categ-btn">
                    <div class="nav1">
                        <button class="btn" id="btnSettings">Settings</button>
                        <div class="div1 history-active"></div>
                    </div>
                    <div class="nav2">
                        <button class="btn" id="btnMedicine">Medicine</button>
                        <div class="div2"></div>
                    </div>
                    <div class="nav3">
                        <button class="btn" id="btnQueue">Queue</button>
                        <div class="div3"></div>
                    </div>
                </div>

                <div id="search-div">
                </div>
            </div>
        </div>

        <div class="body-div mt-3">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="w-50">Activity</th>
                            <th>Date</th>
                            <th>Admin</th>
                        </tr>
                    </thead>
                    <tbody id="history-body">
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>




<script src="../assets/js/history.js?<?php echo time(); ?>"></script>


<?php
    require '../assets/shared/footer.php';
?>