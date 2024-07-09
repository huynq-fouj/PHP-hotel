<!DOCTYPE html>
<html>
  <head>
    <title>QR Code Reader using Instascan</title>
    <script src="html5-qrcode.min.js"></script>
  </head>
  <body>
  <div style="width: 500px" id="reader"></div>
  </body>
  <script>
    function onScanSuccess(decodedText, decodedResult) {
      // Handle on success condition with the decoded text or result.
      alert(`Scan result: ${decodedText}`);
    }

    function onScanError(errorMessage) {
        // handle on error condition, with error message
    }

    var html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess, onScanError);
  </script>
</html>
