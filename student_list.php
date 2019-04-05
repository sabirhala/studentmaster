<?php
   include_once('include/config.php');
  include("include/loginsession.php");
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
            <!-- Left side column. contains the logo and sidebar -->
           
                   <?php include_once('include/leftmenu.php');  ?>
               

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
               
                     <ol class="breadcrumb">
                        <li><a href="welcome.php"><i class="fa pull-right"></i> Dashboard </a></li>
                        <li class="active">Student List</li>
                     </ol>
               
                <!-- Main content -->
                <section class="wrapper content animated fadeInRight"> 
                
                    <a href="add_student.php" class="btn btn-primary pull-right">
                    	<span class="fa fa-plus">&nbsp;Add New Student</span>					
                    </a>
                   
               <!--message-->
           <?php 
				
					 echo $_SESSION['msg'];
					  unset($_SESSION['msg']); ?>
					
					<div class="row">
                        <div class="col-xs-12">                           
                            <div class="box">                               
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                 <th>No.</th>
                                                 <th>Name</th>
                                                 <th>Email</th>
                                                <th>Address</th>
                                                <th>Mobile No</th>
                                                 <th>Edit</th>
                                                 <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <?php
										 	$Srno=0;
										 	$query="select * from studentmaster  ORDER BY id DESC";
											$result =  $dbc->query($query);
                                             if($result->num_rows > 0)
											{
												while($row = $result->fetch_assoc())
                                                {
													$Srno++;

										 ?>
                                                    <tr>
                                                        <td style="width:50px"><?php echo $Srno; ?></td>
                                                        <td style="width:300px"><?php echo $row["name"] ?></td>
                                                        <td style="width:350px"><?php echo $row["email"] ?></td>
                                                        <td style="width:350px"><?php echo $row["address"] ?></td>
                                                        <td style="width:350px"><?php echo $row["phone"] ?></td>
                                                        <td style="width:50px"><a href="add_student.php?id=<?php echo $row['id']; ?>&action=update"><i class="fa fa-edit"></i></a></td>
                                                        <td style="width:50px"><div class="alert alert-danger fade in"><a href="action.php?id=<?php echo $row['id']; ?>&action=delete""><i class="fa fa-trash-o"></i></a></div></td>
                                                    </tr>
                                 <?php }} ?>
                                        </tbody>
                                        
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                  
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
<?php include_once('include/jscript.php'); ?>
  <script type="text/javascript">
           $(function() {
                $("#example1").dataTable(
				{
					'iDisplayLength': 50
				});
               
            });
        </script>
 <script>
   </body>
</html>