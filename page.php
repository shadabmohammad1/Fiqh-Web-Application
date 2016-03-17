<html>
<?php 
$currentpage=((int)($_GET['key']/100))*100;
                            $mysqli= new mysqli("localhost", "root", "","minordb");
                            $sql="SELECT * FROM maindata WHERE linekey>=".$currentpage." AND linekey<".($currentpage+100)."ORDER BY linekey ";
                        $list= $mysqli->query($sql);
				
            while($record = $list->fetch_array())
            {
                echo $record['data'];
            }
?>
</html>