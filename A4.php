<!doctype html>

<html lang="en">

	<head>

		<title>Jabong Onling Shopping</title>

		<meta charset="utf-8">

		<link rel="stylesheet" href="styles/style.css">
		<script src = "styles/shoppingCart.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script>
		
		//jquery to hind and show image 1
			$(document).ready(function()
		{
			 $(".btn1").click(function()
			 {
				$(".image1").hide();
			 });
			 
			$(".btn2").click(function()
			 {
				$(".image1").show();
			 });
		});
		
		//jquery to hind and show image 2
		$(document).ready(function()
		{
			 $(".btn3").click(function()
			 {
				$(".image2").hide();
			 });
			 
			$(".btn4").click(function()
			 {
				$(".image2").show();
			 });
		});
	</script>
		
	</head>
	
	<body >

		<header>

			<h2>Welcome to Jabong</h2>
			<h3>Online store for books</h3>

    	</header>

		<article>
			<h3>Select at least one product by specifying the quantity more than 0 and then fill the order form. When you click the submit button it will give you receipt</h3>
		
			<form  method="post" action="receipt.php" onsubmit="return FormValidation()"   >

				<table>
				
					<thead>
					
						<tr>
							<th class="left">Product Name</th>
							<th class="left">Price</th>
							<th class="left">Quantity</th>
						</tr>
						
					</thead>
					<br>
					
					<tbody>
					
						<tr>				
							<td class="left" name = "item"><br><br>
								Murach for HTML and CSS
								<img class = "image1" src = "images/murach_html.jpg" width = "150px" height = "150px"><br>
								<input type="button" class ="btn1" value="Hide Image" >
								<input type="button" class ="btn2" value="Show Image" >									
							</td>
							<td class="right" name="item">$25</td>
							<td>
								<select name="quantity" id="quantity1">
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
								</select>
							</td>				
						</tr>
						
						<tr>				
							<td class="left" name="item2"><br><br>
								Murach for c#	
								<img class = "image2" src = "images/murach's_c_sharp.jpg" width = "150px" height = "150px"><br>
								<input type = "button" class = "btn3" value = "Hide Image" >
								<input type = "button" class = "btn4" value = "Show Image" >																				
							</td>
							<td class="right" name="item2">$35</td>
							<td>
								<select name="quantity2" id="quantity2">
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
								</select>
							</td>
						</tr>
						
					</tbody>
					
				</table>		

										
				<fieldset>

					<legend>Order Form</legend>
					<p align="center">NOTE: fields with red boxes are mandatory</p><br><br>
					
					<label for="first_name">First Name:</label>
					<input class="mandatory" type="text" name="first_name" id="first_name">
					<br>
					<br>

					<label for="last_name">Last Name:</label>
					<input class="mandatory" type="text" name="last_name" id="last_name">
					<br>
					<br>

					<label for="address">Address:</label>
					<input  class="mandatory" type="text" name="address" id="address">
					<br>
					<br>

					<label for="city">City:</label>
					<input class="mandatory" type="text" name="city" id="city">				 
					<br>
					<br>

					<label for="province">Province:</label>
					<select class = "mandatory" name="province" id="province">
						<option  value="Please Select">Please Select</option>
						<option  value="Alberta">Alberta</option>
						<option  value="Manitoba">Manitoba</option>
						<option  value="New Brunswick">New Brunswick</option>
						<option  value="Newfoundland">Newfoundland</option>
						<option  value=" Northwest Territories"> Northwest Territories</option>
						<option  value="Nova Scotia">Nova Scotia</option>
						<option  value="Nunavut">Nunavut</option>
						<option  value="Ontario">Ontario</option>
						<option  value="Prince Edward Island">Prince Edward Island</option>
						<option  value="Quebec">Quebec</option>
						<option  value="Saskatchewan">Saskatchewan</option>
						<option  value="Yukon">Yukon</option>
					</select>
					<br>
					<br>

					<label for="postal">Postal Code:</label>
					<input  class="mandatory" type="text" name="postal" id="postal" maxlength="7"
						placeholder="LDL DLD  L: Letter, D:Digits">	
					<span id="postalError" style="color:red"></span>						
					<br>
					<br>

					<label for="phone">Phone Number:</label>
					<input class="mandatory" type="tel" name="phone" id="phone"
						placeholder="999-999-9999" maxlength="12">
					<span id="phoneError" style="color:red"></span>
					<br>
									
					<span id="outputError" style="color:red"></span>
					
					<br>
					
				</fieldset>
				
				<fieldset>
					<legend>Submit your order Form</legend>
					<input type="submit" id="submit" value="Submit" name = "submit" >
					<input type="reset" id="reset" value="Reset Fields"><br>
				</fieldset>

			</form>

		</article>

		<footer>

			<p>Prepared By: Archana Lohani</p>
			<p> Group Number: 18</p>

		</footer>

	</body>

</html>