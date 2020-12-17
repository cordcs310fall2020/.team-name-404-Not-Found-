<?php 
// session_start();
include("includ/db.php");
?>



<?php
$product_id="";
$product_id=$_SESSION['product_id'];
$error = "";
$comment_name = "";
$comment_content = "";
$parent_comment_id="";
$_comment_sender_name="";
$output="";

if (isset($_POST['submit_comment'])){

    if(empty($_POST['comment_name'])){
        $error .= '<p class="errorMessage">Name is required</p>';
    }else{
        $comment_name = $_POST['comment_name'];
    }

    if(empty($_POST['comment_content'])){
        $error .= '<p class="errorMessage">Comment is required</p>';
    }else{
        $comment_content = $_POST['comment_content'];
    }

    if($error == ''){

            // --------------------------------------------------------------------
            //Inserting in the database
            // --------------------------------------------------------------------

            try {
                $sql =$conn->prepare("INSERT INTO comments 
                (product_id, parent_comment_id, comment, comment_sender_name, comment_status) 
                VALUES (:product_id, :parent_comment_id, :comment, :comment_sender_name, :comment_status)
                ");

                $sql->bindParam(':product_id', $product_id);
                $sql->bindParam(':parent_comment_id', $parent_comment_id);
                $sql->bindParam(':comment',$comment);
                $sql->bindParam(':comment_sender_name', $comment_sender_name);
                $sql->bindParam(':comment_status', $comment_status);


                $product_id=$_SESSION['product_id'];
                $parent_comment_id= $_POST['comment_id'];
                $comment= $_POST['comment_content'];
                $comment_sender_name= $_POST['comment_name'];
                $comment_status="NotApproved";// passing values like this.. ok??

                $sql->execute();
                
                $error = '<label class="text-success">Comment Added</label>';

            // $lastID = $conn->lastInsertId();
            // $_SESSION['user_id']=$lastID;


            // header("location: thank-you/");

            }catch(PDOException $e) {
                echo "Insert failed: " . $e->getMessage();
            }

            // redirecting to the same page
            //https://stackoverflow.com/questions/8130990/how-to-redirect-to-the-same-page-in-php
            header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
            exit;
        }

}

?>



<head>
	<title>Comments</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css">
</head>
<style type="text/css">
    body{
        background-color: blue;
    }

    .errorMessage{
        color:red;
    }
</style>
<body>

    <span id="error" class="errorMessage"></span><?php echo $error; ?>
    

	<h1>Comments</h1>
	<form id="form1" id="comment_form" name="form1" enctype="multipart/form-data" action="" method="POST">
        <div>
            <label for="comment_name"></label>
            <input type="text" name="comment_name" id="comment_name" placeholder="Enter Name" />
        </div>
        <div >
            <label for="comment_content"></label>
            <textarea name="comment_content" id="comment_content"  placeholder="Enter Comment" rows="5"></textarea>
        </div>
        <div>
            <input type="hidden" name="comment_id" id="comment_id" value="0" />
            <input type="submit" name="submit_comment" id="submit" value="Submit" />
        </div>



	</form>

    <span id="comment_message"></span>
   <br />
   <div id="display_comment"></div>
  </div>


  <?php
//--------------------------------------------------------------------
//Fetch values
//--------------------------------------------------------------------

$sqla =$conn->prepare("SELECT * FROM comments WHERE comment_status='Approved' AND product_id= $product_id ORDER BY comment_id desc");
// $sqla->bindParam(':id', $id);
// $id=$_SESSION['login_user_id'];
$sqla->execute();

$result= $sqla->setFetchMode(PDO::FETCH_ASSOC);
$result= $sqla->fetchAll();

// //Closing the database connection
// $conn=null;

?>

<?php

foreach($result as $row)
{
 $output .= '
 <div class="comment_box">
  <div class="comment_box_header">By <b>'.$row["comment_sender_name"].'</b> on <i>'.$row["date"].'</i></div>
  <div class="comment_box_body">'.$row["comment"].'</div>
  <div class="comment_box_footer" align="right"><button type="button" class="reply" name="reply_comment" id="'.$row["comment_id"].'">Reply</button></div>
 </div>
 ';

}

echo $output;

?>








</body>


