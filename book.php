<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet" />
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" />
		<link rel="stylesheet" href="css/sticky-footer-navbar.css" />
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
                <script>
function showPage(key)
{
var xmlhttp;

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("data").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getContent.php?key="+key,true);
xmlhttp.send();
}
</script>
		<title>Book</title>
	</head>
        <body>

        <?php 
        require_once ('navbar.php');
        ?>
            <div class='row' >
                <div class='panel panel-success col-md-2'>
                    <div class="panel-heading">
						<h4 class="panel-title">Contents</h4>
                    </div>
                   
                    
                    <div class="panel-body">
        <?php    include_once 'config.php';
        $mysqli= new mysqli("localhost", "root", "","minordb");
            $sql="SELECT * FROM maindata WHERE titleno!=0 ORDER BY linekey";
            $list= $mysqli->query($sql);
		$isfirst=1;
                $totalpage=0;
               
            while($record = $list->fetch_array())
			{
			$key=$record['linekey'];	
			$line=$key%100;
                        $page=(($key-$line)%1000000)/100;
                        $chapter=(int)($key/1000000);
                        if($isfirst==1)
                            {
                            $chchange=$chapter;
                            echo '<li><a onclick="showPage('.$record['linekey'].')" name="chapter" value="'.$record['linekey'].'">Chapter '.$chapter.'</a>';
                            $isfirst=0;
                            }
                            if($record['titleno']==1){
                        if($chchange==$chapter )
                            { 
                            echo "<ol>".$record['data']."</ol>";
                            }
                        else
                            {
                            echo "</li>";
                            echo '<li><a onclick="showPage('.$record['linekey'].')" name="chapter" value="'.$record['linekey'].'">Chapter '.$chapter.'</a>';
                            echo "<ol>".$record['data']."</ol>";
                            $chchange=$chapter;
                            }
                            }
			}
                        echo "</li>";
            ?>
                </div>
                </div>
                <div class='page' id='data' >
                    
                </div>
                
            </div>
            
            
            
        </body>
</html>