<?php 
    require '../includes/dbcon.inc.php';
    require '../assets/shared/header.php';
    require '../assets/shared/navbar.php';
    require '../includes/class.autoloader.inc.php';
?>

<style>

    body{
        background-color: #e2ebfc;
    }

    .main-card{
        display: flex;
        background-color: #fff;
        width: 75%;
        height: 520px;
        position: relative;
        left: 180px;
    }

    .main-card .left-card{
        float: left;
        height: 520px;
        padding: 1%;
    }

    .main-card .right-card{
       padding-left: 2%;
       padding-top: 1%;
       width: 50%;
       border-radius: 0px 5px 5px 0px;
    }

    .search-bar{
        padding: 3%;
    }

    .search-bar .search-icon{
        position: absolute;
        top: 60px;
        left: 30px;
        z-index: 1000;
        font-size: 14px;
    }

    .search-bar input[type="text"]{
        border-radius: 16px;
        outline: none;
        border: solid 1.5px #D3D3D3;
        background-color: #f2f2f2;
        width: 100%;
        height: 35px;
        padding-left: 15%;
    }

    .notification-list {
        overflow: auto;
        max-height: 380px;
    }

    .notification-list div{
        padding: 5%;
        cursor: pointer;
    }

    .notification-list div h5, .notification-list div small{
        margin-top: 0;
        margin-bottom: 0;
    }

    .notification-message div:nth-child(1) {
        background-color: #f3f3f3;
        height: 350px;
    }

    .notification-message div:nth-child(2) {
       font-style: italic;
    }

    .unseen-bg{
        background-color: #deeff5;
    }

    .selected-bg{
        background-color: #f2f2f2;
        color: #4e73df;
    }

    .notif-delete{
        cursor: pointer;
    }

    .font-regular{
        font-weight: 300;
    }

    .font-blue{
        color: #4e73df;
    }
    

    ::-webkit-scrollbar {
        width: 10px;
    }
    
    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1; 
    }
    
    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888; 
        
    }
    
    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555; 
    
    }

    
</style>

<?php $title = "Notifications";?>
<title><?php echo $title; ?></title>

<div class="container mt-4">
    <div class="main-card rounded shadow">
        <div class="left-card shadow w-25 rounded">
            
            <div>
                <div class="d-flex justify-content-between">
                    <div>
                        <h4><strong>Notifications</strong></h4>
                    </div>
                    <div>
                        <span class="badge bg-danger text-white" id="notif-count"></span>
                    </div>
                </div>

                <div class="search-bar mb-3">
                    <span class="search-icon"><i class="fas fa-search"></i></span>
                    <input type="text" class="shadow-sm" placeholder="Search Notification" id="search-field">
                </div>

            </div>

            <div class="notification-list" id="notif-list">
            </div>
            
    
        </div>

        <div class="right-card w-75">
            <div class="pe-4">
                <div class="notification-title border-bottom pe-3 d-flex justify-content-between">
                    
                    <div>
                        <h4 class="p-0 font-blue" ><strong id="notif-title"></strong></h4>
                    </div>

                    <div class="mt-2">
                        <span class="text-danger notif-delete" ><i class="fas fa-trash-alt"></i></span>
                    </div>
                </div>

                <div class="notification-message mt-3">

                    <div class="rounded shadow p-3" >
                       
                        <p><strong id="notif-date"></strong></p>
                
                        <p class="fs-4 font-regular" id="notif-body"></p>
                       
                    </div>

                    <div class="mt-4 text-muted">
                        <p>Please immediately take action on what the notification says, 
                            if already done, you may delete this notification.</p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<script src="../assets/js/seeall.js?<?php echo time(); ?>"></script>
<?php 
    require '../assets/shared/footer.php';
?>