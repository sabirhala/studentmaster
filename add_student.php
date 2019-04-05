<?php
   include_once('include/config.php');
  include("include/loginsession.php"); 
  
if(isset($_GET['id']) &&  $_GET['id'] != '')
{
    $query = 'select * from studentmaster where id='.$_GET['id'];
    $row = $dbc->QueryGetRow($query);
	$action="action.php?action=update";
}
else
{
	$action="action.php";
}
?>

<!DOCTYPE html>
<html>
    <head>
     
      <?php include_once('include/header.php');  ?>
  
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php include_once('include/topheader.php');  ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">   
                   <?php include_once('include/leftmenu.php');  ?>
            <aside class="right-side">
               	<ol class="breadcrumb">
                        <li><a href="welcome.php"><i class="fa pull-right"></i> Dashboard </a></li>
                        <li><a href="student_list.php">Student List</a></li>
                         <li class="active"><?php echo($action !='action.php?action=update' ? "Add Student" : "Update Student")?></li>
                    </ol>
                <!-- Main content -->
                <section class="content">
                 <div class="wrapper wrapper-content animated fadeInRight"> 
					<form method="post"  id="user-form" name="user-form" action="<?php echo $action ?>">

                        <div class="row">
                            <div class="col-sm-6">
                                <legend>Student Detail</legend>
                                <div class="form-group">
                                    <label>Student Name<a  class="tooltip-ps" data-toggle="tooltip" title="Please provide Student Name.">
                                            <span class='glyphicon glyphicon-info-sign menu-icon'></span>
                                        </a>
                                    </label>
                                    <input class="form-control" type="text" placeholder="User Name" name="uname" id="uname" value="<?php echo $row['name']; ?>" required>
                                    <input type="hidden" name="hidden_id" value="<?php echo $row['id']; ?>"/>
                                </div>
                                <div class="form-group">
                                    <label>Student Email:-<a  class="tooltip-ps" data-toggle="tooltip" title="Please provide Email.">
                                            <span class='glyphicon glyphicon-info-sign menu-icon'></span>
                                        </a>
                                    </label>
                                    <input class="form-control" type="text" placeholder="User Name" name="email" id="uname"  value="<?php echo $row['email']; ?>" required>

                                </div>
                                <div class="form-group">
                                    <label>Student Address:-<a  class="tooltip-ps" data-toggle="tooltip" title="Please provide Address.">
                                            <span class='glyphicon glyphicon-info-sign menu-icon'></span>
                                        </a>
                                    </label>
                                    <input class="form-control" type="text" placeholder="User Name" name="address" id="uname"  value="<?php echo $row['address']; ?>" required>

                                </div>
                                <div class="form-group">
                                    <label>Mobile NO<a class="tooltip-ps" data-toggle="tooltip" title="Please provide Mobile No.">
                                            <span class='glyphicon glyphicon-info-sign menu-icon'></span>
                                        </a>
                                    </label>
                                    <input class="form-control" type="text" placeholder="Mobile No" name="mono" id="mono"  value="<?php echo $row['phone']; ?>"  required>
                                </div>

                            </div> <!--END col-sm-6-->

                        </div> <!--END row class-->
                        <hr/>
                        <input type="submit" class="btn btn-primary" value="<?php echo($action !='action.php?action=update' ? "Save" : "Update")?>"  id="btnstudent" name="btnstudent" />
                        <a href="student_list.php" class="btn btn-primary">Cancel</a> </form>
               </div>     <!--wrapper wrapper-content animated fadeInRight END-->              

                </section><!-- /.content -->
             </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        
    <?php include_once('include/jscript.php'); ?>

   
  <script type="text/javascript">
			$(document).ready(function(){
				$('#user-form').validate({
						//alert($( "#hidden_id" ).val());
					rules:{						
						uname:{
							required: true,
							minlength: 4,
							remote:	{
									url:'check-user.php/<?php echo $_GET['id'] ?>',
									type: "post",
									data: {  username: function() {	return $("#uname").val();  }
										  
										}									
								}					
							
							},
						email:{required: true,email: true},
					    txtpwd:{required: true,minlength: 4},
						conf_pwd:{required: true,equalTo: '#txtpwd'}
					
					},
					
					messages:{						
						uname:{
							required: "Please fill user name.",
							minlength: "The length of username must be greater than 4",
							remote: "Username is already existed in the system"
						},
						email:{
							required: "Please fill email address",
							email: "Please provide valid email address"
							},
						txtpwd:{
								required: "Please fill user password.",
								minlength: "The length of password must be greater than 4"},
						conf_pwd:{
								equalTo: "Password and confirm password do not match."}
								required: "Please fill confirm password",
					},
					 submitHandler: function (form) {
						 form.submit();
					}
				});				
				
			});
			</script>

    </body>
</html>