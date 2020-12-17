<?php 
include("../includ/db.php");
?>
<style>
    #main-content{
        background-color: blue;
        opacity: 0.7;
        color: white;
    }

<?php include 'css/styles.css'; ?>
</style>



<?php
$send_email="";
$user_message="";

$output="";
?>



<?php


if (isset($_POST['resolve_contact_form'])){
    try {
        //takes the email when clicked resolve to send the email
        $haha=$_POST['resolve_contact_form'];
        $ee= $conn->prepare("SELECT email, message from contact_form WHERE id=$haha");
        $ee->execute();
        $rr= $ee->setFetchMode(PDO::FETCH_ASSOC);
        $rr= $ee->fetchAll();
        $send_email=$rr[0]["email"];
        $user_message=$rr[0]["message"];



        $sql =$conn->prepare("UPDATE contact_form   
                                    SET  resolve_status = :resolve_status
                                    WHERE id=:id");
            $sql->bindParam(':resolve_status', $resolve_status);
            $sql->bindParam(':id', $id);
            
            $id=$_POST['resolve_contact_form'];
            $resolve_status="Resolved";

            $sql->execute();

        // --------------------------------------------------------------------
        // Sending Email
        // --------------------------------------------------------------------
        
        $to = $send_email; 
        $from = "prism@support.com";

        $subject = "Issue Resolved";
        $messages =  "Your following issue was resolved!!". "\n"; 
        $messages .= $user_message;

        $headers = "From:" . $from;
        mail($to,$subject,$messages,$headers);
    
    }catch(PDOException $e) {
            echo "Update failed: " . $e->getMessage();  
    }

}
   

 ?>





<?php
//--------------------------------------------------------------------
//Fetch values
//--------------------------------------------------------------------

$sqla =$conn->prepare("SELECT * FROM contact_form WHERE resolve_status='NotResolved' ORDER BY id");

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
{?>

    <div id="main-content">

        <h4><?php echo ($row["firstName"]);?> <?php echo($row["lastName"]);?> submitted the follwing information!</h4>

        <h3>Basic Information</h3>
        <label class="contact_form_label">First Name:</label><?php echo ($row["firstName"]); ?><br/>
        <label class="contact_form_label">Last Name:</label><?php echo($row["lastName"]); ?><br/>
        <label class="contact_form_label">Email:</label><?php echo($row["email"]); ?><br/>
        <label class="contact_form_label">Phone:</label><?php echo($row["phone"]); ?><br/>
        <label class="contact_form_label">Country:</label><?php echo($row["country"]); ?><br/>

        <h3>Support Information</h3>
        <label class="contact_form_label">Department:</label><?php echo($row["department"]); ?><br/>
        <label class="contact_form_label">Feedback Type:</label><?php echo($row["feedbackType"]); ?><br/>
        <label class="contact_form_label">Way Of Contact:</label><?php echo($row["wayOfContact"]); ?><br/>
        <label class="contact_form_label">Message:</label><?php echo($row["message"]); ?><br/>
        <label class="contact_form_label">Receive Notifications?:</label><?php echo($row["receiveNotifications"]); ?><br/>
        <label class="contact_form_label">Date Of Submission:</label><?php echo($row["date"]);?><br/>

        <div align="right">
        <button type="submit" class="reply" value="<?php echo ($row["id"]); ?>" name="resolve_contact_form" id="resolve_contact_form">Resolved!!
        </button>
    </div>
    </div>
        


        <br/>
    </div>

<?php  
}


?>
</form>
</body>


