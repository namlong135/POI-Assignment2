<?php
session_start();
$total = 0;
$rentalDays = $_POST['rentalDays'];
$order = 0;
foreach ($_SESSION['cart'] as $id => $item) {
  if(!empty($rentalDays) && !empty($_SESSION['cart'][$id]['rentalDays'])) {
    $_SESSION['cart'][$id]['rentalDays'] = $rentalDays[$order];
    $total += (int)$rentalDays[$order] * (int)$item["pricePerDay"];
    $order++;
  }
}
$_SESSION['total'] = $total;
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
  <script src="js/validate.js"></script>
  <title>Checkout</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Hertz - UTS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <button class="btn btn-primary">
          Car Reservation
      </button>
    </div>
  </nav>
  <div class="container">
    <h1 class="display-5 fw-bold text-center" style="margin: 30px auto;">Checkout</h1>
    <form style="width: 70%;margin: auto;" class="border border-dark rounded p-4 d-flex flex-column" action="checkoutConfirm.php" method="POST" onsubmit="return validateCheckout()">
      <div class="mb-3">
        <label for="fname" class="form-label">First Name<span style="color: red;">*</span></label>
        <input type="text" class="form-control" name="fname" id="fname">
      </div>
      <div class="mb-3">
        <label for="lname" class="form-label">Last Name<span style="color: red;">*</span></label>
        <input type="text" class="form-control" name="lname" id="lname">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address<span style="color: red;">*</span></label>
        <input type="email" class="form-control" name="email" id="email">
      </div>
      <div class="mb-3">
        <label for="address1" class="form-label">Address Line 1<span style="color: red;">*</span></label>
        <input type="text" class="form-control" name="address1" id="address1">
      </div>
      <div class="mb-3">
        <label for="address2" class="form-label">Address Line 2</label>
        <input type="text" class="form-control" name=" address2" id="address2">
      </div>
      <div class="mb-3">
        <label for="city" class="form-label">City<span style="color: red;">*</span></label>
        <input type="text" class="form-control" name=" city" id="city">
      </div>
      <div class="mb-3">
        <label for="state" class="form-label">State<span style="color: red;">*</span></label>
          <div>
            <select type="text" class="form-control" name="state" id="state">
              <option selected>New South Wales</option>
              <option>Western Australia</option>
              <option>Queensland</option>
              <option>South Australia</option>
              <option>Victoria</option>
              <option>Tasmania</option>
            </select>
          </div>
      </div>
      <div class="mb-3">
        <label for="postcode" class="form-label">Post Code<span style="color: red;">*</span></label>
        <input type="text" class="form-control" name=" postcode" id="postcode">
      </div>
      <div class="mb-3">
        <label for="payment" class="form-label">Payment Type<span style="color: red;">*</span></label>
          <div>
            <select type="text" class="form-control" name="payment" id="payment">
              <option selected>MasterCard</option>
              <option>VISA</option>
              <option>PayPal</option>
              <option>After Pay</option>
              <option>AMEX</option>
            </select>
          </div>
      </div>
      <div style="display: flex;justify-content: space-between;">
      <h3>You are required to pay $<?php echo $total; ?></h3>
            <div class="form-group row">
                <div class="col-12 text-right">
                    <a href="index.php" class="btn btn-primary">Back to selection</a>
                    <button type="submit" class="btn btn-success">Booking</button>
                </div>
            </div>
      </div>
    </form>
  </div>
</body>
</html>