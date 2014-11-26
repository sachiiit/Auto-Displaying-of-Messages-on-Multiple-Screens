<!DOCTYPE html>
<meta http-equiv="refresh" content="5">
	
	
	<head>
        <meta charset="UTF-8" />
        
        <title>Displaying Messages</title>
       
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/stylescreen.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
	
        <div class="container">
		
      
			
            <header>
                <h1>Displaying Messages  <span>from users</span></h1>

            </header>
			
			
            <section>				
                <div id="container_demo" >
                   
				   
                    <div id="wrapper">
                        <div id="login" class="animate form" >
							<?php
							require_once('inc/chat.incscreen.php');
							$oSimpleChat = new SimpleChat();
							echo $oSimpleChat->getMessages();
							?>
                        </div>

                      
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>