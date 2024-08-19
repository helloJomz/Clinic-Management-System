<?php 

include '../dbcon.inc.php';
if(isset($_POST['view'])){
    
    $sql = "SELECT * FROM notification ORDER BY id DESC LIMIT 5 ";
    $result = mysqli_query($conn, $sql);
    $output = '';

    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){
            
            $output .= ' <li class="notif-li border-bottom rounded" id="'.$row['unseen'].'"><a href="#" id="'.$row['id'].'" class="text-bold text-italic text-decoration-none text-dark notif-btn">
                        <strong>'.$row['subject'].'</strong><br>
                        <small class="text-muted">'.substr_replace($row['content'], " ...", 35).'</small>
                        </a></li>
            ';


        }
    }else{
        $output .= ' <li class="notif-li text-center"><a href="#" class="text-decoration-none text-dark ">No notifications found</a></li>
        ';
    }

    $query = "SELECT * FROM notification WHERE status=0";
    $result1 = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result1);
    $data = array(
        'notification' => $output,
        'unseen_notification' => $count,
    );

    echo json_encode($data);
}

if(isset($_POST['notifid'])){

    $notifid = $_POST['notifid'];

    $updatesql = "UPDATE notification SET status=1, unseen=null WHERE id=$notifid";
    mysqli_query($conn, $updatesql);

    $query1 = "SELECT * FROM notification WHERE status=0";
    $result2 = mysqli_query($conn, $query1);
    $count1 = mysqli_num_rows($result2);

    $sql = "SELECT * FROM notification WHERE id=$notifid";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $subject = $row['subject'];
    $date = $row['dateadded'];
    $content = $row['content'];


    $data1 = array(
        'unseen_notification' => $count1,
        'subject' => $subject,
        'date' => $date,
        'content' => $content
    );

    echo json_encode($data1);
}

if(isset($_POST['expiredNotif'])){

    $sql = "SELECT * FROM stocks";
    $result = mysqli_query($conn, $sql);
    $time = time();
    while($row = mysqli_fetch_array($result)){

        if(strtotime($row['expiry_date']) <= $time){
            
            $realid = $row['id'];
            $id = $row['medicine_id'];
            $sql1 = "SELECT * FROM medicine WHERE id=$id";
            $result1 = mysqli_query($conn, $sql1);
            $medRow = mysqli_fetch_array($result1);

            $current_date = date('Y/M/D H:i:s');

            // CONTENTS OF NOTIF
            $title = $medRow['medicine']." "."is expired!";
            $content = 'Remove '.$medRow['medicine'].' with a quantity of '.$row['quantity'].' has been expired dated '.$row['expiry_date'].' and has been purchased dated '. 
                        $row['purchase_date'].', please remove remove the medicine from the shelf.';
            $timestamp = date("Y-m-d H:i:s");

            // SEND NOTIFICATION
            $notifSql = "INSERT INTO notification(subject, content, status, unseen, dateadded) 
                        VALUES('$title', '$content', 0, 'unseen-bg', '$current_date') ";
            mysqli_query($conn, $notifSql);
            
            // INSERT IN EXPIRED_STOCKS TABLE
            $medname = $medRow['medicine']; $medtype = $medRow['type']; $supplier = $row['supplier']; $expiredQty = $row['quantity']; 
            $pDate = $row['purchase_date']; $eDate = $row['expiry_date'];  $uniqid = str_shuffle($medname.uniqid().time());

            $expiredSql = "INSERT INTO expired_stocks(medname, medtype, supplier, quantity, purchase_date, expiry_date, uniqid) 
                          VALUES('$medname', '$medtype', '$supplier', $expiredQty, '$pDate', '$eDate', '$uniqid') ";
            mysqli_query($conn, $expiredSql);

            // DELETE THE EXPIRED FROM STOCKS
            $deleteSql = "DELETE FROM stocks WHERE id=$realid";
            mysqli_query($conn, $deleteSql);

        } // FOR MAIN IF
    } // FOR WHILE LOOP

}

if(isset($_POST['noStocks'])){

    $querymed   = "SELECT sum(quantity) as totalquantity, medicine_name, supplier FROM stocks GROUP BY medicine_name";
    $resultmed  = mysqli_query($conn, $querymed);
    
    while($row = mysqli_fetch_array($resultmed)){

       if($row['totalquantity'] <= 50){

           $title = 'Need stocks!';
           $content = $row['medicine_name']." current stock is ".$row['totalquantity']." please restock this medicine.";
           $timestamp = date("Y-m-d H:i:s");
           
            // SEND NOTIFICATION
            $notifSql = "INSERT INTO notification(subject, content, status, unseen, dateadded) 
                        VALUES('$title', '$content', 0, 'unseen-bg', '$current_date') ";
            mysqli_query($conn, $notifSql);

       }

    }


}

if(isset($_POST['emptyNotif'])){

    $sql = "SELECT * FROM stocks";
    $result = mysqli_query($conn, $sql);
    
    while($row = mysqli_fetch_array($result)){
        
        if($row['quantity'] == 0){

            $title = 'Empty stocks!';
            $content = "One of the stocks of ".$row['medicine_name']." has reached an empty quantity, this stock has been deleted from the system.";
            $timestamp = date("Y-m-d H:i:s");
            
            $deleteid = $row['id'];
            $deleteSql = "DELETE from stocks WHERE id=$deleteid ";
            mysqli_query($conn, $deleteSql);

             // SEND NOTIFICATION
             $notifSql = "INSERT INTO notification(subject, content, status, unseen, dateadded) 
                         VALUES('$title', '$content', 0, 'unseen-bg', '$current_date') ";
             mysqli_query($conn, $notifSql);
 
        }
    }
}

if(isset($_POST['notifdeleteid'])){

    $notifdeleteid = $_POST['notifdeleteid'];
    
    $sql = "DELETE FROM notification WHERE id=$notifdeleteid ";
    mysqli_query($conn, $sql);
}
