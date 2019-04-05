<?php @session_start();
	include_once('include/config.php'); 
?>
<aside class="left-side sidebar-offcanvas">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    
    <div class="user-panel">
      <div class="pull-left image"> <img src="img/admin.png" class="img-circle" alt="User Image" /> </div>
      <div class="pull-left info">
        <p>
          <?php 
									if(isset($_SESSION['unm']))
										echo "Hello&nbsp;&nbsp;".$_SESSION['unm'];
									else
										header("location:index.php");
									 ?>
        </p>
        <a href="#"></div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <style type="text/css">
				 	.disp_none{
						display:none;
					}
					.disp_blck{
						display:block;						
					}
				 </style>
    <?php					
		 $s1=$s2=$s3=$s4=$s5=$s6=$s7 ='style="display:none"';
		$a1 = 'class="active"';
		$a2 = '';
		$a3 = '';
		$a4 = '';
		$a5 = '';
		$a6 = '';
		
		$sysuser=dirname($_SERVER['PHP_SELF']).'/sys_user.php';
		
		$category=dirname($_SERVER['PHP_SELF']).'/level.php';
		$addcategory=dirname($_SERVER['PHP_SELF']).'/add_level.php';
		$news=dirname($_SERVER['PHP_SELF']).'/news.php';
		$add_news=dirname($_SERVER['PHP_SELF']).'/add_Question.php';
	
	   if($_SERVER['PHP_SELF'] == '/welcome.php'){
			$a1 = 'class="active"';
		}
		if($_SERVER['PHP_SELF'] == $category){
			$a2 = 'class="active"';
			$a1 = '';
		}	
	   if($_SERVER['PHP_SELF'] == $add_category){
			$a2 = 'class="active"';
			$a1 = '';
		}
		
		if($_SERVER['PHP_SELF'] == $category || $_SERVER['PHP_SELF'] == $add_category ){
			$a4 = 'active';
			$a1 = '';
		}
		
		
		if($_SERVER['PHP_SELF'] == $news){
			$a3 = 'class="active"';
			$a1 = '';
		}
		if($_SERVER['PHP_SELF'] == $add_news){
			$a3 = 'class="active"';
			$a1 = '';
		}
		
		if($_SERVER['PHP_SELF'] == $news || $_SERVER['PHP_SELF'] == $add_news ){
			$a6 = 'active';
			$a1 = '';
		}
		
		if($_SERVER['PHP_SELF'] == $date_change){
			$a5 = 'class="active"';
			$a1 = '';
		}
		
		
	?>
    <ul class="sidebar-menu">
        <li <?php echo $a1; ?>><a href="welcome.php?id=<?php echo $_SESSION['id']; ?>"><span>Dashboard</span><i class="fa fa-home pull-right"></i></a></li>

        <li class="treeview <?php echo $a4; ?>"> <a href="#"> <span>Student List</span> <i class="fa fa-angle-left pull-right"></i> </a>
            <ul class="treeview-menu">
                <li <?php echo $a2; ?>><a href="student_list.php"><i class="fa fa-angle-double-right"></i>Edit Student</a></li>
            </ul>
        </li>
        <li <?php echo $a1; ?>><a href="index.php?id=<?php echo $_SESSION['id']; ?>"><span>Logout</span></a></li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
