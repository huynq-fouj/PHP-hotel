<?php
require_once("objects/UserObject.php");
require_once("BasicModel.php");

class UserModel extends BasicModel {

    /**
     * Phương thức thêm mới người sử dụng với tham số chuyền vào là đối tượng UserObject
     *  - Author: Nguyễn Quang Huy
     *  - cre_at: 28/10/2023
     *  - upd_at: 28/10/2023
     */
    function addUser(UserObject $item) : bool {
        if(!$this->isExists($item)) {
            $sql = "INSERT INTO tbluser(
                    user_name,user_password,user_fullname,
                    user_email,user_phone,user_permission,user_created_at
                    ) VALUES(?,md5(?),?,?,?,?,?)";
            $stmt = $this->con->prepare($sql);
            if($stmt) {
                $user_name = $item->getUser_name();
                $user_password = $item->getUser_password();
                $user_email = $item->getUser_email();
                $user_fullname = $item->getUser_fullname();
                $user_phone = $item->getUser_phone();
                $user_permission = $item->getUser_permission();
                $user_ca = $item->getUser_created_at();

                $stmt->bind_param(
                    "sssssis",
                    $user_name,
                    $user_password,
                    $user_fullname,
                    $user_email,
                    $user_phone,
                    $user_permission,
                    $user_ca);
                
                return $this->addV2($stmt);
            }
        }
        return false;
    }

    /**
     * Phương thức kiểm tra người sử dụng đã tồn tại hay chưa bằng cách kiểm tra thuộc tính user_name
     *  - Author: Nguyễn Quang Huy
     *  - cre_at: 28/10/2023
     *  - upd_at: 28/10/2023
     */
    function isExists(UserObject $item) : bool {
        $sql = "SELECT * FROM tbluser WHERE user_name='".$item->getUser_name()."';";
        $result = $this->get($sql);
        if($result->num_rows > 0) {
            return true;
        }
        return false;
    }

    /**
     * Phương thức xóa người sử dụng thông qua id dựa trên thuộc tính user_id của đối tượng
     *  - Author: Nguyễn Quang Huy
     *  - cre_at: 28/10/2023
     *  - upd_at: 28/10/2023
     */
    function delUser(UserObject $item) : bool {
        $sql = "DELETE FROM tbluser WHERE user_id=?";
        if($stmt = $this->con->prepare($sql)) {
            $id = $item->getUser_id();
            $stmt->bind_param("i",$id);
            return $this->delV2($stmt);
        }
        return $this->del($sql);
    }

    /**
     * Phương thức chỉnh sủa người sử dụng, chỉnh sửa qua id
     * ***
     * * type:
     * * * "UPD" : Chỉnh sửa thông thường
     * * * "PASS" : Đổi mật khẩu
     * ***
     *  - Author: Nguyễn Quang Huy
     *  - cre_at: 28/10/2023
     *  - upd_at: 28/10/2023
     */
    function editUser(UserObject $item, $type = "UPD") : bool {
        $sql = "UPDATE tbluser SET ";
        switch($type) {
            case "UPD":
                $sql .= "user_email=?,user_phone=?,user_fullname=?,
                        user_permission=? ";
                break;
            case "PASS":
                $sql .= "user_password=md5(?) ";
                break;
        }

        $sql .= "WHERE user_id=?;";
        if($stmt = $this->con->prepare($sql)) {
            $id = $item->getUser_id();
            switch($type) {
                case "UPD":
                    $user_email = $item->getUser_email();
                    $user_fullname = $item->getUser_fullname();
                    $user_phone = $item->getUser_phone();
                    $user_permission = $item->getUser_permission();
                    $stmt->bind_param(
                        "sssii",
                        $user_email,
                        $user_phone,
                        $user_fullname,
                        $user_permission,
                        $id);
                    break;
                case "PASS":
                    $user_password = $item->getUser_password();
                    $stmt->bind_param("si",$user_password,$id);
                    break;
                    
            }
            return $this->editV2($stmt);
        }
        return false;
    }

    /**
     * Phương thức lấy thông tin người sử dụng bằng tên đăng nhập và mật khẩu
     * - Author: Nguyễn Quang Huy
     * - cre_at: 25/10/2023
     * - upd_at: 27/10/2023
     */
    function getUser(string $username, string $password) : UserObject | null {
        $user = null;
        $sql = "SELECT * FROM tbluser WHERE user_name='$username' AND user_password=md5('$password')";
        $result = $this->get($sql);
        if($result->num_rows > 0) {
            $user = $result->fetch_object('UserObject');
        }
        return $user;
    }


    function getUserByUsername(string $username) : UserObject | null {
        $user = null;
        $sql = "SELECT * FROM tbluser WHERE user_name='$username'";
        $result = $this->get($sql);
        if($result->num_rows > 0) {
            $user = $result->fetch_object('UserObject');
        }
        return $user;
    }

    /**
     * Phương thức lấy thông tin người sử dụng dựa trên id;
     * - Author: Nguyễn Quang Huy
     * - cre_at: 25/10/2023
     * - upd_at: 27/10/2023
     */
    function getUserById($id) : UserObject | null {
        $user = null;
        $sql = "SELECT * FROM tbluser WHERE user_id=$id";
        $result = $this->get($sql);
        if($result->num_rows > 0) {
            $user = $result->fetch_object('UserObject');
        }
        return $user;
    }


    function getUserIdByUserName($user_name) : int | null {
        $user = null;
        $sql = "SELECT * FROM tbluser WHERE user_name='$user_name'";
        $result = $this->get($sql);
        if($result->num_rows > 0) {
            $user = $result->fetch_object('UserObject');
        }
        return $user->getUser_id();
    }

    /**
     * Phương thức lấy tất cả người sử dụng
     * ***
     * - Author: Nguyễn Quang Huy
     * - cre_at: 25/10/2023
     * - upd_at: 27/10/2023
     * ***
     * @param mixed $page
     * Trang cần lấy - int
     * @param mixed $total
     * Số lượng user trên 1 trang - int
     */
    function getUsers(UserObject $similar, $page, $total) : array {
        $list = array();
        if($page <= 0) {
            $page = 1;
        }
        $at = ($page - 1) * $total;
        $sql = "SELECT * FROM tbluser ";
        $sql .= $this->createConditions($similar);
        $sql .= "LIMIT $at, $total;";
        $result = $this->get($sql);
        if($result->num_rows > 0) {
            while($user = $result->fetch_object('UserObject')) {
                array_push($list, $user);
            }
        }
        return $list;
    }

    /**
     * Đếm số lượng user
     */
    function countUser(UserObject $similar) : int {
        $sql = "SELECT COUNT(*) AS total FROM tbluser ";
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

    private function createConditions(UserObject $similar) {
        $out = "";
        if(!empty($similar->getUser_name())) {
            $search = $similar->getUser_name();
            $out .= "((user_name LIKE '%$search%') || (user_fullname LIKE '%$search%')) ";
        }
        if($out != "") {
            $out = "WHERE ".$out;
        }
        return $out;
    }

    /**
     * @param int $time
     * @param string $option  'DAY' / 'MONTH' / 'YEAR'
     */
    function countByTime($time, $option = "DAY") {
        $sql = "SELECT COUNT(*) AS total FROM tbluser ";
        switch($option) {
            case "DAY":
                $sql .= "WHERE DAY(user_created_at) = $time";
                break;
            case "MONTH":
                $sql .= "WHERE MONTH(user_created_at) = $time";
                break;
            case "YEAR":
                $sql .= "WHERE YEAR(user_created_at) = $time";
                break;
            default:
                break;
        }
        $sql .= ";";
        $total = 0;
        try {
            if($result = $this->get($sql)){
                if($row = $result->fetch_array()) {
                    $total = $row[0];
                }
            }
        } catch(Exception $e) {
            echo $sql."</br>".$e->getMessage()."</br>";
        }
        return $total;
    }

}
?>