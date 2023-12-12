<?php
class BillstaticObject {
    protected $billstatic_id;
    protected $billstatic_name;
    protected $billstatic_notes;

    function getBillstatic_id() {
        return $this->billstatic_id;
    }

    function getBillstatic_name() {
        return $this->billstatic_name;
    }

    function getBillstatic_notes() {
        return $this->billstatic_notes;
    }

    function setBillstatic_id($billstatic_id) {
        $this->billstatic_id = $billstatic_id;
    }

    function setBillstatic_name($billstatic_name) {
        $this->billstatic_name = $billstatic_name;
    }

    function setBillstatic_notes($billstatic_notes) {
        $this->billstatic_notes = $billstatic_notes;
    }
}
?>