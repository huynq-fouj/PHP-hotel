<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/hostay/app/lib/connection.php");

class BasicModel {
    
    protected $con;

    function __construct() {
        $this->con = getConnection();
        //Tắt chế độ commit tự động
        $this->con->autocommit(false);
    }

    private function exe(string $sql) : bool {
        $result = $this->con->query($sql);
        if($result && $this->con->affected_rows > 0) {
            if($this->con->commit()) {
                return true;
            }
        }else {
            $this->con->rollback();
        }
        return false;
    }

    /**
     * execute update database with sql
     *  - Author: Nguyễn Quang Huy
     *  - cre_at: 28/10/2023
     *  - upd_at: 28/10/20203
     */
    protected function add(string $sql) : bool {
        return $this->exe($sql);
    }

    /**
     * execute update database with sql
     *  - Author: Nguyễn Quang Huy
     *  - cre_at: 28/10/2023
     *  - upd_at: 28/10/20203
     */
    protected function del(string $sql) : bool {
        return $this->exe($sql);
    }

    /**
     * execute update database with sql
     *  - Author: Nguyễn Quang Huy
     *  - cre_at: 28/10/2023
     *  - upd_at: 28/10/20203
     */
    protected function edit(string $sql) : bool {
        return $this->exe($sql);
    }

    private function exeV2(mysqli_stmt $stmt) : bool {
        try {
            if($stmt->execute()) {
                if($stmt->affected_rows > 0) {
                    if($this->con->commit()) {
                        return true;
                    }
                } else {
                    try{
                        $this->con->rollback();
                    } catch(Exception $e1) {
                        echo $e1->getTrace();
                    }
                }
            }
        } catch(Exception $e) {
            echo $e->getMessage();
            echo $e->getTrace();
            try{
                $this->con->rollback();
            } catch(Exception $e1) {
                echo $e1->getTrace();
            }
        } finally {
            $stmt->close();
        }
        return false;
    }

    /**
     * execute update database with Prepared Satement
     *  - Author: Nguyễn Quang Huy
     *  - cre_at: 28/10/2023
     *  - upd_at: 28/10/20203
     */
    protected function addV2(mysqli_stmt $stmt) : bool {
        return $this->exeV2($stmt);
    }

    /**
     * execute update database with Prepared Sattement
     *  - Author: Nguyễn Quang Huy
     *  - cre_at: 28/10/2023
     *  - upd_at: 28/10/20203
     */
    protected function delV2(mysqli_stmt $stmt) : bool {
        return $this->exeV2($stmt);
    }

    /**
     * execute update database with Prepared Sattement
     *  - Author: Nguyễn Quang Huy
     *  - cre_at: 28/10/2023
     *  - upd_at: 28/10/20203
     */
    protected function editV2(mysqli_stmt $stmt) : bool {
        return $this->exeV2($stmt);
    }

    /**
     * get database with sql select
     *  - Author: Nguyễn Quang Huy
     *  - cre_at: 28/10/2023
     *  - upd_at: 28/10/20203
     */
    protected function get(string $sql) : mysqli_result | bool {
        if($result = $this->con->query($sql)) {
            return $result;
        }
        unset($sql);
        return false;
    }

    function __destruct() {
        $this->con->autocommit(true);
        $this->con->close();
    }

}
?>
