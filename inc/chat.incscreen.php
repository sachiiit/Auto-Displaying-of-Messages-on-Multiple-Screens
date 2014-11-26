<?php
 # date_default_timezone_set(date_default_timezone_get());
 
// simple chat class
class SimpleChat {

    // DB variables
    var $sDbName;
    var $sDbUser;
    var $sDbPass;

    // constructor
    function SimpleChat() {
        //mysql_connect("localhost","username","password");
        $this->sDbName = 'database_name';
        $this->sDbUser = 'root';
        $this->sDbPass = '';
    }

    function getMessages() {
        $vLink = mysql_connect("localhost", $this->sDbUser, $this->sDbPass);

        //select the database
        mysql_select_db($this->sDbName);

        //returning the messages
        $vRes = mysql_query("SELECT * FROM `s_chat_messages` where screen='screen1' ORDER BY `when` DESC LIMIT 8");
		
		//$vRes = mysql_query("SELECT * FROM 's_chat_messages' ");
        $sMessages = '';
		
		
		
		$colorarray[0]='#99FFCC';
		$colorarray[1]='#99FF66';
		$colorarray[2]='#FFFF66';
		$colorarray[3]='#00CCFF';
		$colorarray[4]='#9999FF';
		$colorarray[5]='#FF00FF';
		$colorarray[6]='#FFFF99';
		$colorarray[7]='#FF8533';
		$colorarray[8]='#FFE4C4';
		$colorarray[9]='#FF7F50';
		$colorarray[10]='#BDB76B';
		$colorarray[11]='#DAA520';
		$colorarray[12]='#7CFC00';
		$colorarray[13]='#FFA07A';
		$colorarray[14]='#FF4500';
		$colorarray[15]='#DB7093';
		$colorarray[16]='#B0E0E6';
		$colorarray[17]='#708090';
		$colorarray[18]='#EE82EE';
		$colorarray[19]='#9ACD32';
		
		
		//declare a map variable
		$sMessages2 = 'Topics:    ';
		$ii=0;
		$vRes2 = mysql_query("SELECT DISTINCT `topictitle` FROM `s_chat_messages` where screen='screen1' ORDER BY ID DESC LIMIT 8");
		 if ($vRes2) 
		 {
            while($aMessages = mysql_fetch_array($vRes2)) 
			{
                $coloring[$aMessages['topictitle']]=$colorarray[$ii];
				$ii++;
				
               // $sMessages2 .= '<div class="message2">'  . '</div>';
            }
        } else 
		{
            $sMessages2 = 'DB error, create SQL table before';
        }
		
		foreach($coloring as $x => $x_value)
		{
			//echo $x;
			$query1="SELECT COUNT(*) FROM `s_chat_messages` where screen='screen1' and `topictitle`='".$x."'";
			//echo $query1;
			$result1 = mysql_query($query1);
			
			$count=mysql_result($result1, 0);
			//echo $count;
			$sMessages2.= '<span style="background-color:'.$x_value.' ">'. $x .'('.$count.')</span>';
			$sMessages2.= "&nbsp;";
		}
		
		

        // collecting list of messages
        if ($vRes) {
            while($aMessages = mysql_fetch_array($vRes)) {
				date_default_timezone_set('Asia/Kolkata');
                $sWhen = date("d-M-y (H:i:s) ", $aMessages['when']);
				$sMessages .= '<div class="message" style="background-color:'.$coloring[$aMessages['topictitle']].'">'  .'<b>'.'&nbsp'.$aMessages['nickname'] . ' ' ."(".($aMessages['topictitle']) .")</b>". ': ' . $aMessages['message'] . '<br><span><div align="right"><font size="3"><i>' . $sWhen . '&nbsp</i></font></div></span></div>';
				$sMessages.= '<hr style="color:white;margin:0;height=5px" >';
		   }
        } else {
            $sMessages = 'DB error, create SQL table before';
        }

        mysql_close($vLink);

        ob_start();
        require_once('chat_begin.html');
		
		echo '<font size="5">'.$sMessages2.'</font>';
		echo "<hr>";
		echo '<font size="3">'.$sMessages.'</font>';
        //echo $sMessages;
		
        require_once('chat_end.html');
        return ob_get_clean();
    }
}

?>
