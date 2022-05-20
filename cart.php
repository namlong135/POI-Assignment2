<?php
session_start();
$isCartEmpty = !isset($_SESSION['cart']);
echo $isCartEmpty;
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
  <title>Cart</title>
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
  <h1 class="display-5 fw-bold text-center" style="margin: 30px auto;">Cart Summary</h1>
  <form method="POST" action="checkout.php" id="checkoutForm" name="checkoutForm" onsubmit="return validateRentalDays()">
    <div class="container">
      <table class="table table-hover ">
        <thead class="thead-light">
          <tr class="table-dark">
              <th>Thumbnail</th>
              <th>Vehicle</th>
              <th>Price Per Day</th>
              <th>Rental Days</th>
              <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if (isset($_SESSION['cart'])) {
              foreach ($_SESSION["cart"] as $id => $item) {
          ?>
              <tr>
                <td class='align-middle'><img style='width: 200px; height: 160px;' class='img-thumbnail' src='./images/<?php echo $item['model'] ?>.jpg'></td>
                <td class='align-middle'><?php echo $item['brand'] . '-' . $item['model'] . '-' . $item['modelYear']; ?></td>
                <td class='align-middle'><?php echo $item['pricePerDay']; ?>$</td>
                <td class='align-middle'><input id="rentalDays" name='rentalDays[]' type="number" min="1" value=<?php echo $item['rentalDays']; ?>></td>
                <td class='align-middle'><button class='btn btn-danger' name='delete' value='<?php echo $id; ?>' form="removeCar">Delete</button></td>
            </tr>
          <?php 
              }   
            }
          ?>
        </tbody>
      </table>
    </div>
    <div class="text-right" style="display: flex;justify-content: end;margin-right: 130px;"><button type="submit" class="btn btn-primary" onsubmit="">Processing to Checkout</button></div>
    </div>
  </form>

  <form id="removeCar" name="removeCar" method="POST" action="removeCar.php?<?php echo $id?>">

  </form>
  <script>

  </script>
</body>
</html>