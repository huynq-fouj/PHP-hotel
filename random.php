<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Timepicker</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempus-dominus/5.39.0/css/tempus-dominus.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2>Bootstrap Timepicker Example</h2>
    <div class="form-group">
      <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3"/>
        <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
          <div class="input-group-text"><i class="fa fa-clock"></i></div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/min/moment.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/tempus-dominus@5.39.0/js/tempus-dominus.min.js"></script>
  <script>
    $(function () {
      $('#datetimepicker3').datetimepicker({
        format: 'LT'
      });
    });
  </script>
</body>
</html>
