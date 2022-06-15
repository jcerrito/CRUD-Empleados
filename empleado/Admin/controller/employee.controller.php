<?php
require_once('./Admin/connection.php');

class Employee extends System {

    /** 
     * La clase Employee se encargara de realizar la s 4 funciones basicas de un sistema
     * crear, leer, actualizar y eliminar. Esto es exclusivo para la tabla empleados que
     * se encuentra dentro de la base de datos
    */

    var $id_employee;
    var $name;
    var $lastname;
    var $phone;
    var $domicile;
    var $birhday;
    var $salary;
    var $observation;

    function readOne($id_employee) {
        $dbh = $this -> connect();
        $query = "SELECT * FROM employee WHERE id_employee = :id_employee";
        $stmt = $dbh -> prepare($query);
        $stmt -> bindParam(':id_employee', $id_employee, PDO::PARAM_INT);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    function readAll() {
        $dbh = $this -> connect();
        $query = "SELECT id_employee, concat(name,' ',lastname) as name, phone, domicile, birthday, salary, observation FROM employee";
        $stmt = $dbh -> prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    function create($name, $lastname, $phone, $domicile, $birthday, $salary, $observation) {
        $dbh = $this -> connect();
        $query = "INSERT INTO employee (name, lastname, phone, domicile, birthday, salary, observation) 
                VALUES (:name, :lastname, :phone, :domicile, :birthday, :salary, :observation)";
        $stmt = $dbh -> prepare($query);
        $stmt -> bindParam(':name', $name, PDO::PARAM_STR);
        $stmt -> bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $stmt -> bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt -> bindParam(':domicile', $domicile, PDO::PARAM_STR);
        $stmt -> bindParam(':birthday', $birthday, PDO::PARAM_STR);
        $stmt -> bindParam(':salary', $salary, PDO::PARAM_INT);
        $stmt -> bindParam(':observation', $observation, PDO::PARAM_STR);
        $result = $stmt -> execute();
        return $result;
               
    }

    function update($id_employee, $name, $lastname, $phone, $domicile, $birthday, $salary, $observation) {
        $dbh = $this -> connect();
        $query = "UPDATE employee SET name = :name, lastname = :lastname, phone = :phone, domicile = :domicile, birthday = :birthday,
                salary = :salary, observation = :observation WHERE id_employee = :id_employee";
        $stmt = $dbh -> prepare($query);
        $stmt -> bindParam(':id_employee', $id_employee, PDO::PARAM_INT);
        $stmt -> bindParam(':name', $name, PDO::PARAM_STR);
        $stmt -> bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $stmt -> bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt -> bindParam(':domicile', $domicile, PDO::PARAM_STR);
        $stmt -> bindParam(':birthday', $birthday, PDO::PARAM_STR);
        $stmt -> bindParam(':salary', $salary, PDO::PARAM_STR);
        $stmt -> bindParam(':observation', $observation, PDO::PARAM_STR);
        $result = $stmt -> execute();
        return $result;
    }

    function delete($id_employee) {
        $dbh = $this -> connect();
        $query = "DELETE FROM employee WHERE id_employee = :id_employee";
        $stmt = $dbh -> prepare($query);
        $stmt -> bindParam(':id_employee', $id_employee, PDO::PARAM_INT);
        $result = $stmt -> execute();
        return $result;
    }

    function checkCreate($result) {
        if ($result) {
            return "Registro Completado con Éxito!";
        } else {
            return "Ha Ocurrido un Error!";
        }
    }

    function checkUpdate($result) {
        if ($result) {
            return "Registro Actualizado con Éxito!";
        } else {
            return "Ha Ocurrido un Error!";
        }
    }
}

?>