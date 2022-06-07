
<?php
//runs twice an hour

// Database configuration


//live server hostinger
$servername = "localhost";
$username = "u284700232_tsit";
$password = "Immy@200883";
$database = "u284700232_tsit";

// // Get connection object and set the charset
$conn = mysqli_connect($servername, $username, $password, $database);
$conn->set_charset("utf8");



// Get All Table Names From the Database
$tables = array();
$sql = "SHOW TABLES";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_row($result)) {
    $tables[] = $row[0];
}

$sqlScript = "";
foreach ($tables as $table) {
    
    // Prepare SQLscript for creating table structure
    $query = "SHOW CREATE TABLE $table";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    
    $sqlScript .= "\n\n" . $row[1] . ";\n\n";
    
    
    $query = "SELECT * FROM $table";
    $result = mysqli_query($conn, $query);
    
    $columnCount = mysqli_num_fields($result);
    
    // Prepare SQLscript for dumping data for each table
    for ($i = 0; $i < $columnCount; $i ++) {
        while ($row = mysqli_fetch_row($result)) {
            $sqlScript .= "INSERT INTO $table VALUES(";
            for ($j = 0; $j < $columnCount; $j ++) {
                $row[$j] = $row[$j];
                
                if (isset($row[$j])) {
                    $sqlScript .= '"' . $row[$j] . '"';
                } else {
                    $sqlScript .= '""';
                }
                if ($j < ($columnCount - 1)) {
                    $sqlScript .= ',';
                }
            }
            $sqlScript .= ");\n";
        }
    }
    
    $sqlScript .= "\n"; 
}

if(!empty($sqlScript))
{
    // Save the SQL script to a backup file
    $backup_file_name = $database . '_backup_' . time() . '.sql';
    $fileHandler = fopen($backup_file_name, 'w+');
    $number_of_lines = fwrite($fileHandler, $sqlScript);
    fclose($fileHandler); 

    // Download the SQL backup file to the browser
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($backup_file_name));
    ob_clean();
    flush();
    // readfile($backup_file_name);
    // exec('rm ' . $backup_file_name); 



    // $from_email         = 'databackup@fingertips.co.in'; //from mail, sender email address
    // $recipient_email    = 'anzarkhan.rain@gmail.com'; //recipient email address
    // $message = "Backup Added ".time();
    // $subject = "Fingertips Backup File Share";

    // //file things

    // $type = "application/octet-stream";
    // $name = "fingertips_backup".time().".sql";

    // $encoded_content = chunk_split(base64_encode($sqlScript));
    // $boundary = md5("random"); // define boundary with a md5 hashed value


    //  //header
    //  $headers = "MIME-Version: 1.0\r\n"; // Defining the MIME version
    //  $headers .= "From:".$from_email."\r\n"; // Sender Email
    //  $headers .= "Reply-To: ".$from_email."\r\n"; // Email address to reach back
    //  $headers .= "Content-Type: multipart/mixed;"; // Defining Content-Type
    //  $headers .= "boundary = $boundary\r\n"; //Defining the Boundary
          
    //  //plain text
    //  $body = "--$boundary\r\n";
    //  $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
    //  $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
    // //  $body .= chunk_split(base64_encode($message));
          
    //  //attachment
    //  $body .= "--$boundary\r\n";
    //  $body .="Content-Type: $type; name=".$name."\r\n";
    //  $body .="Content-Disposition: attachment; filename=".$name."\r\n";
    //  $body .="Content-Transfer-Encoding: base64\r\n";
    //  $body .="X-Attachment-Id: ".rand(1000, 99999)."\r\n\r\n";
    //  $body .= $encoded_content; // Attaching the encoded file with email

    //  $sentMailResult = mail($recipient_email, $subject, $body, $headers);


    //  echo '<br><br><br><br><br><br><br>'.$body;
 
    //  if($sentMailResult)
    //  {
    //     echo "File Sent Successfully.";
    //     // unlink($name); // delete the file after attachment sent.
    //  }
    //  else
    //  {
    //     die("Sorry but the email could not be sent.
    //                  Please go back and try again!");
    //  }

// echo $backup_file_name;
// Recipient 
$to = 'databackups.anzarkhan@gmail.com'; 
 
// Sender 
$from = 'databasebackup@teslainu.com'; 
$fromName = 'Tesla inu'; 
 
// Email subject 
$subject = 'Email with database backup scheduled for every 30 min';  
 
// Attachment file 
$file = $backup_file_name; 
 
// Email body content 
$htmlContent = ' 
<h3>This email is auto generated with database copy</h3> 
<p>After the attack of 04-10-2021</p> 
'; 
 
// Header for sender info 
$headers = "From: $fromName"." <".$from.">"; 
 
// Boundary  
$semi_rand = md5(time());  
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
 
// Headers for attachment  
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
 
// Multipart boundary  
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  
 
// Preparing attachment 
if(!empty($file) > 0){ 
    if(is_file($file)){ 
        $message .= "--{$mime_boundary}\n"; 
        $fp =    @fopen($file,"rb"); 
        $data =  @fread($fp,filesize($file)); 
 
        @fclose($fp); 
        $data = chunk_split(base64_encode($data)); 
        $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .  
        "Content-Description: ".basename($file)."\n" . 
        "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .  
        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
    } 
} 
$message .= "--{$mime_boundary}--"; 
$returnpath = "-f" . $from; 
 
// Send email 
$mail = @mail($to, $subject, $message, $headers, $returnpath);  
 
// Email sending status 
// echo $mail?"<h1>Email Sent Successfully!</h1>":"<h1>Email sending failed.</h1>"; 

unlink($backup_file_name);
}
?>