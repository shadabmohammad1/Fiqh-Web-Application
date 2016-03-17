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
		<title>Maintainer Panel</title>
	</head>
	<body>

		<?php
		require_once ('navbar.php');
		?>
		<div class="container">
			<?php
                        $lineNumber= 0;
			$chapterNumber= 0;
			$pageNumber=0;
                        $titleno=0;
                        $duplicate=0;
                        $inputtext="";
                        $check="";
                        $replace="";
			if (isset($_POST['submit']))
			{
				include_once 'config.php';
				$inputtext= $_POST['inputtext'];
				$lineNumber= $_POST['linenum'];
				$chapterNumber= $_POST['chapter'];
				$pageNumber=$_POST['pagenum'];
                                
				$lineKey= $lineNumber+100*$pageNumber+1000000*$chapterNumber;
                                $mysqli= new mysqli("localhost", "root", "","minordb");
                                $sql="SELECT * FROM maindata WHERE linekey=".$lineKey;
                                    $list= $mysqli->query($sql);
                                    $record = $list->fetch_array();
                                    if(!empty($record))
                                        $duplicate=1;
                                            
                                    $str=explode("\n", $inputtext);
                                
                                    
                                
                                if(!empty($_POST['replace']))
                                {
                                    $replace="checked";
                                }
                                
                                else
                                    $replace="";
                                
                                    if(!empty($_POST['title']))
                                    $titleno=$_POST['title'];
                                    else
                                        $titleno=0;
                                
                                    if(!empty($_POST['replace']) && $duplicate==1)
                                {
                                    $sql="DELETE FROM maindata WHERE linekey=".$lineKey;
                                    $data=mysql_query($sql);
                               
                                    $duplicate=0;
                                }
                                    $str="";
                                    $str=explode("\n", $inputtext);
                                    
                                    
                                    $i=0;
                                   if($duplicate==0)
                                   {
                                       
                                       while(!empty($str[$i]))
                                       {
                                           
                                          if(strlen($str[$i])>70)
                                          {
                                              $sub2=$str[$i];
                                              echo $sub2;
                                              while(1)
                                              {
                                              $pos=strpos($sub2," ",70);
                                             
                                              $sub=  substr($sub2,0,$pos);
                                              echo $sub;
                                              $sql="INSERT INTO maindata VALUES($lineKey,\"$sub\",$titleno)";
                                              $data=mysql_query($sql);
                                              $lineKey++;
                                              $sub2=  substr($sub2, $pos);
                                              echo strlen($sub2);
                                              if(strlen($sub2)<=70)
                                                  break;
                                              }
                                              $sql="INSERT INTO maindata VALUES($lineKey,\"$sub2\",$titleno)";
                                              $data=mysql_query($sql);
                                          }
                                      else    
                                    $sql="INSERT INTO maindata VALUES($lineKey,\"$str[$i]\",$titleno)";
                                    $data=mysql_query($sql);
                                    $i++;
                                    $lineKey++;
                                       }
                                    $inputtext="";
                                   }
                                   
                                   
                                   if(!empty($_POST['next']))
                                {
                                    if($duplicate==0)
                                    $lineNumber+=$i;
                                  
                                    $check="Checked";
                                }
                                  
				
				
			}
			?>

			<form action="<?php echo($_SERVER["PHP_SELF"]); ?>" method="POST" role="form" class="form-inline">
			<div class="row">
				<div class="form-group col-md-2">
					<div class="input-group">
						<div class="input-group-addon">
							Ch
						</div>
						<?php echo '<input class="form-control" name="chapter" type="text" value="'.$chapterNumber.'" maxlength="3" required="">'?>
					</div>
				</div>
				<div class="form-group col-md-2">
					<div class="input-group">
						<div class="input-group-addon">
							Pg
						</div>
						<?php echo '<input class="form-control" type="text" name="pagenum" value="'.$pageNumber.'" maxlength="4" required="">'?>
					</div>
				</div>

				<div class="form-group col-md-2">
					<div class="input-group">
						<div class="input-group-addon">
							Line
						</div>
						<?php echo '<input class="form-control" type="text" name="linenum" value="'.$lineNumber.'" maxlength="2" required>'?>
					</div>
				</div>
				
				<div class="form-group col-md-1">
					<div class="input-group" style="padding:0px;">
                                            <div> 
                                                <h4><span class="label label-primary"> <?php echo '<input type="checkbox" class="style3" name="next" value="Yes" '.$check.'>'?> Next</span></h4>
                                            </div>
                                        </div>
				</div>
                            
                            <div class="form-group col-md-1">
					<div class="input-group" style="padding:0px;">
                                            <div> 
                                                <h4><span class="label label-danger"> <?php echo '<input type="checkbox" class="style3" name="replace" value="Yes" '.$replace.'>'?> Replace</span></h4>
                                            </div>
                                        </div>
				</div>
                            
                            
				
				</div>
				<div class="row">
					<div class="form-group col-md-8" style=" padding: 15px;">
					<?php echo '<textarea class="form-control" name="inputtext"  rows="3" style="width:100%; max-width: 1000px">'.$inputtext.'</textarea>'?>
                                            
					</div>	
                                    
                                    <?php if($duplicate==1){
                                    echo '<div class="form-group col-md-4">  <div class="alert alert-danger" role="alert">Entered Data is Already Present in Database</div> </div>';}
                                  ?>
				</div>
                                <div class="row">
					<div class="form-group col-md-2">
					<div class="input-group">
						<div class="input-group-addon">
							Normal Line
						</div>
						<?php echo '<input class="form-control" name="title" type="radio" maxlength="3" value=0 >'?>
					</div>
                                        </div>
                                    
                                        <div class="form-group col-md-2">
					<div class="input-group">
						<div class="input-group-addon">
							Main Title
						</div>
						<?php echo '<input class="form-control" name="title" type="radio" maxlength="3" value=1 >'?>
					</div>
                                        </div>
                                    
                                        <div class="form-group col-md-2">
					<div class="input-group">
						<div class="input-group-addon">
							Subtitle
						</div>
						<?php echo '<input class="form-control" name="title" type="radio" maxlength="3" value=2 >'?>
					</div>
                                        </div>
                                    
                                        <div class="form-group col-md-2">
					<div class="input-group">
						<div class="input-group-addon">
							Heading
						</div>
						<?php echo '<input class="form-control" name="title" type="radio" maxlength="3" value=3 >'?>
					</div>
                                        </div>
				</div>
                            
                                
				<div class="col-md-8" style="padding:0px;">
				<input type="submit" class="btn btn-primary btn-block" name="submit" value="Submit"/>
				</div>

			</form>
		</div>

		<?php
		require_once ('footer.php');
		?>
	</body>

</html>