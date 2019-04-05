<?php
   include_once('include/config.php');
?>
<!DOCTYPE html>
<html>
    <head>
     <?php include_once('include/header.php');  ?>
    </head>
    <body>
       <div class="form-box" id="login-box" >
           <div class="header">Sign In</div>
		  
           <form action="login_db.php" method="post">
		   
		        <div class="body bg-gray">
                 <div class="form-group">
                    <input type="text" name="uname" class="form-control" placeholder="Email Address"/>
                   </div>
                   <div class="form-group">
                      <input type="password" name="password" class="form-control" placeholder="Password"/>
                   </div>         
				</div>
               <div class="footer">                                                               
                  <button type="submit" class="btn bg-blue btn-block">Sign me in</button>   
               </div>
            </form>
        </div>

        
	</body>
    <!-- jQuery 2.0.2 -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js" type="text/javascript"></script>   
    
</html>