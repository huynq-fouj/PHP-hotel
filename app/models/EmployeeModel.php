<?php
require_once("objects/EmployeeObject.php");
require_once("BasicModel.php");

class EmployeeModel extends BasicModel {
    function getEmployee(EmployeeObject $similar, $page, $total) : array {
        $list = array();
        if($page <= 0) {
            $page = 1;
        }
        $at = ($page - 1) * $total;
        $sql = "SELECT * FROM employee ";
        $sql .= $this->createConditions($similar);
        $sql .= "LIMIT $at, $total;";
        $result = $this->get($sql);
        if($result->num_rows > 0) {
            while($user = $result->fetch_object('EmployeeObject')) {
                array_push($list, $user);
            }
        }
        return $list;
    }

    function delEmployee(EmployeeObject $item) : bool {
        $sql = "DELETE FROM employee WHERE id=?";
        if($stmt = $this->con->prepare($sql)) {
            $id = $item->getId();
            $stmt->bind_param("i",$id);
            return $this->delV2($stmt);
        }
        return $this->del($sql);
    }

    function updateEmployee(EmployeeObject $item) : bool {
        $sql = "UPDATE employee SET ";
        $sql .= "fullname=?,phone=?,email=?,
                        address=?, personal_id=?, role=? ";    
        $sql .= "WHERE id=?;";
        if($stmt = $this->con->prepare($sql)) {
            $id = $item->getId();
            $fullname = $item->getFullname();
            $phone = $item->getPhone();
            $email = $item->getEmail();
            $address = $item->getAddress();
            $personalId = $item->getPersonalId();
            $role = $item->getRole();
            $stmt->bind_param(
                "ssssssi",
                $fullname,
                $phone,
                $email,
                $address,
                $personalId,
                $role,
                $id);      

                return $this->editV2($stmt); 
        }
            return false;
        }


    function getEmployeeById($id) : EmployeeObject {
        $user = null;
        $sql = "SELECT * FROM employee WHERE id=$id";
        $result = $this->get($sql);
        if($result->num_rows > 0) {
            $user = $result->fetch_object('EmployeeObject');
        }
        return $user;
    }
    function countEmployee(EmployeeObject $similar) : int {
        $sql = "SELECT COUNT(*) AS total FROM employee ";
        $sql .= $this->createConditions($similar);
        $sql .= ";";
        $total = 0;
        if($result = $this->get($sql)){
            if($row = $result->fetch_array()) {
                $total = $row[0];
            }
        }
        return $total;
    }

    private function createConditions(EmployeeObject $similar) {
        $out = "";
        if(!empty($similar->getFullname())) {
            $search = $similar->getFullname();
            $out .= "((fullname LIKE '%$search%') || (fullname LIKE '%$search%')) ";
        }
        if($out != "") {
            $out = "WHERE ".$out;
        }
        return $out;
    }

    function isExists(EmployeeObject $item) : bool {
        $sql = "SELECT * FROM employee WHERE phone='".$item->getPhone()."';";
        $result = $this->get($sql);
        if($result->num_rows > 0) {
            return true;
        }
        return false;
    }

    function addEmployee(EmployeeObject $item) : bool {

        if(!$this->isExists($item)) {

            $sql = "INSERT INTO employee(
                    fullname,phone,email,
                    address,personal_id,role) VALUES(?,?,?,?,?,?)";
            $stmt = $this->con->prepare($sql);
            if($stmt) {
                $fullname = $item->getFullname();
                $phone = $item->getPhone();
                $email = $item->getEmail();
                $address = $item->getAddress();
                $personalId = $item->getPersonalId();
                $role = $item->getRole();

                $stmt->bind_param(
                    "ssssss",
                    $fullname,
                    $phone,
                    $email,
                    $address,
                    $personalId,
                    $role
                    );
                
                return $this->addV2($stmt);
            }
        }
        return false;
    }
}