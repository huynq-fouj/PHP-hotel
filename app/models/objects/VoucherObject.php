<?php

class VoucherObject
{
    private $voucher_id;
    private $voucher_code;
    private $description;
    private $start_date;
    private $expire_date;
    private $percent;
    private $discount_limit;
    private $status;
    private $usage_count;
    private $min_order_value;
    private $user_id;
    private $create_at;

    private $usage_limit;



    /**
     * Get the value of voucher_id
     */
    public function getVoucherId() {
        return $this->voucher_id;
    }

    /**
     * Set the value of voucher_id
     */
    public function setVoucherId($voucher_id): self {
        $this->voucher_id = $voucher_id;
        return $this;
    }

    /**
     * Get the value of voucher_code
     */
    public function getVoucherCode() {
        return $this->voucher_code;
    }

    /**
     * Set the value of voucher_code
     */
    public function setVoucherCode($voucher_code): self {
        $this->voucher_code = $voucher_code;
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

    /**
     * Get the value of start_date
     */
    public function getStartDate() {
        return $this->start_date;
    }

    /**
     * Set the value of start_date
     */
    public function setStartDate($start_date): self {
        $this->start_date = $start_date;
        return $this;
    }

    /**
     * Get the value of expire_date
     */
    public function getExpireDate() {
        return $this->expire_date;
    }

    /**
     * Set the value of expire_date
     */
    public function setExpireDate($expire_date): self {
        $this->expire_date = $expire_date;
        return $this;
    }

    /**
     * Get the value of percent
     */
    public function getPercent() {
        return $this->percent;
    }

    /**
     * Set the value of percent
     */
    public function setPercent($percent): self {
        $this->percent = $percent;
        return $this;
    }

    /**
     * Get the value of discount_limit
     */
    public function getDiscountLimit() {
        return $this->discount_limit;
    }

    /**
     * Set the value of discount_limit
     */
    public function setDiscountLimit($discount_limit): self {
        $this->discount_limit = $discount_limit;
        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * Set the value of status
     */
    public function setStatus($status): self {
        $this->status = $status;
        return $this;
    }

    /**
     * Get the value of usage_count
     */
    public function getUsageCount() {
        return $this->usage_count;
    }

    /**
     * Set the value of usage_count
     */
    public function setUsageCount($usage_count): self {
        $this->usage_count = $usage_count;
        return $this;
    }

    /**
     * Get the value of min_order_value
     */
    public function getMinOrderValue() {
        return $this->min_order_value;
    }

    /**
     * Set the value of min_order_value
     */
    public function setMinOrderValue($min_order_value): self {
        $this->min_order_value = $min_order_value;
        return $this;
    }

    /**
     * Get the value of user_id
     */
    public function getUserId() {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     */
    public function setUserId($user_id): self {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * Get the value of create_at
     */
    public function getCreateAt() {
        return $this->create_at;
    }

    /**
     * Set the value of create_at
     */
    public function setCreateAt($create_at): self {
        $this->create_at = $create_at;
        return $this;
    }

    /**
     * Get the value of usage_limit
     */
    public function getUsageLimit() {
        return $this->usage_limit;
    }

    /**
     * Set the value of usage_limit
     */
    public function setUsageLimit($usage_limit): self {
        $this->usage_limit = $usage_limit;
        return $this;
    }
}