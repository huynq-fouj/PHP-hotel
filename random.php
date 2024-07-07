<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Check-in Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header, .section-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .section-header {
            margin-top: 30px;
            margin-bottom: 10px;
            font-weight: bold;
            font-size: 18px;
            background-color: #e9ecef;
            padding: 10px;
            border-radius: 5px;
        }
        .info-table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }
        .info-table th, .info-table td {
            border: 1px solid #dee2e6;
            padding: 10px;
        }
        .info-table th {
            width: 30%;
            background-color: #e9ecef;
        }
        .signature-section {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Grand Overview Hotel</h1>
        <p>grandoverviewhotel.com</p>
        <div class="d-flex justify-content-between">
            <div></div>
            <div><img src="/home/vandunxg/CODE/Project/hostay/public/user-profile.jpg" alt="Logo" width="50"></div>
        </div>
    </div>

    <h2 class="text-center">Hotel Check-in Form</h2>

    <div class="section-header">Guest Information</div>
    <table class="info-table">
        <tr>
            <th>Name:</th>
            <td>Ashley Geller</td>
        </tr>
        <tr>
            <th>Address:</th>
            <td>Park Estates, Chesterville, Maine</td>
        </tr>
        <tr>
            <th>Phone Number:</th>
            <td>222 555 7777</td>
        </tr>
        <tr>
            <th>Email Address:</th>
            <td>ashleygeller@mails.com</td>
        </tr>
        <tr>
            <th>Nationality:</th>
            <td>American</td>
        </tr>
    </table>

    <div class="section-header">Reservation Details</div>
    <table class="info-table">
        <tr>
            <th>Check-In Date:</th>
            <td>December 23, 2050</td>
        </tr>
        <tr>
            <th>Check-Out Date:</th>
            <td>December 26, 2050</td>
        </tr>
        <tr>
            <th>Room Type:</th>
            <td>Deluxe Suite</td>
        </tr>
        <tr>
            <th>Number of Guests:</th>
            <td>2 Adults</td>
        </tr>
        <tr>
            <th>Special Requests:</th>
            <td>Non-Smoking, Top Floor</td>
        </tr>
    </table>

    <div class="section-header">Payment Information</div>
    <table class="info-table">
        <tr>
            <th>Card Type:</th>
            <td>Visa</td>
        </tr>
        <tr>
            <th>Card Number:</th>
            <td>00112233445566</td>
        </tr>
        <tr>
            <th>Expiry Date:</th>
            <td>01/55</td>
        </tr>
    </table>

    <div class="signature-section">
        <table class="info-table">
            <tr>
                <th>Guest Signature:</th>
                <td></td>
            </tr>
            <tr>
                <th>Date:</th>
                <td></td>
            </tr>
        </table>
    </div>
</div>

</body>
</html>
