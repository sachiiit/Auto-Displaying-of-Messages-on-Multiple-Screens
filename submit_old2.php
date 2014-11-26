<?php

//getting variables
$screen = $_POST['screen']; 
$nickname = $_POST['nickname'];
$new_topic = $_POST['new_topic']; 
$topic_title = $_POST['topic_title']; 
$message = $_POST['message'];

echo $screen.'<br/><br/>'; 
echo $nickname.'<br/><br/>'; 
echo $new_topic.'<br/><br/>'; 
echo $topic_title.'<br/><br/>'; 
echo $message.'<br/><br/>';

//database work
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
echo "DB Connected";
echo '<br>';
}


// SQL to create table
/*$sql = "CREATE TABLE Messages (
screen VARCHAR(30) NOT NULL,
nickname VARCHAR(30) NOT NULL,
topic VARCHAR(30) NOT NULL,
topic_title VARCHAR(30) NOT NULL,
message VARCHAR(50)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Messages created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
*/

$sUsername="Joney";
$sMessage="Hello";

//echo $screen.'<br/><br/>'; 
//echo $nickname.'<br/><br/>'; 
//echo $new_topic.'<br/><br/>'; 
//echo $topic_title.'<br/><br/>'; 
//echo $message.'<br/><br/>';

$sql = "INSERT INTO `s_chat_messages` SET `screen`='{$screen}', `nickname`='{$nickname}', `newtopic`='{$new_topic}',`topictitle`='{$topic_title}', `message`='{$message}',`when`=UNIX_TIMESTAMP()";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();

?>