<?php
session_start();

$fullName = $_POST["fname"] . "&nbsp" . $_POST["lname"];
$email = $_POST["email"];
$city = $_POST["city"];
$state = $_POST["state"];
$postcode = $_POST["postcode"];
$payment = $_POST["payment"];

if(!empty($_POST["address2"])) {
  $address = $_POST["address1"] . "&nbsp" . $_POST["address2"] . "&nbsp" . $city . "&nbsp" . $postcode . "&nbsp" . $state;
} else {
  $address = $_POST["address1"] . "&nbsp" . $city . "&nbsp" . $postcode . "&nbsp" . $state;
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title>Order Confirmation</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Hertz - UTS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <button class="btn btn-primary" onclick="checkCart(<?php echo $empty ?>)">
          Car Reservation
      </button>
    </div>
  </nav>
  <h1 class="display-5 fw-bold text-center" style="margin: 30px auto;">Order Summary</h1>
  <div class="m-5">
    <h3 class="text-left" style="margin: 30px auto;">Customer Details</h1>
    <ul class="list-group list-group-flush">
      <li class="list-group-item"><b>Customer Name:  </b><?php echo $fullName ?></li>
      <li class="list-group-item"><b>Customer Email:  </b><?php echo $email ?></li>
      <li class="list-group-item"><b>Customer Address:  </b><?php echo $address ?></li>
      <li class="list-group-item"><b>Customer Payment Method:  </b><?php echo $payment ?></li>
    </ul>
  </div>
  <div class="m-5">
    <h3 class="text-left" style="margin: 30px auto;">Order Details</h1>
    <div class="container">
      <table class="table table-hover ">
        <thead class="thead-light">
          <tr class="table-dark">
              <th>Thumbnail</th>
              <th>Vehicle</th>
              <th>Price Per Day</th>
              <th>Rental Days</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if (isset($_SESSION['cart'])) {
              foreach ($_SESSION["cart"] as $id => $item) {
          ?>
              <tr>
                <td class='align-middle'><img style='width: 200px; height: 160px;' class='img-thumbnail' src='./images/<?php echo $item['model'] ?>.jpg'></td>
                <td class='align-middle'><?php echo $item['modelYear'] . '-' . $item['model'] . '-' . $item['brand']; ?></td>
                <td class='align-middle'>$<?php echo $item['pricePerDay']; ?></td>
                <td class='align-middle'><?php echo $item['rentalDays']; ?></td>
            </tr>
          <?php 
              }   
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>

<?php
session_destroy();
?>