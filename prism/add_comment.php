<?php 
include("dbtest.php");
?>

<?php
$error = '';
$comment_name = '';
$comment_content = '';

if(empty($_POST["comment_name"]))
{
 $error .= '<p class="text-danger">Name is required</p>';
}else
{
 $comment_name = $_POST["comment_name"];
}

if(empty($_POST["comment_content"]))
{
 $error .= '<p class="text-danger">Comment is required</p>';
}else
{
 $comment_content = $_POST["comment_content"];
}

if($error == ''){

		// --------------------------------------------------------------------
		//Inserting in the database
		// --------------------------------------------------------------------

		try {
			$sql =$conn->prepare("INSERT INTO tbl_comment 
            (parent_comment_id, comment, comment_sender_name) 
            VALUES (:parent_comment_id, :comment, :comment_sender_name)
            ");

            $sql->bindParam(':parent_comment_id', $parent_comment_id);
            $sql->bindParam(':comment',$comment);
            $sql->bindParam(':comment_sender_name', $comment_sender_name);


            $parent_comment_id= $_POST['parent_comment_id'];
            $comment= $_POST['comment'];
            $comment_sender_name= $_POST['comment_sender_name'];

            $sql->execute();
            
            $error = '<label class="text-success">Comment Added</label>';

        // $lastID = $conn->lastInsertId();
        // $_SESSION['user_id']=$lastID;


		// header("location: thank-you/");

		}catch(PDOException $e) {
			echo "Insert failed: " . $e->getMessage();
		}


        $data = array(
            'error'  => $error
           );
           
           echo json_encode($data);
    }


?>

