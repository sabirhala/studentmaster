<?php 
include("include/config.php");
include("my_config/define_table.php");

$main_table = TBl_STUDENT;
if(isset($_POST['btnstudent']))
{
//***************************Add User**************************************
    if(isset($_POST['uname'])&& isset($_POST['email']) && isset($_POST['address']) && isset($_POST['mono']) && $_GET['action'] != 'update')
    {
        unset($store_array);
        $store_array['name'] = $_POST['uname'];
        $store_array['email'] = $_POST['email'];
        $store_array['address'] = $_POST['address'];
        $store_array['phone'] = $_POST['mono'];

      //  echo TBl_STUDENT;
        $result = $dbc->insert($main_table, $store_array);
		if($result){
			$message='<div class="alert alert-success fade in">User is successfully added.<button type="button" class="close" 
					data-dismiss="alert" aria-hidden="true">x</button></div>';
				@session_start();
				$_SESSION['msg']=$message;
				header('location:student_list.php');
			}
		else{echo mysqli_error();}
		exit();
	}
	//***************************Update User**************************************

    if($_GET['action']=='update' && isset($_POST['btnstudent']) && isset($_POST['hidden_id']) &&  $_POST['hidden_id'] != '')
    {

		$arr_module=implode(',', $_POST['permissions']);
//        $query = 'update studentmaster set name = "'.$_POST['uname'].'",email = "'.$_POST['email'].'",address = "'.$_POST['address'].'",phone = "'.$_POST['mono'].'"
//			where id ='.$_POST['hidden_id'];

        unset($store_array);
        $store_array['name'] = $_POST['uname'];
        $store_array['email'] = $_POST['email'];
        $store_array['address'] = $_POST['address'];
        $store_array['phone'] = $_POST['mono'];
        $where = 'id = '.$_POST['hidden_id'];
       // 'id = '.$_GET['id'];
        $result = $dbc->update($main_table,$store_array,$where);
        //$sql =  $dbc->Query($query);
		if($result){
			$message='<div class="alert alert-success fade in">User is successfully updated.<button type="button" class="close" 
								data-dismiss="alert" aria-hidden="true">x</button></div>';
								@session_start();
								$_SESSION['msg']=$message;
			header('location:student_list.php');
			}
		else{
			echo mysqli_error();
			}
	}
}

if($_GET['action'] == 'delete' && isset($_GET['id']) &&  $_GET['id'] != '')
{
    $where =  'id = '.$_GET['id'];
    $result = $dbc->delete($main_table,$where);
    $message='<div class="alert alert-danger fade in">Record is successfully deleted.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button></div>';
    @session_start();
    $_SESSION['msg']=$message;
    header('location:student_list.php');
    exit();
}



?>