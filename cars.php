<?php
class Cars implements JsonSerializable
{
  var $id;
  var $category;
  var $availability;
  var $brand;
  var $model;
  var $modelYear;
  var $mileage;
  var $fuelType;
  var $seats;
  var $pricePerDay;
  var $description;

  function __construct($id, $category, $availability, $brand, $model, $modelYear, $mileage, $fuelType, $seats, $pricePerDay, $description)
  {
    $this->id = $id;
    $this->category = $category;
    $this->availability = $availability;
    $this->brand = $brand;
    $this->model = $model;
    $this->modelYear = $modelYear;
    $this->mileage = $mileage;
    $this->fuelType = $fuelType;
    $this->seats = $seats;
    $this->pricePerDay = $pricePerDay;
    $this->description = $description;
  }

  function jsonSerialize()
  {
    if ($this->availability == 1) $availability = "Y";
    else $availability = "N";
    $json = array(
      "id" => $this->id,
      "category" => $this->category,
      "availability" => $availability,
      "brand" => $this->brand,
      "model" => $this->model,
      "modelYear" => $this->modelYear,
      "mileage" => $this->mileage,
      "fuelType" => $this->fuelType,
      "seats" => $this->seats,
      "pricePerDay" => $this->pricePerDay,
      "description" => $this->description,
    );
    return $json;
  }
}

$bmw = new Cars(0, "Sedan", 1, "BMW", "320i", "2012", "10000", "petrol", 5, "120", "xxxxxx");
$camry = new Cars(1, "Sedan", 0, "Toyota", "Camry", "2010", "15000", "petrol", 5, "120", "xxxxxx");
$captiva = new Cars(2, "SUV", 0, "Holden", "Captiva", "2020", "16000", "petrol", 5, "120", "xxxxxx");
$cherokee = new Cars(3, "SUV", 1, "Jeep", "Cherokee", "2018", "19000", "petrol", 5, "120", "xxxxxx");
$civic = new Cars(4, "Wagon", 1, "Honda", "Civic", "2015", "20000", "petrol", 5, "120", "xxxxxx");
$glc = new Cars(5, "SUV", 1, "Mercedes", "GLC", "2017", "17000", "petrol", 5, "120", "xxxxxx");
$golf = new Cars(6, "Sedan", 1, "Suzuki", "Jimny", "2014", "18000", "petrol", 5, "120", "xxxxxx");
$jimny = new Cars(7,"SUV", 1, "BMW", "320i", "2013", "18500", "petrol", 5, "120", "xxxxxx");
$sonata = new Cars(8,"Sedan", 1, "Hyundai", "Sonata", "2015", "19700", "petrol", 5, "120", "xxxxxx");
$xtrail = new Cars(9, "SUV", 0, "Nissan", "X-Trail", "2016", "21000", "petrol", 5, "120", "xxxxxx");

$array = array(
  "status" => "OK",
  "product" => array($bmw, $camry, $captiva, $cherokee, $civic, $glc, $golf, $jimny, $sonata, $xtrail)
);

file_put_contents("data/cars.json", json_encode($array, JSON_PRETTY_PRINT))

?>