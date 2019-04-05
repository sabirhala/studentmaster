<?php 
include("include/config.php");
if(isset($_POST['btnstudent']))
{
//***************************Add User**************************************
    if(isset($_POST['uname'])&& isset($_POST['email']) && isset($_POST['address']) && isset($_POST['mono']) && $_GET['action'] != 'update')
    {
        $sql_user='insert into studentmaster(name,email,address,phone) 
			values("'.$_POST['uname'].'","'.$_POST['email'].'","'.$_POST['address'].'","'.$_POST['mono'].'")';

        $result =  $dbc->Query($sql_user);
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
        $query = 'update studentmaster set name = "'.$_POST['uname'].'",email = "'.$_POST['email'].'",address = "'.$_POST['address'].'",phone = "'.$_POST['mono'].'"
			where id ='.$_POST['hidden_id'];
        $sql =  $dbc->Query($query);
		if($sql){
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

    $sql ='delete  from studentmaster where id = '.$_GET['id'];
    $result =  $dbc->Query($sql);
    $message='<div class="alert alert-danger fade in">Record is successfully deleted.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button></div>';
    @session_start();
    $_SESSION['msg']=$message;
    header('location:student_list.php');
    exit();
}


/**************************Delete level*********************************/


?>