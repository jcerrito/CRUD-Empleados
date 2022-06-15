<?php
include_once('./Admin/controller/employee.controller.php');

$employees = new Employee;
$action = (isset($_GET['action']))?$_GET['action']:'read';

include_once('./Admin/views/header.php');

switch ($action) {
    case 'create':
        include_once('./Admin/views/employee/form.php');
        break;
    case 'save':
        $employee = $_POST['employee'];
        $result = $employees -> create($employee['name'],$employee['lastname'],$employee['phone'],$employee['domicile'],$employee['birthday'],$employee['salary'],$employee['observation']);
        $data = $employees -> readAll();
        $message = $employees -> checkCreate($result);
        include_once('./Admin/views/employee/index.php');
        break;
    case 'show':
        $id_employee = $_GET['employee'];
        $data = $employees -> readOne($id_employee);
        include_once('./Admin/views/employee/form.php');
        break;
    case 'update':
        $employee = $_POST['employee'];
        $result = $employees -> update($employee['id_employee'],$employee['name'],$employee['lastname'],$employee['phone'],$employee['domicile'],$employee['birthday'],$employee['salary'],$employee['observation']);
        $data = $employees -> readAll();
        $message = $employees -> checkUpdate($result);
        include_once('./Admin/views/employee/index.php');
        break;
    case 'delete':
        $id_employee = $_GET['employee'];
        $result = $employees -> delete($id_employee);
        header('Location: ./');
        break;
    
    default:
        $data = $employees -> readAll();
        include_once('./Admin/views/employee/index.php');
        break;
}

include_once('./Admin/views/footer.php'); 
?>