<?php
require_once("objects/ContactObject.php");
require_once("BasicModel.php");

class ContactModel extends BasicModel {
    
    function addContact(ContactObject $item) : bool {
        $sql = "INSERT INTO tblcontact(
        contact_fullname,contact_email,contact_subject,
        contact_notes,contact_seen,contact_created_at
        ) VALUES(?,?,?,?,?,?)";
        if($stmt = $this->con->prepare($sql)) {
            $fullname = $item->getContact_fullname();
            $email = $item->getContact_email();
            $subject = $item->getContact_subject();
            $notes = $item->getContact_notes();
            $seen = 0;
            $created_date = $item->getContact_created_at();
            
            $stmt->bind_param("ssssis",$fullname, $email,$subject,$notes,$seen,$created_date);
            return $this->addV2($stmt);
        }
        return false;
    }

    function delContact(ContactObject $item) : bool {
        $sql = "DELETE FROM tblcontact WHERE contact_id=?";
        if($stmt = $this->con->prepare($sql)) {
            $id = $item->getContact_id();
            $stmt->bind_param("i", $id);
            return $this->delV2($stmt);
        }
        return false;
    }

    function editContact(ContactObject $item) : bool {
        $sql = "UPDATE tblcontact SET contact_seen=? WHERE contact_id=?";
        if($stmt = $this->con->prepare($sql)) {
            $seen = $item->getContact_seen();
            $id = $item->getContact_id();
            $stmt->bind_param("ii",$seen,$id);
            return $this->editV2($stmt);
        }
        return false;
    }

    function getContact($id) {
        $item = null;
        $sql = "SELECT * FROM tblcontact ";
        $sql .= "WHERE contact_id=$id";
        $result = $this->get($sql);
        if($result->num_rows > 0) {
            $item = $result->fetch_object("ContactObject");
        }
        return $item;
    }

    function getContacts(ContactObject $similar, $page, $total) : array {
        $list = array();
        if($page <= 0) {
            $page = 1;
        }
        $at = ($page - 1) * $total;
        $sql = "SELECT * FROM tblcontact ";
        $sql .= "ORDER BY contact_id DESC ";
        $sql .= "LIMIT $at, $total;";
        try {
            $result = $this->get($sql);
            if($result->num_rows > 0) {
                while($item = $result->fetch_object('ContactObject')) {
                    array_push($list, $item);
                }
            }
        } catch(Exception $e) {
            exit($sql."</br>".$e->getMessage()."</br>".$e->getTraceAsString());
        }
        return $list;
    }

    function countContact(ContactObject $similar) : int {
        $sql = "SELECT COUNT(*) AS total FROM tblcontact ";
        $sql .= ";";
        $total = 0;
        if($result = $this->get($sql)){
            if($row = $result->fetch_array()) {
                $total = $row[0];
            }
        }
        return $total;
    }


}
?>