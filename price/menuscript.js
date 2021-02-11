function totalcalc()
{
  var boolean = cafecalc() && icedcalc() && javacalc();
  if (!boolean)
  {
    return false;
  }
  var cafe = document.getElementById("cafetotal").value;
  var iced = document.getElementById("icedtotal").value;
  var java = document.getElementById("javatotal").value;
  var total = cafe+iced+java;
  document.getElementById("totalcost").innerHTML = "$"+total;
  return boolean;
}

function cafecalc()
{
  var small = document.getElementById("caferadios").checked;
  var large = document.getElementById("caferadiol").checked;
  var price = 0;
  if (small)
  {
    price = 2.00;
  }
  else if (large)
  {
    price = 3.00;
  }
  else
  {
    alert("Please select one of the cafe options.");
    return false;
  }
  var quantity = Number(document.getElementById("cafequantity").value);
  if (quantity<0)
  {
    alert("Quantity must be at least 0.");
    return false;
  }
  var subtotal = document.getElementById("cafetotal");
  subtotal.value = quantity*price;
  subtotal.innerHTML = "$"+subtotal.value;
  return true;
}

function icedcalc()
{
  var small = document.getElementById("icedradios").checked;
  var large = document.getElementById("icedradiol").checked;
  var price = 0;
  if (small)
  {
    price = 4.75;
  }
  else if (large)
  {
    price = 5.75;
  }
  else
  {
    alert("Please select one of the cafe options.");
    return false;
  }
  var quantity = Number(document.getElementById("icedquantity").value);
  if (quantity<0)
  {
    alert("Quantity must be at least 0.");
    return false;
  }
  var subtotal = document.getElementById("icedtotal");
  subtotal.value = quantity*price;
  subtotal.innerHTML = "$"+subtotal.value;
  return true;
}

function javacalc()
{
  var price = 2.00;
  var quantity = Number(document.getElementById("javaquantity").value);
  if (quantity<0)
  {
    alert("Quantity must be at least 0.");
    return false;
  }
  var subtotal = document.getElementById("javatotal");
  subtotal.value = quantity*price;
  subtotal.innerHTML = "$"+subtotal.value;
  return true;
}
