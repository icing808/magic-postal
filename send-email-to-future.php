<?php
    session_start();

    include("includes/db-config.php");
    
    $count = $pdo->query("SELECT count(1) as c FROM `user_postcard` WHERE `status` = 1 and `send_date` = CURRENT_DATE;");
    
    $stmt = $pdo->prepare("SELECT * FROM `user_postcard` WHERE `status` = 1 and `send_date` = CURRENT_DATE ORDER BY `id`;");
     
    try{
         $stmt->execute();
         
     } catch(PDOException $e) {   
         echo 'Error: ' . $e->getMessage(); 
     }
    
     require './PHPMailer/PHPMailerAutoload.php';
     
     function sendMail($to, $title, $content, $id) {
        
    
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.qq.com';
        $mail->Username = '18081903@qq.com';
        $mail->Password = 'mnybmbxkegicbiad';
        $mail->setFrom('18081903@qq.com', 'MAGIC POSTAL');
        $mail->addAddress($to);
        $mail->CharSet = 'UTF-8';
        $mail->isHTML(true);
        $mail->Subject = $title;
        $mail->Body = $content;
        $mail->addAttachment('./images/phpmailer.png');
    
        if(!$mail->send()) {
            echo 'send failure: id=' . $id . '-------' . $mail->ErrorInfo;
        } else {
            echo "send success: id=" . $id;
            changeCardStatus($id);
        }
    }
    
    //var_dump(sendMail('icing808@aliyun.com','meeting notice','通知：<p>today afternoon will have a meeting,please attend the meeting on time</p>'));
    
    foreach($count as $s){
        if ($s['c']=='0'){
            echo ("No result");
        } else {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $to = $row['send_to'];
                $title = "From Magic Postal's postcard";
                $content = $row['content'];
                sendMail($to,$title,$content,$row['id']);
                
            }
        }
    }

    function changeCardStatus($Id){
        include("includes/db-config.php");

        $stmt2 = $pdo->prepare("UPDATE `user_postcard` SET `status` = 2, `modified_on` = CURRENT_TIMESTAMP() 
                                WHERE `id` = '$Id';"); 

        try{
            $stmt2->execute();
        } catch(Exception $e) {   
            echo 'Error: ' . $e->getMessage(); 
        }
        echo "<div>Send cards finish!</div>";
    }

?>
