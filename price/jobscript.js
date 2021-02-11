function validatename()
{
  var name = document.getElementById('nameid').value;
  var regexp =/^(?!\s*$)[a-zA-Z\s]+$/;
  var bool = regexp.test(name);
  if (bool == false)
  {
    alert("Please enter a valid name (only letters and spaces)");
  }
  return bool;
}

function validateemail()
{
  var email = document.getElementById('Emailid').value;
  var regexp =/^([\w-.]+)(@(?=[\w-.]+))([\w]+\.(?=[\w]+)){1,3}([\w]{2,3}$)/;
  var bool = regexp.test(email);
  if (bool == false)
  {
    alert("Please enter a valid email.");
  }
  return bool;
}

function validatedate()
{
  var now = new Date();
  var array = [now.getFullYear(),now.getMonth()+1,now.getDate()];
  var date = document.getElementById('Dateid').value.split('-');
  var bool = Number(date[0])>=Number(array[0]) && Number(date[1])>=Number(array[1]) && Number(date[2])>Number(array[2]);
  if (bool == false)
  {
    alert("Please enter a valid start date.");
  }
  return bool;
}

function validateform()
{
  return (validatedate() && validateemail() && validatename())
}
