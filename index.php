<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Inventory Parts List</title>
		<style>
			body {
				margin: 0px;
				/*text-align: center;*/
			}
			table {
			  font-family: arial, sans-serif;
			  border-collapse: collapse;
			  width: 90vw;
			  overflow: scroll;
			}
			#to {
			  overflow: scroll;
			}
			td, th {
			  border: 1px solid #dddddd;
			  text-align: left;
			  padding: 8px;
			  max-width: 10px;
			  overflow: hidden;
			}
			/*input {
				width: 100px;
			}*/
			h2.i {
			  color: green;
			}
			h2.e {
			  color: red;
			}
			textarea {
			  width: 100%;
			}
			span {
			  width: 100vw;
			  text-align: center;
			  display: inline-block;
			}
			form {
			  padding: 20px;
			}
		</style>
  </head>
  <body>
		<h2 class="i" align="center"><?php echo $_GET['i']; ?></h2>
		<h2 class="e" align="center"><?php echo $_GET['e']; ?></h2>
		<h1 align="center">Inventory Parts List</h1>
		<div id="to"><table align="center" id="main"></table></div><hr>
		<form action="add" method="GET">
			<h2>Add an Item:</h2>
			Barcode: <input required type="text" name="barcode" placeholder="M-38274-00" maxlength="20"><br>
			Name: <input required type="text" name="name" placeholder="Cool Motor" maxlength="300"><br>
			Supplier: <input required type="text" name="supplier" placeholder="Rev" maxlength="200"><br>
			Part #: <input required type="text" name="part" placeholder="R928" maxlength="10"><br>
			Cost: <input required type="number" name="cost" placeholder="$34" min="0"><br>
			Quantity in Stock: <input required type="number" name="stock" placeholder="2" min="0"><br>
			Quantity on Robot: <input required type="number" name="robot" placeholder="0" min="0"><br>
			Quantity in Testing: <input required type="number" name="testing" placeholder="0" min="0"><br>
			<label><input type="checkbox" name="print" checked required> Print Label</label>
		<br><input type="submit" value="Add Item"></form>
		<br><br>
		<span align="center" id="updated"></span>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="script.js"></script>
		<script>
		setTimeout(function() {
			$('h2.i, h2.e').text('');
		},5000);
		</script>
  </body>
</html>
