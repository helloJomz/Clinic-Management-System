<?php 
    require '../includes/dbcon.inc.php';
    require '../assets/shared/header.php';
    require '../assets/shared/navbar.php';
    require '../includes/class.autoloader.inc.php';

    
?>

<style>
    <?php require '../assets/css/generatereport.css'; ?>
</style>


<div class="container mt-4 ">

    <div class="main-card w-75 p-3 bg-light shadow mx-auto rounded ">
        <h3><strong>Generate Report</strong></h3> 

        <div class="mt-4">

            <div class="buttonContainer d-flex overflow-auto">
                <button  form="" class="p-2" onClick="showPanel(0, '#f2f2f2')">Daily Report</button>
                <button  form="" class="p-2" onClick="showPanel(1, '#f2f2f2')">Monthly Report</button>
            </div>

            <div class="tabPanel shadow-sm p-4">
                <div class="row dailySelector">
                    <div class="col-sm-3 mt-1">
                        <label for="month" class="text-muted">Month</label>
                        <select name="month" id="month" class="form-control" form="dailyreport">
                            <option>January</option>
                            <option>February</option>
                            <option>March</option>
                            <option>April</option>
                            <option>May</option>
                            <option>June</option>
                            <option>July</option>
                            <option>August</option>
                            <option>September</option>
                            <option>October</option>
                            <option>November</option>
                            <option>December</option>
                        </select>
                    </div>

                    <div class="col-sm-3 mt-1">
                        <label for="day" class="text-muted">Day</label>
                        <select name="day" id="day" class="form-control" form="dailyreport">
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                            <option>04</option>
                            <option>05</option>
                            <option>06</option>
                            <option>07</option>
                            <option>08</option>
                            <option>09</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                            <option>13</option>
                            <option>14</option>
                            <option>15</option>
                            <option>16</option>
                            <option>17</option>
                            <option>18</option>
                            <option>19</option>
                            <option>20</option>
                            <option>21</option>
                            <option>22</option>
                            <option>23</option>
                            <option>24</option>
                            <option>25</option>
                            <option>26</option>
                            <option>27</option>
                            <option>28</option>
                            <option>29</option>
                            <option>30</option>
                            <option>31</option>
                        </select>
                    </div>

                    <div class="col-sm-3 mt-1">
                        <label for="year" class="text-muted">Year</label>
                        <select name="year" id="year" class="form-control" form="dailyreport">
                            <option>2021</option>
                            <option>2022</option>
                            <option>2023</option>
                            <option>2024</option>
                            <option>2025</option>
                            <option>2026</option>
                            <option>2027</option>
                            <option>2028</option>
                            <option>2029</option>
                            <option>2030</option>
                        </select>
                    </div>

                    <div class="col-sm-3 mt-1">
                        <label for="type" class="text-muted">Type</label>
                        <select name="type" id="type" class="form-control" form="dailyreport">
                            <option>Queue</option>
                            <option>Admin Activity</option>
                            <option>Request Medicine</option>
                        </select>
                    </div> 

                </div>

                <div class="text-center mt-5" id="alert-container">
                        <button class="btn bg-success text-white" id="search-report"><i class="fas fa-search me-2"></i>Search Report</button>

                        <div class="alert alert-primary fst-italic mt-3" role="alert">
                            Please choose the correct date and click the Search button to start Generating your Report.
                        </div>
                </div>

                <input type="hidden" name="adminfn" value="<?php echo $_SESSION['adminfn'] ?>" form="dailyreport">
                <input type="hidden" name="adminln" value="<?php echo $_SESSION['adminln'] ?>" form="dailyreport">

            </div>

            <div class="tabPanel shadow-sm p-4">
               <div class="row d-flex justify-content-center">
                   <div class="col-sm-3 mt-1">
                        <label for="monthly_month" class="text-muted">Month</label>
                        <select name="monthly_month" id="monthly_month" class="form-control" form="monthlyreport">
                            <option>January</option>
                            <option>February</option>
                            <option>March</option>
                            <option>April</option>
                            <option>May</option>
                            <option>June</option>
                            <option>July</option>
                            <option>August</option>
                            <option>September</option>
                            <option>October</option>
                            <option>November</option>
                            <option>December</option>
                        </select>
                   </div>

                   <div class="col-sm-3 mt-1">
                        <label for="monthly_year" class="text-muted">Year</label>
                        <select name="monthly_year" id="monthly_year" class="form-control" form="monthlyreport">
                            <option>2021</option>
                            <option>2022</option>
                            <option>2023</option>
                            <option>2024</option>
                            <option>2025</option>
                            <option>2026</option>
                            <option>2027</option>
                            <option>2028</option>
                            <option>2029</option>
                            <option>2030</option>
                        </select>
                   </div>

                   <div class="col-sm-3 mt-1">
                        <label for="monthly_type" class="text-muted">Type</label>
                        <select name="monthly_type" id="monthly_type" class="form-control" form="monthlyreport">
                            <option>Queue</option>
                            <option>Admin Activity</option>
                            <option>Request Medicine</option>
                        </select>
                    </div> 
               </div>

               <div class="text-center mt-5" id="alert-monthly-container">
                        <button class="btn bg-success text-white" id="search-monthly-report"><i class="fas fa-search me-2"></i>Search Report</button>

                        <div class="alert alert-primary fst-italic mt-3" role="alert">
                            Please choose the correct date and click the Search button to start Generating your Report.
                        </div>
                </div>

                <input type="hidden" name="adminfnz" value="<?php echo $_SESSION['adminfn'] ?>" form="monthlyreport">
                <input type="hidden" name="adminlnz" value="<?php echo $_SESSION['adminln'] ?>" form="monthlyreport">

            </div>
            

        </div>

    </div>



</div>

<script src="../assets/js/generatereport.js?<?php echo time();?>"></script>

<script>

    var tabButtons=document.querySelectorAll(".buttonContainer button");
    var tabPanel=document.querySelectorAll(".tabPanel");
    var next=document.querySelector(".tabPanel .wrapper a")

    function showPanel(panelIndex, colorCode){
    
    tabButtons.forEach(function(node){
        node.style.backgroundColor="";
        node.style.color="";
    });

    tabButtons[panelIndex].style.backgroundColor="#f2f2f2";
    tabButtons[panelIndex].style.color="black";

    tabPanel.forEach(function(node){
        node.style.display="none";
    });

    tabPanel[panelIndex].style.display="block";
    tabPanel[panelIndex].style.backgroundColor=colorCode;
    }

    showPanel(0, '#f2f2f2');

</script>

<?php 
    require '../assets/shared/footer.php';
?>