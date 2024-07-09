<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>HostayAdmin</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#"
  class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Vendor JS Files -->
  <script src="/hostay/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/hostay/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="/hostay/assets/vendor/echarts/echarts.min.js"></script>
  <script src="/hostay/assets/vendor/quill/quill.min.js"></script>
  <script src="/hostay/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/hostay/assets/vendor/tinymce/tinymce.min.js"></script>
  


  <!-- Template Main JS File -->
  <script src="/hostay/assets/js/admin_main.js"></script>
  <script src="/hostay/assets/js/validation.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 
  <script type="text/javascript" charset="utf-8">
      function waitForMsg() {
        $.ajax({
          type: "GET",
          url: "/hostay/actions/checkvoucher.php",
          async: true,
          cache: false,
          timeout: 5000,
          success: function(data) {
           console.log(data);
            setTimeout(waitForMsg, 5000);
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(textStatus);
            setTimeout(waitForMsg, 15000);
          }
        });
      };
      $(document).ready(function() {
        waitForMsg();
      });
    </script>

</body>

</html>