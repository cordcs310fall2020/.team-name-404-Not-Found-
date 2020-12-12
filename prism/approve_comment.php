<?php 
include("dbtest.php");
?>
<style>
<?php include 'css/styles.css'; ?>
</style>

<?php  
if (isset($_POST['home'])){
	header('location: home.php');
}
 ?>




<?php

$output="";
?>
<!-- <script>

function aaalert(){
    alert("hello!");
}
</script> -->


<?php

    // if (isset($_POST['approve_comment'])){
    //     try {
    //         $sql =$conn->prepare("UPDATE tbl_comment   
    //                                     SET comment_status = :comment_status,
    //                                     WHERE comment_id=:comment_id");
    //             $sql->bindParam(':comment_status', $comment_status);
    //             $sql->bindParam(':comment_id', $comment_id);
             
    //             $comment_status="Approved";
    //             $comment_id=$_POST['approve_comment'];
    //         
    //             $sql->execute();
                
    //     }catch(PDOException $e) {
    //             echo "Update failed: " . $e->getMessage();
    //     }
    //     // header('location: approve_comment.php');
    // }

    // if (isset($_POST['approve_comment'])){
    //     try {
    //         $sql =$conn->prepare("UPDATE tbl_comment   
    //                                     SET comment_status = :comment_status,
    //                                     WHERE comment_id=:id");
    //             $sql->bindParam(':comment_status', $comment_status);
    //             $sql->bindParam(':id', $id);
             
    //             $comment_status="Approved";
    //             $id=$_POST['approve_comment'];
                
    //             $sql->execute();
                
    //     }catch(PDOException $e) {
    //             echo "Update failed: " . $e->getMessage();
    //     }
    //     // header('location: approve_comment.php');
    // }
 ?>

<?php
if (isset($_POST['approve_comment'])){
    try {
        $sql =$conn->prepare("UPDATE tbl_comment   
                                    SET  comment_status = :comment_status
                                    WHERE comment_id=:id");
            $sql->bindParam(':comment_status', $comment_status);
            $sql->bindParam(':id', $id);
            $comment_status="Approved";
            $id=$_POST['approve_comment'];

            $sql->execute();
    
    }catch(PDOException $e) {
            echo "Update failed: " . $e->getMessage();  
    }

    // header('location: approve_comments.php');
}



    // if (isset($_POST['approve_comment'])){
    //     try {
    //         $sql =$conn->prepare("UPDATE tbl_comment   
    //                                     SET parent_comment_id = :parent_comment_id,
    //                                     comment = :comment,
    //                                     comment_sender_name = :comment_sender_name,
    //                                     comment_status = :comment_status
    //                                     WHERE comment_id=:id");

    //             $sql->bindParam(':parent_comment_id', $parent_comment_id);
    //             $sql->bindParam(':comment', $comment);
    //             $sql->bindParam(':comment_sender_name', $comment_sender_name);
    //             $sql->bindParam(':comment_status', $comment_status);
    //             $sql->bindParam(':id', $id);
        
    //             // $id=get_id_session($_SESSION['user']);
    //             // $comment_status="Approved";
    //             // $parent_comment_id=$_POST['comment_id'];
    //             // $comment=$_POST['comment_content'];
    //             // $comment_sender_name=$_POST['comment_name'];
    //             // $id=$_POST['approve_comment'];

    //             $comment_status="Approved";
    //             $parent_comment_id=0;
    //             $comment="new";
    //             $comment_sender_name="delete";
    //             $id=$_POST['approve_comment'];


    //         // $last_name=$_POST['last_name'];
    //             $sql->execute();
        
    //     }catch(PDOException $e) {
    //             echo "Update failed: " . $e->getMessage();  
    //     }

    //     // header('location: approve_comments.php');
    // }




   

 ?>





<?php
//--------------------------------------------------------------------
//Fetch values
//--------------------------------------------------------------------

$sqla =$conn->prepare("SELECT * FROM tbl_comment WHERE comment_status='NotApproved' ORDER BY comment_id");
// $sqla->bindParam(':id', $id);
// $id=$_SESSION['login_user_id'];
$sqla->execute();

$result= $sqla->setFetchMode(PDO::FETCH_ASSOC);
$result= $sqla->fetchAll();

// //Closing the database connection
// $conn=null;

?>

<body>
    <form id="form1" id="approve_form" name="form1" enctype="multipart/form-data" action="" method="POST">
    <input type="submit" name="home" id="home" value="Go home" />
<?php


foreach($result as $row)
{
 $output .= '
 <div class="comment_box">
  <div class="comment_box_header">By <b>'.$row["comment_sender_name"].'</b> on <i>'.$row["date"].'</i></div>
  <div class="comment_box_body">'.$row["comment"].'</div>
  <div class="comment_box_footer" align="right"><button type="submit" class="reply" value= "'.$row["comment_id"].'" name="approve_comment" id="approve_comment">Approve</button></div>
 </div>
 ';

}

echo $output;

?>
</form>
</body>


