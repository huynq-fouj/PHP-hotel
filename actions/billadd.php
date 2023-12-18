<?php
session_start();
if(!isset($_SESSION["user"])) {
    header("location:/hostay/views/login.php");
} else {
    if(!isset($_SESSION["user"]["id"])) {
        header("location:/hostay/views/login.php?err=login");
    } else {
        if(isset($_POST["idForPost"]) && is_numeric($_POST["idForPost"])) {
            require_once("../app/models/RoomModel.php");
            require_once("../app/models/BillModel.php");
            require_once("../libraries/Utilities.php");
            $id = $_POST["idForPost"];
            $rm = new RoomModel();
            if($rm->getRoom($id) != null) {
                $user_id = $_SESSION["user"]["id"];
                $fullname = trim($_POST["txtFullname"]);
                $email = trim($_POST["txtEmail"]);
                $phone = trim($_POST["txtPhone"]);
                $numRoom = trim($_POST["txtNumberRoom"]);
                $numAdult = trim($_POST["txtNumberAdult"]);
                $numChild = trim($_POST["txtNumberChildren"]);
                $start = trim($_POST["txtStartDate"]);
                $end = trim($_POST["txtEndDate"]);
                $notes = trim($_POST["txtNotes"]);
                if($fullname != ""
                && checkEmail($email)
                && $phone != ""
                && $numRoom != ""
                && $numAdult != ""
                && $numChild != ""
                && $start != ""
                && $end != "") {
                    if(!is_numeric($numRoom) || $numRoom < 1 || $numRoom > 5) {
                        header("location:/hostay/views/room.php?id=$id&err=nr");
                    } else {
                        if(!is_numeric($numAdult) || $numAdult < 0 || $numAdult > 10) {
                            header("location:/hostay/views/room.php?id=$id&err=na");
                        } else {
                            if(!is_numeric($numChild) || $numChild < 0 || $numChild > 10) {
                                header("location:/hostay/views/room.php?id=$id&err=nc");
                            } else {
                                if($numAdult == 0 && $numChild == 0) {
                                    header("location:/hostay/views/room.php?id=$id&err=np");
                                } else {
                                    if(!checkValidDate($start, $end)) {
                                        header("location:/hostay/views/room.php?id=$id&err=date");
                                    } else {
                                        $bm = new BillModel();
                                        $item = new BillObject();
                                        $item->setBill_room_id($id);
                                        $item->setBill_customer_id($user_id);
                                        $item->setBill_email($email);
                                        $item->setBill_fullname($fullname);
                                        $item->setBill_notes($notes);
                                        $item->setBill_phone($phone);
                                        $item->setBill_number_room((int) $numRoom);
                                        $item->setBill_number_adult((int) $numAdult);
                                        $item->setBill_number_children((int) $numChild);
                                        $item->setBill_start_date(date("Y-m-d", strtotime($start)));
                                        $item->setBill_end_date(date("Y-m-d" , strtotime($end)));
                                        $item->setBill_static(1);
                                        $item->setBill_created_at(date("Y-m-d"));
                                        $item->setBill_is_paid(0);
                                        if($bm->addBill($item)) {
                                            $newBill = $bm->getNewBill($item->getBill_customer_id());
                                            if($newBill != null) {
                                                $newbill_id = $newBill->getBill_id();
                                                header("location:/hostay/views/ticket.php?id=$newbill_id");
                                            } else {
                                                header("location:/hostay/views/room.php?id=$id&suc=bia");
                                            }
                                        } else {
                                            header("location:/hostay/views/room.php?id=$id&err=bia");
                                        }
                                    }
                                }
                            }
                        }
                    }
                } else {
                    header("location:/hostay/views/room.php?id=$id&err=lack");
                }
            } else {
                header("location:/hostay/views/rooms.php?err=noexistr");
            }
        } else {
            header("location:/hostay/views/rooms.php?err=value");
        }
    }
}
?>