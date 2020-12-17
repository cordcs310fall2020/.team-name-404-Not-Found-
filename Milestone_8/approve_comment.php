<?php 
include("includ/db.php");
?>
<style>
   
    .comment_box_body{
       /* color: black;*/
        background-color: blue;
        opacity: 0.7;
        color: white;

    }
<?php include 'css/styles.css'; ?>
</style>


<?php

$output="";
?>



<?php

 
 ?>

<?php
if (isset($_POST['approve_comment'])){
    try {
        $sql =$conn->prepare("UPDATE comments   
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
    unset($_POST['approve_comment']);

}

   

 ?>





<?php
//--------------------------------------------------------------------
//Fetch values
//--------------------------------------------------------------------

$sqla =$conn->prepare("SELECT * FROM comments WHERE comment_status='NotApproved' ORDER BY comment_id");

$sqla->execute();

$result= $sqla->setFetchMode(PDO::FETCH_ASSOC);
$result= $sqla->fetchAll();

// //Closing the database connection
// $conn=null;

?>

<body>
    <form id="form1" id="approve_form" name="form1" enctype="multipart/form-data" action="" method="POST">
<?php


foreach($result as $row)
{
 $output .= '
 <div class="comment_box">
  <div class="comment_box_header">By <b>'.$row["comment_sender_name"].'</b> on the product <b>'.$row["product_id"].'</b> on<i>'.$row["date"].'</i></div>
  <div class="comment_box_body">'.$row["comment"].'</div>
  <div class="comment_box_footer" align="right"><button type="submit" class="reply" value= "'.$row["comment_id"].'" name="approve_comment" id="approve_comment">Approve</button></div>
 </div>
 ';

}

echo $output;

?>
</form>
</body>


