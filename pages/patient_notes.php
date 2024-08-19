
<?php 
    require '../assets/shared/patient_sidebar.php';
    require '../includes/dbcon.inc.php';
?>

<?php $title = "Notes";?>
<title><?php echo $title; ?></title>


<style>
    body{
        background-color: #e2ebfc;
        font-family: 'Nunito', sans-serif;
    }


    .main-card{
        background-color: #fff;
        height: 500px;
     
    }

    .note-item{
        border-radius: 16px;
        background-color: #e6e6e6;
        cursor: pointer;
    }

    .note-item:hover{
        background-color: #4e73df !important;
        color: #fff !important;
    }

    .note-list{
        overflow: auto;
        height: 420px;
    }
</style>



<div class="container" >
    <div class="pt-4 " >
        <div class="main-card p-2 rounded">
            <div class="border-bottom mb-3">
                <h3><strong>Notes</strong></h3>
            </div>

            <div id="note-list" class="note-list p-2">
            </div>
        </div>
    </div>
</div>

<script src="../assets/js/notes.js?<?php echo time();?>"> </script>