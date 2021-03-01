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
		<div id="to"><table align="center" id="main"></table></div>
		<a href='/csv'>Download CSV file</a>
		<hr>
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
