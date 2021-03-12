<?php
require_once "include_php/db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Google Font Link -->
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital@0;1&display=swap" rel="stylesheet">
  <!-- Bootstrap Link -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
  <!-- CSS Link -->
  <link rel="stylesheet" href="css/style.css">
  <title>Преглед од база на податоци</title>
</head>

<body class="bg-light">
  <div class="container py-5">
    <div class="row">
      <div class="col-9 text-center">
        <form action="view_from_database.php" class="" method="GET">
          <input type="text" name="Search" value="" placeholder="Пребарај по име и презиме или контакт имејл"
            class="w-75 ml-auto p-2 form-control">
      </div>
      <div class="col-3">
        <input class="btn btn-outline-primary" type="submit" name="SearchButton" value="Пребарај">
      </div>
      </form>
    </div>
  </div>
  <?php
  if (isset($_GET["SearchButton"])) {
    global $connectingDB;
    $search = $_GET["Search"];
    $sql = "SELECT * FROM students_record WHERE name_surname=:searcH OR email=:searcH";
    $stmt = $connectingDB->prepare($sql);
    $stmt->bindValue(':searcH', $search);
    $stmt->execute();
    while ($dataRows = $stmt->fetch()) {
      $id = $dataRows["id"];
      $name = $dataRows["name_surname"];
      $company = $dataRows["company_name"];
      $email = $dataRows["email"];
      $phone = $dataRows["phone"];
      $type = $dataRows["student_type"];
  ?>
  <div class="container">
    <h3 class="text-center py-5 text-success">Резултати од пребарување</h3>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Име и презиме</th>
          <th scope="col">Име на компанија</th>
          <th scope="col">Контакт имејл</th>
          <th scope="col">Контакт телефон</th>
          <th scope="col">Тип на студенти</th>
          <th scope="col">Пребарај повторно</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th><?php echo $id; ?></th>
          <td><?php echo $name; ?></td>
          <td><?php echo $company; ?></td>
          <td><?php echo $email; ?></td>
          <td><?php echo $phone; ?></td>
          <td><?php echo $type; ?></td>
          <td><a href="view_from_database.php">Пребарај Повторно</a></td>
        </tr>
      </tbody>
    </table>
    <?php }
  }
    ?>
    <div class="container">
      <h3 class="text-center py-5">Преглед од база на податоци</h3>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Име и презиме</th>
            <th scope="col">Име на компанија</th>
            <th scope="col">Контакт имејл</th>
            <th scope="col">Контакт телефон</th>
            <th scope="col">Тип на студенти</th>
          </tr>
        </thead>
        <?php
        global $connectingDB;
        $sql = "SELECT * FROM students_record";
        $stmt = $connectingDB->query($sql);
        while ($dataRows = $stmt->fetch()) {
          $id = $dataRows["id"];
          $name = $dataRows["name_surname"];
          $company = $dataRows["company_name"];
          $email = $dataRows["email"];
          $phone = $dataRows["phone"];
          $type = $dataRows["student_type"]; ?>
        <tr>
          <th><?php echo $id; ?></th>
          <td><?php echo $name; ?></td>
          <td><?php echo $company; ?></td>
          <td><?php echo $email; ?></td>
          <td><?php echo $phone; ?></td>
          <td><?php echo $type; ?></td>
        </tr>
        <?php
        } ?>
      </table>
    </div>

    <!-- Included From Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>