<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}

.row {
  margin-left:-5px;
  margin-right:-5px;
}
  
.column {
  float: left;
  width: 50%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

</style>
</head>
<body>

<div class="row">
  <div class="column">
    <table>
      <?php require 'Controller/PUBLIC USER.php' ?>
    </table>
  </div>
  <div class="column">
    <table>
      <?php require 'Controller/WELCOME USER.php' ?>
    </table>
  </div>
</div>

</body>
</html>
