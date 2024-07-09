<?php
require_once("BillstaticObject.php");
class CheckoutObject{

    private $id;
    private $bill_id;
    private $checkout_by_user;
    private $checkout_date;
    private $description;


    /**
     * Get the value of id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of bill_id
     */
    public function getBillId() {
        return $this->bill_id;
    }

    /**
     * Set the value of bill_id
     */
    public function setBillId($bill_id): self {
        $this->bill_id = $bill_id;
        return $this;
    }

    /**
     * Get the value of checkout_by_user
     */
    public function getCheckoutByUser() {
        return $this->checkout_by_user;
    }

    /**
     * Set the value of checkout_by_user
     */
    public function setCheckoutByUser($checkout_by_user): self {
        $this->checkout_by_user = $checkout_by_user;
        return $this;
    }

    /**
     * Get the value of checkout_date
     */
    public function getCheckoutDate() {
        return $this->checkout_date;
    }

    /**
     * Set the value of checkout_date
     */
    public function setCheckoutDate($checkout_date): self {
        $this->checkout_date = $checkout_date;
        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription($description): self {
        $this->description = $description;
        return $this;
    }
}