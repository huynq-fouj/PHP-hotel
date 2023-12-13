<!-- ======= Property Search Section ======= -->
<div class="click-closed"></div>
<!--/ Form Search Star /-->
<div class="box-collapse">
    <div class="title-box-d">
        <h3 class="title-d">Tìm kiếm phòng</h3>
    </div>
    <span class="close-box-collapse right-boxed bi bi-x"></span>
    <div class="box-collapse-wrap form">
        <form class="form-a" action="/hostay/views/rooms.php" method="get">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="form-group">
                        <label class="pb-2" for="Type">Từ khóa</label>
                        <input type="text" name="key"
                            class="form-control form-control-lg form-control-a"
                            placeholder="Keyword">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group mt-3">
                        <label class="pb-2" for="Type">Loại phòng</label>
                        <select name="slt" class="form-control form-select form-control-a" id="Type">
                            <option value="" selected>Tất cả</option>
                            <?php
                                require_once($_SERVER["DOCUMENT_ROOT"]."/hostay/app/models/RoomtypeModel.php");
                                $rtm = new RoomtypeModel();
                                $roomtypes = $rtm->getRoomtypes(new RoomtypeObject(), 1, 100);
                                foreach($roomtypes as $type) {
                                    echo '<option value="'.$type->getRoomtype_id().'">'.$type->getRoomtype_name().'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group mt-3">
                        <label class="pb-2" for="city">Địa điểm</label>
                        <select name="sla" class="form-control form-select form-control-a" id="city">
                            <option value="" selected>Tất cả</option>
                            <option value="Cát Bà">Cát Bà</option>
                            <option value="Nha Trang">Nha Trang</option>
                            <option value="Hạ Long">Hạ Long</option>
                            <option value="Đà Lạt">Đà Lạt</option>
                            <option value="Đà Nẵng">Đà nẵng</option>
                            <option value="Vũng Tàu">Vũng Tàu</option>
                            <option value="Thanh Hóa">Thanh Hóa</option>
                            <option value="Cần Thơ">Cần Thơ</option>
                            <option value="Hồ Chí Minh">Tp.Hồ Chí Minh</option>
                            <option value="Hà Nội">Hà Nội</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group mt-3">
                        <label class="pb-2" for="price">Giá cao nhất</label>
                        <select name="slp" class="form-control form-select form-control-a" id="price">
                            <option value="" selected>Không giới hạn</option>
                            <option value="20">$20</option>
                            <option value="50">$50</option>
                            <option value="100">$100</option>
                            <option value="150">$150</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group mt-3">
                        <label class="pb-2" for="price-sort">Sắp sếp</label>
                        <select name="sort" class="form-control form-select form-control-a" id="price-sort">
                            <option value="" selected>Mới nhất</option>
                            <option value="pricet">Giá thấp đến cao</option>
                            <option value="priceg">Giá cao đến thấp</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-b">Tìm kiếm</button>
                </div>
            </div>
        </form>
    </div>
</div><!-- End Property Search Section -->