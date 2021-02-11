function check_boxes(caller)
{
  var menu = document.getElementById("menu");
  var chks = menu.getElementsByTagName("input");
  for (var i = 0; i < chks.length; i++)
  {
    if (chks[i] != caller && caller.checked) {
      chks[i].checked = false;
    }
  }
  if (caller.checked)
  {
    var input_price = ask_new_price();

    if (input_price === false)
    {
      caller.checked = false;
    }
    else
    {
      caller.value = input_price;
      document.getElementById("menu").submit();
    }
  }
}

function ask_new_price()
{
  var regexp = /^\d+(\.)?\d{0,2}$/;
  var new_price = prompt("Type in new price: ");
  var bool = regexp.test(new_price);
  while (!bool)
  {
    if (new_price === null)
    {
      return false;
    }
    new_price = prompt("Please type in a valid price (only numbers): ");
    bool = regexp.test(new_price);
  }
  new_price = Number(new_price);
  return new_price;
}
