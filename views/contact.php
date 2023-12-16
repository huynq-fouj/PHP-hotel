<?php
require_once("layouts/header.php");
?>
<main id="main">
    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Liên hệ chúng tôi</h1>
                <p class="row color-text-a align-items-center">
                    <i class="bi bi-chat-square-text col-1 fs-3" style="color: #2eca6a"></i>
                    <span class="col-11">
                        Liên hệ với nhân viên chúng tôi về đơn đặt của bạn và chúng tôi sẽ phản hồi ngay khi có thể.
                    </span>
                </p>
                <p class="row color-text-a align-items-center">
                    <i class="bi bi-telephone col-1 fs-3" style="color: #2eca6a"></i>
                    <span class="col-11">
                        Trong trường hợp khẩn cấp, bạn có thể gọi cho chúng tôi 24/7 bằng số địa phương hoặc quốc tế.
                    </span>
                    </p>
                <p class="row color-text-a align-items-center">
                    <i class="bi bi-buildings col-1 fs-3" style="color: #2eca6a"></i>
                    <span class="col-11">
                        Chỗ nghỉ thường là người biết rõ nhất về thông tin chi tiết cho lưu trú của bạn.
                    </span>
                </p>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="/hostay/">Trang chủ</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Liên hệ
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- Contact form -->
    <section class="contact mb-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-single-box">
              <h1 class="title-single">Gửi phản hồi</h1>
            </div>
          </div>
        </div>
        <div class="row d-flex justify-content-center">
          <div class="col-md-12">
            <form action="" method="post" class="needs-validation" novalidate>
              <div class="row">
                <div class="col-md-4 mt-3">
                  <label for="fullname" class="form-label text-dark fw-bold">Họ tên</label>
                  <input type="text" class="form-control" id="fullname" name="txtFullname" required placeholder="Tên đầy đủ">
                  <div class="invalid-feedback">Vui lòng nhập tên đầy đủ</div>
                </div>
                <div class="col-md-4 mt-3">
                  <label for="email" class="form-label text-dark fw-bold">Email</label>
                  <input type="text" class="form-control" id="email" name="txtEmail" required placeholder="Email">
                  <div class="invalid-feedback">Vui lòng nhập email</div>
                </div>
                <div class="col-md-4 mt-3">
                  <label for="subject" class="form-label text-dark fw-bold">Tiêu đề</label>
                  <input type="text" class="form-control" id="subject" name="txtSubject" required placeholder="Tiêu đề">
                  <div class="invalid-feedback">Vui lòng nhập tiêu đề</div>
                </div>
                <div class="col-md-12 mt-3">
                  <label for="note" class="form-label text-dark fw-bold">Nội dung</label>
                  <textarea name="txtNotes"
                    class="form-control"
                    id="note" rows="5"
                    required
                    placeholder="Nhập nội dung tại đây"></textarea>
                  <div class="invalid-feedback">Vui lòng nhập nội dung</div>
                </div>
                <div class="col-md-12 mt-3 d-flex justify-content-center">
                  <button type="submit" class="btn btn-dark px-4 fs-5" name="sendContact">
                    <i class="bi bi-send"></i>
                    Gửi phản hồi
                  </button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-12">
          <?php
              require_once("../app/models/ContactModel.php");
              require_once("../libraries/Utilities.php");
              $cm = new ContactModel();
              if(isset($_POST["sendContact"])) {
                $fullname = trim($_POST["txtFullname"]);
                $email = trim($_POST["txtEmail"]);
                $subject = trim($_POST["txtSubject"]);
                $notes = trim($_POST["txtNotes"]);
                if($fullname != ""
                  && checkEmail($email)
                  && $subject != ""
                  && $notes != "") {
                    $item = new ContactObject();
                    $item->setContact_fullname($fullname);
                    $item->setContact_email($email);
                    $item->setContact_subject($subject);
                    $item->setContact_notes($notes);
                    $item->setContact_created_at(date("Y-m-d"));
                    $result = $cm->addContact($item);
                    if($result) {
                      echo '<p class="text-success">Gửi phản hồi thành công!</p>';
                    } else {
                      echo '<p class="text-danger">Có lỗi trong quá trình xử lý! Vui lòng thử lại sau.</p>';
                    }
                  } else {
                    echo '<p class="text-danger">Vui lòng điền đầy đủ thông tin!</p>';
                  }
              }
            ?>
          </div>
        </div>
      </div>
    </section>
    <!-- End Contact form -->
    <!-- ======= Contact Single ======= -->
    <section class="contact">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 section-t2">
              <div class="row justify-content-around">
                <div class="col-md-4 icon-box section-b2">
                  <div class="icon-box-icon">
                    <span class="bi bi-envelope"></span>
                  </div>
                  <div class="icon-box-content table-cell">
                    <div class="icon-box-title">
                      <h4 class="icon-title">Say Hello</h4>
                    </div>
                    <div class="icon-box-content">
                      <p class="mb-1">Email.
                        <span class="color-a">hostaysupporter@gmail.com</span>
                      </p>
                      <p class="mb-1">Điện thoại.
                        <span class="color-a">+84 356 945 234</span>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 icon-box section-b2">
                  <div class="icon-box-icon">
                    <span class="bi bi-geo-alt"></span>
                  </div>
                  <div class="icon-box-content table-cell">
                    <div class="icon-box-title">
                      <h4 class="icon-title">Tìm chúng tôi ở</h4>
                    </div>
                    <div class="icon-box-content">
                      <p class="mb-1">
                        Bắc Từ Liêm, Hà Nội,
                        <br> VN.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 icon-box">
                  <div class="icon-box-icon">
                    <span class="bi bi-share"></span>
                  </div>
                  <div class="icon-box-content table-cell">
                    <div class="icon-box-title">
                      <h4 class="icon-title">Mạng xã hội</h4>
                    </div>
                    <div class="icon-box-content">
                      <div class="socials-footer">
                        <ul class="list-inline">
                          <li class="list-inline-item">
                            <a href="#" class="link-one">
                              <i class="bi bi-facebook" aria-hidden="true"></i>
                            </a>
                          </li>
                          <li class="list-inline-item">
                            <a href="#" class="link-one">
                              <i class="bi bi-twitter" aria-hidden="true"></i>
                            </a>
                          </li>
                          <li class="list-inline-item">
                            <a href="#" class="link-one">
                              <i class="bi bi-instagram" aria-hidden="true"></i>
                            </a>
                          </li>
                          <li class="list-inline-item">
                            <a href="#" class="link-one">
                              <i class="bi bi-linkedin" aria-hidden="true"></i>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section><!-- End Contact Single-->

  </main><!-- End #main -->
<?php
require_once("layouts/footer.php");
?>