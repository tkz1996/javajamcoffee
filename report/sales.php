<html lang="en">
  <head>
  <meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
  <title>JavaJam Coffee House Product Price Update</title>
  <style>
  #salesbox
  {
    padding: 5px;
    font-family: Arial, sans-serif;
  	font-size: 125%;
  	font-weight: bold;
  	color: #883300;
    text-align: left;
    margin: 20px;
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
					Click to generate daily sales report:
				</h2>
        <div id='salesbox'>
				<form method="POST" action='totalsales.php' id='totalsales' target="_blank">
          <input type='checkbox' id='checky0' onclick='check_boxes(checky0)'></input>Total dollar sales by products
        </form>
        <form method="POST" action='categorysales.php' id='categorysales' target="_blank">
          <input type='checkbox' id='checky1' onclick='check_boxes(checky1)'></input>Sales quantities by product categories
        </form>
        </div>
			</div>
		</div>
		<footer >
			<small><i>Copyright &copy; 2014 JavaJam Coffee House <br> <a href="mailto:Ken_Zi@Teo.com">Ken_Zi@Teo.com</i></small></a>
		</footer>
	</div>
  <script src="salesscript.js"></script>
  </body>
</html>
