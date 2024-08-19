<?php 

include '../dbcon.inc.php';

if(isset($_POST['loadlist'])){

    $sql = "SELECT * FROM notification ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    
    $output = '';
    $first = true;
    if(mysqli_num_rows($result) > 0 ){

        while($row = mysqli_fetch_array($result)){
            
            if($first == true){

                $output .= '<div class="selected-bg rounded shadow-sm mb-2 list-select" id="'.$row['id'].'">
                <h5>'.$row['subject'].'</h5>
                <small>'.substr_replace($row['content'], " ...", 25).'</small>
                <input type="hidden" class="identifySelected" value="'.$row['id'].'">
                </div>';

                $title = $row['subject'];
                $content = $row['content'];
                $tmpDate = $row['dateadded'];
                $date = date('M d Y H:i:s' , strtotime($tmpDate));
                $deleteid = $row['id'];

                $first = false;
            }else{

                $output .= '<div class="'.$row['unseen'].' rounded shadow-sm mb-2 list-select" id="'.$row['id'].'">
                <h5>'.$row['subject'].'</h5>
                <small>'.substr_replace($row['content'], " ...", 25).'</small>
                </div>';    
            }
           
        }

    }else{
        
    }
    
    $data = array(
        'list' => $output,
        'count' => $count,
        'title' => $title,
        'content' => $content,
        'dateadded' => $date,
        'deleteid' => $deleteid
    );

    echo json_encode($data);
}


if(isset($_POST['select'])){

    if($_POST['select'] == 'select'){

        $selectId = $_POST['listId'];

        $sql = "SELECT * FROM notification WHERE id=$selectId";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        $title = $row['subject'];
        $content = $row['content'];
        $date = $row['dateadded'];
        $deleteid = $row['id'];

        $data = array(
            'title' => $title,
            'content' => $content,
            'dateadded' => $date,
            'deleteid' => $deleteid

        );

        $updateSql = "UPDATE notification SET unseen=null, status=1 WHERE id=$selectId ";
        mysqli_query($conn, $updateSql);

        echo json_encode($data);

    }
}


if(isset($_POST['deleteAction'])){

    $deleteid = $_POST['deleteAction'];

    $sql = "DELETE FROM notification WHERE id=$deleteid ";
    mysqli_query($conn, $sql);


    $refreshSql = "SELECT * FROM notification ORDER BY id DESC";
    $refreshResult = mysqli_query($conn, $refreshSql);
    $count = mysqli_num_rows($refreshResult);
    
    $output = '';
    $first = true;
    if(mysqli_num_rows($refreshResult) > 0 ){

        while($row = mysqli_fetch_array($refreshResult)){
            
            if($first == true){

                $output .= '<div class="selected-bg rounded shadow-sm mb-2 list-select" id="'.$row['id'].'">
                <h5>'.$row['subject'].'</h5>
                <small>'.substr_replace($row['content'], " ...", 25).'</small>
                </div>';

                $title = $row['subject'];
                $content = $row['content'];
                $date = $row['dateadded'];
                $deleteid = $row['id'];

                $first = false;
            }else{

                $output .= '<div class="'.$row['unseen'].' rounded shadow-sm mb-2 list-select" id="'.$row['id'].'">
                <h5>'.$row['subject'].'</h5>
                <small>'.substr_replace($row['content'], " ...", 25).'</small>
                </div>';    
            }
           
        }

    }else{

        $output .= ' <div>
        <h5>No notifications found!</h5>
        </div>';    

    }

   
    
    $data = array(
        'list' => $output,
        'count' => $count,
        'title' => $title,
        'content' => $content,
        'dateadded' => $date,
        'deleteid' => $deleteid
    );

    echo json_encode($data);
}

if(isset($_POST['listChecker'])){

    $sql = "SELECT * FROM notification ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    
    $output = '';
    $first = true;
    if(mysqli_num_rows($result) == 0 ){
        
        $output = ' <div>
        <h5>No notifications found!</h5>
        </div> ';

        $content = '
            No notification to Display!
        ';

    }
    
    $data = array(
        'list' => $output,
        'content' => $content
    );

    echo json_encode($data);
}


if(isset($_POST['searchField'])){

    $search = $_POST['searchField'];

    $sql = "SELECT * FROM notification WHERE subject LIKE '%".$search."%' OR content LIKE '%".$search."%' ";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    $output = '';
    $first = true;
    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){

                if($first == true){
                    $output .= '<div class="selected-bg rounded shadow-sm mb-2 list-select" id="'.$row['id'].'">
                    <h5>'.$row['subject'].'</h5>
                    <small>'.substr_replace($row['content'], " ...", 25).'</small>
                    </div>';

                    $title = $row['subject'];
                    $content = $row['content'];
                    $date = $row['dateadded'];
                    $deleteid = $row['id'];

                }else{

                    $output .= '<div class="'.$row['unseen'].' rounded shadow-sm mb-2 list-select" id="'.$row['id'].'">
                    <h5>'.$row['subject'].'</h5>
                    <small>'.substr_replace($row['content'], " ...", 25).'</small>
                    </div>';    
                }
                

            
        }

    }else{
        
        $output .= ' <div>
        <h5>No notifications found!</h5>
        </div> ';
    }

    $data = array(
        'list' => $output,
        'count' => $count,
        'title' => $title,
        'content' => $content,
        'dateadded' => $date,
        'deleteid' => $deleteid
    );

    echo json_encode($data);
}