const validateRentalDays = () => {
  let value = document.getElementById("rentalDays").value;
  let numberRegex = new RegExp(/^\+?(0|[1-9]\d*)$/);
  let other = new RegExp(/[^0-9]+/);

  if (value.match(numberRegex)) {
    let numberOfRentalDays = parseInt(value);
    if (numberOfRentalDays <= 0) {
      alert('Invalid number of days, please try again');
      return false;
    }
    else if (value.match(other)) {
      alert('Invalid number of days, please try again');
      return false;
    }
    return true;
  }
  else {
    alert('Invalid number of days, please try again');
    return false;
  }
}

const validateCheckout = () => {
  let fname = document.getElementById('fname').value;
  let lname = document.getElementById('lname').value;
  let email = document.getElementById('email').value;
  let address1 = document.getElementById('address1').value;
  let city = document.getElementById('city').value;
  let postcode = document.getElementById('postcode').value;
  let state = document.getElementById('state').value;
  let payment = document.getElementById('payment').value;
  
  if(fname == '' || lname == '' || email == '' || address1 == '' || city == '' || postcode == '' || state == '' || payment== '' ) {
    alert('All required fields must be completed');
    return false; 
  }
  return true;
}