<!DOCTYPE html>
<script type="text/javascript">
   function check_bad_words()
   {
		var data=document.getElementById("message").value;
		var b_word=["sex", "fuck", "assshole", "ass", "dick", "penis", "mother fucker", "fucker", "boobs", "boob", "Sonofabitch", "motherfucker", "pussy", 
					"ass","assfuck","fuckass","dumbass","dick","twat","skank","slut","bitch","cunt","douche","Ddouchebag", "son of a bitch"];
		
		for (i = 0; i < b_word.length; i++) 
		{
			if(data.search(b_word[i])!=-1)
			{	
				//alert('Bad Word Found');
				document.getElementById("message_alert").innerHTML = "Please don't write abusive/bad words.";
				return false;
			}
		}
			return true;
   }
   
   
   function func()
   {
   var e = document.getElementById("choosetopic");
	var strUser = e.options[e.selectedIndex].value;
	var f=document.getElementById("newtopic");
   
   if(strUser.localeCompare("title0")!=0)
   {
		f.value = strUser;
       f.readOnly = true;
   }
   else
   {
	f.value = "";
       f.readOnly = false;
   }
   }
   
   
   function setImage(file) {
    if(document.all)
        document.getElementById('prevImage').src = file.value;
    else
        document.getElementById('prevImage').src = file.files.item(0).getAsDataURL();
    if(document.getElementById('prevImage').src.length > 0) 
        document.getElementById('prevImage').style.display = 'block';
}

</script>


    <head>
        <meta charset="UTF-8" />
        
        <title>Message Center</title>
       
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
    
			<header>
                <h1>Message <span>Center</span></h1>
            </header>
	
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  autocomplete="on" onSubmit= "return check_bad_words();" method="post" action="submit.php" > 
                                <h1>Post a message</h1> 
								
								<p>
								<label for="screen" class="uname"> Select a screen </label>
								<br>
								<select name ="screen" style="width:443px; height:33px; display:block; font-weight: normal; font-size: 14px; color:grey; >
								  <option value="screen0">Select Screen</option>
								  <option value="screen1">screen 1</option>
								  <option value="screen2">screen 2</option>
								</select> 
								</p>
								
                                <p> 
                                    <label for="nickname" class="uname" data-icon="u" > Nick Name </label>
                                    <input id="nickname" name="nickname" required="required" type="text" placeholder="your nickname"/>
                                </p>
								
								
								<p>
								<label for="choosing_topic" class="uname"> Choose a topic </label>
								<br>
								<select name="new_topic" id='choosetopic' style="width:443px; height:33px; display:block; font-weight: normal; font-size: 14px; color:grey" onchange="func()">
								<option value="title0">New topic</option>
								
								<?php 
								//mysql_connect("localhost","username","password");
								$sDbName = 'database_name';
								$sDbUser = 'root';
								$sDbPass = '';
        
								$vLink = mysql_connect("localhost", $sDbUser, $sDbPass);
								//select the database
								mysql_select_db($sDbName);
								//returning the messages
								$vRes = mysql_query("SELECT DISTINCT `topictitle` FROM `s_chat_messages` ");
								//$vRes = mysql_query("SELECT * FROM `s_chat_messages` ");
								$sMessages = '';

								// collecting list of messages
								if ($vRes) 
								{
									while($aMessages = mysql_fetch_array($vRes)) 
									{
										//$sWhen = date("H:i:s", $aMessages['when']);
										//$sMessages .= '<div class="message">' . $aMessages['nickname'] . ': ' ."(".$aMessages['topictitle'] .")". ': ' . $aMessages['message'] . '<span>(' . $sWhen . ')</span></div>';
										$sMessages.= '<option value="'.$aMessages['topictitle'].'"> '.$aMessages['topictitle'].'</option>';
									}
									echo $sMessages;
								} 
								else 
								{
									$sMessages = 'DB error, create SQL table before';
								}

								mysql_close($vLink);
								?>

						
								</select> 
								</p>
                              
								<p>	
								 <label for="nickname" data-icon="e" >  Enter new topic</label>
								<input type="text" name="topic_title" id="newtopic" placeholder="Enter new topic name" >
								</p>
								
								<p>
								Write your message
								<textarea rows="4" cols="53" name="message" id="message" class="uname" placeholder="Enter the message" required="required" data-minlength="175" ></textarea>
								</p>
								

								<p>	
								 <label id="message_alert" style="color:red"></label>
								</p>
								
								
							
							    <p class="login button"> 
                                    <input type="submit" value="Post" /> 
								</p>
								
                            </form>
                        </div>
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>