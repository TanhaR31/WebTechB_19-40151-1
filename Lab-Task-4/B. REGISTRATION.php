<!DOCTYPE HTML>  
<html>
<head>
  <title>xCompany</title>
  <link rel="stylesheet" type="text/css" href="Table.css">
</head>
<body>
<table>
    <tr>
      <td>
      <br><img src="companylogo.jpg" alt="company" width="100" height="40">
      <p style="text-align: right;">
            <a href="A. PUBLIC HOME.php"> Home |</a>
            <a href="C. LOGIN.php"> Login |</a>
            <a href="B. REGISTRATION.php"> Registration  </a><br><br><br>
      </p>
      </td>
    </tr>
    <tr>
      <td style="padding-left: 100px; padding-right: 100px;">
        <?php include_once 'Form.php' ?>
      </td>
    </tr>
    <tr>
      <td style="text-align: center;">
        <?php require 'footer.php';?>
      </td>
    </tr>
  </table>
</body>
</html>
