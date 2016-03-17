<?php


$key=$_REQUEST['key'];






echo " <div class='panel panel-success col-md-8'>"
                    .'<div class="panel-heading">'
                       .' <h4 class="panel-title">'; 


        


$currentchapter=1;
 $currentpage=1;
                        if(!empty($key))
                            $currentchapter=(int)($key/1000000);
                            else
                            {
                                $currentchapter=1;
                                $currentpage=1;
                            }   
                        echo 'Chapter '.$currentchapter.'</h4>';
                    echo '</div>' 
                    .'<div class="panel-body">';
                    
                    echo '<div class="pageno" >'
                    .'<div class="btn-toolbar text-center" role="toolbar">'
                            .'<div class="btn-group-justified">';
                               $mysqli= new mysqli("localhost", "root", "","minordb");
                             
                                $sql="SELECT * FROM maindata WHERE linekey>=".(((int)($key/1000000))*1000000)." AND linekey<".(((int)($key/1000000))*1000000+1000000)." ORDER BY linekey";
                                $list= $mysqli->query($sql);
                                $chpage=1;
                                $isfirst=1;
                             while($record = $list->fetch_array()){
                                 $line=$record['linekey']%100;
                                 $page=(($record['linekey']-$line)%1000000)/100;
                                 
                                 if($isfirst==1){
                                     echo '<button type="button" class="btn btn-default" onclick="showPage('.$record['linekey'].')" >'.$page.'</button>';
                                     $isfirst=0;
                                 }
                                    if($chpage!=$page && $isfirst==0){
                                    echo '<button type="button" class="btn btn-default" onclick="showPage('.$record['linekey'].')" >'.$page.'</button>';
                                    $chpage=$page;
                                    }
                                    
                                }
                               
                                
                   echo '</div>'
                        .'<div class="btn-group"></div>'
                        .'<div class="btn-group"></div>'
                        .'</div>'                                       
                .'</div>';
                    
                    
                        
                            $currentpage=((int)($key/100))*100;
                               include_once 'config.php';
        $mysqli= new mysqli("localhost", "root", "","minordb");
            $sql="SELECT * FROM maindata WHERE linekey>=".($currentpage)." AND linekey<".($currentpage+100)." ORDER BY linekey";
            $list= $mysqli->query($sql);
			
            while($record = $list->fetch_array()){
                
                $mysqli2= new mysqli("localhost", "root", "","minordb");
            $sql2="SELECT * FROM tagdata WHERE linekey=".$record['linekey']."";
            
            $list2= $mysqli2->query($sql2);
		$str=$record['data'];
                $linkfound=0;
            if($record2 = $list2->fetch_array()){
                $link=$record2['link'];
                 $hlink="<a href='$link' onclick=\"javascript:void window.open('$link','1415250218859','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;\"/>";
                
                $str= str_ireplace($record2['data'],$hlink.$record2['data']."</a>",$str);
                
            }
                
                
                if($record['titleno']==1)
                echo '<h2>'.$str.'</h2></br>';
                if($record['titleno']==2)
                echo '<h4>'.$str.'</h4></br>';
                if($record['titleno']==3)
                echo '<h5>'.$str.'</h5></br>';
                if($record['titleno']==0)
                echo $str.'</br>';
            }
                       
              echo  '</div>'
            .'</div>';
           
