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
                        <label class="pb-2" for="Type">Type</label>
                        <select name="slt" class="form-control form-select form-control-a" id="Type">
                            <option value="" selected>Tất cả</option>
                            <option value="Standard">Standard</option>
                            <option value="Superior">Superior</option>
                            <option value="Deluxe">Deluxe</option>
                            <option value="Suite">Suite</option>
                            <option value="Villa">Villa</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group mt-3">
                        <label class="pb-2" for="city">Địa điểm</label>
                        <select name="sla" class="form-control form-select form-control-a" id="city">
                            <option value="" selected>Tất cả</option>
                            <option value="">Alabama</option>
                            <option value="">Arizona</option>
                            <option value="">California</option>
                            <option value="">Colorado</option>
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