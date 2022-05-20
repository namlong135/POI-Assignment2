<?php
session_start();
$isCartEmpty = !isset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title>Hertz UTS</title>
</head>

<body onload="getData()">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Hertz - UTS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <button class="btn btn-primary" onclick="checkCartEmpty(<?php echo $isCartEmpty ?>)">
          Car Reservation
      </button>
    </div>
  </nav>
  <div class="album py-5 bg-light" id="content">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="cars">

      </div>
    </div>
  </div>
  <script>
    let carData;
    const getData = () => {
      var xhttp = new XMLHttpRequest();
      var url = "./data/cars.json";
      xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
          var jsonParse = JSON.parse(xhttp.responseText);
          renderCarsData(jsonParse);
          console.log(jsonParse);
        }
      }
      xhttp.open("GET", "./data/cars.json", true);
      xhttp.send();
    }
    
    const checkCartEmpty = (isCartEmpty) => {
      if (isCartEmpty) {
        alert("No car has been reserved.");
        return false;
      } else {
        window.location.href = "cart.php";
        return true;
      }
    }

    const addToCart = (id) => {
      if (carData[id]["availability"] == "Y") { 
        $.ajax({
          method: "POST",
          url: "./addToCart.php",
          data: carData[id],
          success: (res) => {
            alert(res);
            if (res == "Add to cart successfully") {
              window.location.href = "index.php";
            }
          },
        });
      } else {
        alert("Sorry, the car you selected isn't available at the moment");
      }
    }

    const renderCarsData = (data) => {
      carData = data.product; 
      carData.forEach((car) => {
        let html = `
        <div class="col">
          <div class="card shadow-sm">
          <img style="width: 95%;height: 260px;" src="./images/${car.model}.jpg" class="card-img-top">
            <div class="card-body">
            <h5 class="card-title">${car.brand} - ${car.model} - ${car.modelYear}</h5>
              <b>Mileage: </b> ${car.mileage} <br>
              <b>Fuel Type: </b> ${car.fuelType} <br>
              <b>Seats: </b> ${car.seats} <br>
              <b>Price Per Day: </b> ${car.pricePerDay} <br>
              <b>Availability: </b> ${car.availability} <br>
              <b>Description: </b> ${car.description} <br>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: 20px;" id="button-container">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" onclick="addToCart(${car.id})" value="${car}">Add to Cart</button>
              </div>
            </div>
          </div>
        </div>
        `
        var parser = new DOMParser();
        var doc = parser.parseFromString(html, 'text/html');
        document.getElementById("cars").appendChild(doc.firstChild)
      })
    }
    </script>
</body>

</html>