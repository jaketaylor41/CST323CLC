<?php
namespace App\Models\Services\Data;

use App\Models\Services\Data\Database;

class CalculationDataService implements DataServiceInterface
{

    function create($calculation)
    {
        /* $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("
        INSERT INTO calculations
        (OPERAND1, OPERAND2, OPERATION, RESULT)
        VALUES (?,?,?,?)");
        
        if (! $stmt) {
            echo "Something wrong in the binding process. sql error?";
            exit();
        }
        
        $op1 = $calculation->getOp1();
        $op2 = $calculation->getOp2();
        $operation = $calculation->getOperation();
        $result = $calculation->getResult();
        
        $stmt->bind_param("ddsd", $op1, $op2, $operation, $result);
        
        $stmt->execute();
             
        if ($stmt->affected_rows > 0) {
            $insert_id = $connection->insert_id;
        } else {
            $insert_id = -1;
        }
        
        $connection->close();
        return $insert_id; */
    }

    function read($id)
    {
        /* $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("
        SELECT *
        FROM calculations
        WHERE ID LIKE ?
        LIMIT 1");
        
        if (! $stmt) {
            echo "Something wrong in the binding process. sql error?";
            exit();
        }
        
        $stmt->bind_param("i", $id);
        
        $stmt->execute();
        
        $stmt->store_result();
        
        $stmt->bind_result($calc_id, $op1, $op2, $operation, $result);
        
        while ($calculation = $stmt->fetch()) {
            $c = new Calculation($calc_id, $op1, $op2, $operation);
            $c->calculateResult();
        }
        
        $connection->close();
        return $c; */
    }

    function readAll()
    {
       /*  $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("
        SELECT *
        FROM calculations");
        
        if (! $stmt) {
            echo "Something wrong in the binding process. sql error?";
            exit();
        }
        
        $stmt->execute();
        
        $stmt->store_result();
        
        $stmt->bind_result($calc_id, $op1, $op2, $operation, $result);
        
        $calculation_array = array();
        while ($calculation = $stmt->fetch()) {
            $c = new Calculation($calc_id, $op1, $op2, $operation);
            $c->calculateResult();
            array_push($calculation_array, $c);
        }
        
        $connection->close();
        return $calculation_array; */
    }

    function update($calculation)
    {
        /* $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("
        UPDATE calculations
        SET OPERAND1 = ?, OPERAND2 = ?, OPERATION = ?, RESULT = ?
        WHERE ID = ?
        LIMIT 1");
        
        if (! $stmt) {
            echo "Something wrong in the binding process. sql error?";
            exit();
        }
        
        $op1 = $calculation->getOp1();
        $op2 = $calculation->getOp2();
        $operation = $calculation->getOperation();
        $result = $calculation->getResult();
        
        $stmt->bind_param("ddsd", $op1, $op2, $operation, $result);
        
        $stmt->execute();
        
        $connection->close();
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        } */
    }

    function delete($id)
    {
        /* $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("
        DELETE FROM calculations
        WHERE ID = ?
        LIMIT 1");
        
        if (! $stmt) {
            echo "Something wrong in the binding process. sql error?";
            exit();
        }
        
        $stmt->bind_param("i", $id);
        
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        } */
    }

}