<html lang="en">
  <head>
  <meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
  <title>JavaJam Coffee House Product Price Update</title>
  <style>
  table
  {
    margin: auto; width: 600px; border-spacing: 0;
  }
  td, th
  {
    padding: 5px;
    font-family: Arial, sans-serif;
    border-style: none;
    border:1px solid white;
    text-align: left;
  }
  tr:nth-of-type(4n-3)
  {
    background-color: rgb(204,170,102);
  }
  tr:nth-of-type(4n-2)
  {
    background-color: rgb(204,170,102);
  }
  #menu
  {
    padding: 20px;
  }
  table.menutable td
  {
    border-bottom-color: inherit;
    border-bottom: 0px;
    border-width: 0px;
    border-right-width: 1px;
  }
  #leftcolumn
  {
    height: 350px;
  }
  #rightcolumn
  {
    height: 350px;
  }
  </style>
  </head>
  <body>
    <?php include('constants.php');
    $conn = mysqli_connect($servername, $username, $password, $databasename);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST))
    {
      foreach ($_POST as $key => $value)
      {
        $namearray = explode("_",$key);
        $query = mysqli_query($conn, "UPDATE $pricetable SET $namearray[1]='$value' WHERE item='$namearray[0]'");
      }
    }
    ?>
	<div id="wrapper">
		<div>
			<h1>
				<img src="javalogo.gif">
			</h1>
		</div>
		<div id="leftcolumn"><nav id="leftcolumn">
				<ul>
					<li><a href="price.php">Product Price Update</a></li>
					<li><a href="sales.php">Sales Report</a></li>
				</ul>
		</div></nav>
		<div id="rightcolumn">
			<div class="content">
				<h2 id="contenttitle">
					Click to update product prices:
				</h2>
				<form method="post" action="price.php" id="menu">
          <table border="0" class="menutable">
          	<tr>
              <td rowspan="2"><input type="checkbox" id="java" name="java price1" value="1" onclick="check_boxes(java)">Cup</td>
              <td rowspan ="2" style="text-align:center">Just Java</td>
          		<td rowspan="1">Regular house blend, decaffeinated coffee, or flavor of the day.</td>
            </tr>
            <tr>
              <td rowspan="1"><?php $cur_price = mysqli_query($conn, "SELECT price1 FROM $pricetable WHERE item='java'");
              if (mysqli_num_rows($cur_price) > 0) {
                while($row = mysqli_fetch_assoc($cur_price)) {
                  echo "Endless Cup $" . $row['price1'];
                }
              }
              ?></td>
          	</tr>
          	<tr>
              <td rowspan="2"><input type="checkbox" id="cafe1" name="cafe price1" value="2" onclick="check_boxes(cafe1)">Single</br><input type="checkbox" id="cafe2" name="cafe price2" value="3" onclick="check_boxes(cafe2)">Double</td>
              <td rowspan="2" style="text-align:center">Cafe au Lait</td>
          		<td rowspan="1">House blended coffee infused into a smooth, steamed milk.</td>
            </tr>
            <tr>
              <td rowspan="1">
                <?php $cur_price = mysqli_query($conn, "SELECT price1,price2 FROM $pricetable WHERE item='cafe'");
                if (mysqli_num_rows($cur_price) > 0) {
                  while($row = mysqli_fetch_assoc($cur_price)) {
                    echo "Single $" . $row['price1']. " Double $".$row['price2'];
                  }
                }
                ?>
              </td>
            </tr>
          	<tr>
              <td rowspan="2"><input type="checkbox" id="iced1" name="iced price1" value="4" onclick="check_boxes(iced1)">Single</br><input type="checkbox" id="iced2" name="iced price2" value="5" onclick="check_boxes(iced2)">Double</td>
              <td rowspan="2" style="text-align:center">Iced Cuppucino</td>
          		<td rowspan="1">Sweetened espresso blended with icy-cold milk and served in a chilled glass.</td>
            </tr>
            <tr>
              <td rowspan="1">
                <?php $cur_price = mysqli_query($conn, "SELECT price1,price2 FROM $pricetable WHERE item='iced'");
                if (mysqli_num_rows($cur_price) > 0) {
                  while($row = mysqli_fetch_assoc($cur_price)) {
                    echo "Single $" . $row['price1']. " Double $".$row['price2'];
                  }
                }
                ?>
              </td>
          	</tr>
          </table>
				</form>
			</div>
		</div>
		<footer >
			<small><i>Copyright &copy; 2014 JavaJam Coffee House <br> <a href="mailto:Ken_Zi@Teo.com">Ken_Zi@Teo.com</i></small></a>
		</footer>
	</div>
  <script src="pricescript.js"></script>
  </body>
</html>
