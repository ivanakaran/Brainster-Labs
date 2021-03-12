<?php
require_once "include_php/db.php";

$NameError = "";
$EmailError = "";
$CompanyError = "";
$CategoryError = "";
$PhoneError = "";
$submissionSuccess = "";

if (isset($_POST['Submit'])) {
  if (empty($_POST["Name"])) {
    $NameError = " * Име и презиме се задолжителни!";
  } else {
    $Name = Test_User_Input($_POST["Name"]);
  }
  if (empty($_POST["Company"])) {
    $CompanyError = " * Имe од компанијата е задолжително!";
  } else {
    $Company = Test_User_Input($_POST["Company"]);
  }
  if (empty($_POST["Email"])) {
    $EmailError = " * Имeјл од компанијата е задолжителен!";
  } else {
    $Email = Test_User_Input($_POST["Email"]);
  }
  if (empty($_POST["Phone"])) {
    $PhoneError = " * Контакт телефон е задолжителен!";
  } else {
    $Phone = Test_User_Input($_POST["Phone"]);
  }
  if (empty($_POST["Category"])) {
    $CategoryError = " * Една од понудените опции е задолжителна!";
  } else {
    $Category = Test_User_Input($_POST["Category"]);
  }
}
function Test_User_Input($data)
{
  return $data;
}

if (isset($_POST['Submit'])) {
  if (!empty($_POST["Name"]) && !empty($_POST["Company"]) && !empty($_POST["Email"]) && !empty($_POST["Category"])) {
    $name = $_POST["Name"];
    $company = $_POST["Company"];
    $email = $_POST["Email"];
    $phone = $_POST["Phone"];
    $type = $_POST["Category"];
    global $connectingDB;
    $sql = "INSERT INTO students_record(name_surname, company_name, email, phone, student_type)
    VALUES(:namE_surnamE, :company_namE, :emaiL, :phonE, :student_typE)";
    $stmt = $connectingDB->prepare($sql);
    $stmt->bindValue(':namE_surnamE', $name);
    $stmt->bindValue(':company_namE', $company);
    $stmt->bindValue(':emaiL', $email);
    $stmt->bindValue(':phonE', $phone);
    $stmt->bindValue(':student_typE', $type);
    $execute = $stmt->execute();
    if ($execute) {
      $submissionSuccess = "Ви благодариме. Вашите податоци се зачувани. Ќе бидете контактирани наскоро.";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Google Font Link -->
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital@0;1&display=swap" rel="stylesheet">
  <!-- Font Awesome Link-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
    integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous" />
  <!-- Bootstrap Links -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
  <!-- CSS Link -->
  <link rel="stylesheet" href="./css/style.css">
  <title>Вработи студенти</title>
</head>

<body>
  <!--        Navigation Bar & Side Menu     -->
  <nav class="nav-bar container-fluid pt-4 pb-2 px-lg-5">
    <div class="logo text-center">
      <a href="index.html">
        <img src="img/logo.png" alt="Logo">
        <h6 class="font-weight-bold">Brainster</h6>
      </a>
    </div>
    <ul class="nav-links">
      <li>
        <a href="https://marketpreneurs.brainster.co/" target="_blank" class="academyLink">Aкадемија
          за
          маркетинг</a>
      </li>
      <li>
        <a href="http://codepreneurs.co/" target="_blank" class="academyLink">Академија
          за
          програмирање</a>
      </li>
      <li>
        <a href="https://datascience.brainster.co/" target="_blank" class="academyLink">Академија
          за
          data
          science</a>
      </li>
      <li>
        <a href="https://design.brainster.co" target="_blank" class="academyLink">Академија
          за дизајн</a>
      </li>
    </ul>
    <div class="btn-width">
      <a href="form.php" class="btn mb-3" target="_blank">Вработи
        наш
        студент</a>
    </div>
    <span class="open-slide">
      <a href="#" onclick="openSlideMenu()">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </a>
    </span>
  </nav>
  <div id="side-menu" class="side-nav">
    <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
    <a href="https://marketpreneurs.brainster.co/" target="_blank" class="academyLink">Aкадемија
      за
      маркетинг</a>
    <a href="http://codepreneurs.co/" target="_blank" class="academyLink">Академија
      за
      програмирање</a>
    <a href="https://datascience.brainster.co/" target="_blank" class="academyLink">Академија
      за
      data
      science</a>
    <a href="https://design.brainster.co/" target="_blank" class="academyLink">Академија
      за дизајн</a>
    <a href="form.php" class="btn btn-md" target="_blank">Вработи
      наш
      студент</a>
  </div>
  <!--    End of  Navigation Bar & Side Menu     -->

  <!--             FORM             -->
  <main>
    <div class="py-5 text-center">
      <h1 class="form-header mt-5"><b>Вработи студенти</b></h1>
      <p class="successMessage text-center font-italic"><?php echo $submissionSuccess; ?></p>
    </div>
    <div class="container py-5">
      <form action="form.php" method="POST">
        <div class="row justify-content-center mx-5">
          <!--  Name and Surname -->
          <div class="col-lg-5 col-md-6">
            <div class="form-group">
              <label for="name">
                <b>Име и презиме *</b>
              </label>
              <input type="text" class="form-control p-4" id="name" name="Name" placeholder="Вашето име и презиме">
              <p class="errorMessage font-italic"><?php echo $NameError; ?></p>
            </div>
          </div>
          <!--   Company Name -->
          <div class="col-lg-5 col-md-6">
            <div class="form-group">
              <label for="companyName">
                <b>Име на компанија *</b>
              </label>
              <input type="text" class="form-control p-4" id="companyName" name="Company"
                placeholder="Име на вашата компанија">
              <p class="errorMessage font-italic"><?php echo $CompanyError; ?></p>
            </div>
          </div>
          <!--   Email  -->
          <div class="col-lg-5 col-md-6">
            <div class="form-group">
              <label for="email">
                <b>Контакт имејл *</b>
              </label>
              <input type="email" class="form-control p-4" id="email" name="Email"
                placeholder="Контакт имејл на вашата компанија">
              <p class="errorMessage font-italic"><?php echo $EmailError; ?></p>
            </div>
          </div>
          <!-- Phone Number -->
          <div class="col-lg-5 col-md-6">
            <div class="form-group">
              <label for="phoneNum">
                <b>Контакт телефон *</b>
              </label>
              <input type="phone" class="form-control p-4" id="phoneNum" name="Phone"
                placeholder="Контакт телефон на вашата компанија">
              <p class="errorMessage font-italic"><?php echo $PhoneError; ?></p>
            </div>
          </div>
          <!-- Type of Student -->
          <div class="col-lg-5 col-md-6">
            <p><b>Тип на студенти *</b></p>
            <select name="Category" class="selectpicker select" multiple title="Изберете тип на студент">
              <option value="Студенти од маркетинг">Студенти од маркетинг</option>
              <option value="Студенти од програмирање">Студенти од програмирање</option>
              <option value="Студенти од data science">Студенти од data science</option>
              <option value="Студенти од дизајн">Студенти од дизајн</option>
            </select>
            <p class="errorMessage font-italic"><?php echo $CategoryError; ?></p>
          </div>
          <!-- Send Button -->
          <div class="col-lg-5 col-md-6">
            <div class="form-button">
              <input type="Submit" name="Submit" value="испрати" class="btn btn-block btn-red">
            </div>
          </div>
        </div>
      </form>
      <!-- End of Form -->
    </div>
  </main>
  <!--    Footer    -->
  <footer class="container-fluid text-center">
    <p class="py-2 m-0">Изработено со <span><i class="fas
            fa-heart"></i></span> од студентите на Brainster</p>
  </footer>

  <!-- Included from Bootstrap-->
  <script src="http://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/i18n/defaults-*.min.js"></script>
  </script>
  <script type='text/javascript' src="js/script.js"></script>
</body>

</html>