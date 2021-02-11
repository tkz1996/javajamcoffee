function check_boxes(caller)
{
  var chks = document.getElementsByTagName("input");
  for (var i = 0; i < chks.length; i++)
  {
    if (chks[i] != caller && caller.checked) {
      chks[i].checked = false;
    }
  }
  if (caller.checked)
  {
    if (caller.id == 'checky0'){
      document.getElementById("totalsales").submit();
    }
    else{
      document.getElementById("categorysales").submit();
    }
  }
}
