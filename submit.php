
<!DOCTYPE html>
<?php



									//getting variables
									
									//$ttime=UNIX_TIMESTAMP();
									//$date = date_create();
									//$ttime=date_timestamp_get($date);
									
									$screen = $_POST['screen']; 
									$nickname = $_POST['nickname'];
									$new_topic = $_POST['new_topic']; 
									$topic_title = $_POST['topic_title']; 
									$message = $_POST['message'];
									$topic_title=strtolower($topic_title);
									if($new_topic=='title0')
									{
										$new_topic=$topic_title;
										}
									?>


    <head>
        <meta charset="UTF-8" />
        
        <title>Message Center</title>
       
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/submitstyle.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
		
      
			
            <header>
                <h1>Message <span>Center</span></h1>

            </header>
			
			
            <section>				
                <div id="container_demo" >
                    
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form action="index (2).php"> 
                                <h1>Message Sent Succesfully.</h1> 
								
								<?php

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
									//echo "DB Connected";
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
									
									//$tm=time();
									
									$sql = "INSERT INTO `s_chat_messages` SET `screen`='{$screen}', `nickname`='{$nickname}', `newtopic`='{$new_topic}',`topictitle`='{$topic_title}', `message`='".addslashes($message)."',`when`=UNIX_TIMESTAMP()";
									
									//$sql = "INSERT INTO s_chat_messages (screen, nickname, newtopic, topictitle, message)
                                      //    VALUES ('$screen', '$nickname', '$new_topic', '$topic_title', '".addslashes($message)."')";
									
									//$sql = "INSERT INTO s_chat_messages (`when`) VALUES (`$tm`)";
									
									
									if ($conn->query($sql) === TRUE) 
									{
										echo '    <p class="signin button" style="text-align: center"> 
												<input type="submit" value="Submit More Messages" width="600px"/> 
													</p>';
										
									} else 
									{
										echo "Error: " . $sql . "<br>" . $conn->error;
									}
									$conn->close();
									?>			
                            </form>
                        </div>
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>