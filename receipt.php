<html>

	<head>
		<title>Receipt</title>
	</head>
	
	<body>
		
<?php

function TrimData($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

		
$errors = array();

if(!isset($_POST['submit']))
{
	header('Location:A4.php');
}

else
{
	if((TrimData($_POST['quantity']) === "" || $_POST['quantity'] == 0) && (TrimData($_POST['quantity2']) === "" || $_POST['quantity2'] == 0))
	{
		$errors['quantity'] = "you need to select at least one product by specify the quantity more than 0.<br>" ;
	}

	
	if(TrimData($_POST['first_name']) === "" || strlen($_POST['first_name']) === 0)
	{
		$errors['firstName'] = "First name required.<br>";
	}


	if(TrimData($_POST['last_name']) === "" || strlen($_POST['last_name']) === 0)
	{
		$errors['last_name'] = "Last name required.<br>" ;
	}

	
	if(TrimData($_POST['city']) === "" || strlen($_POST['city']) === 0)
	{
		$errors['city'] = "city required.<br>" ;
	}

	
	if(TrimData($_POST['address']) === "" || strlen($_POST['address']) === 0)
	{
		$errors['address'] = "address required.<br>" ;
	}

	
	if(TrimData($_POST['province']) === "" || $_POST['province'] == "Please Select")
	{
		$errors['province'] = "province required.<br>" ;
	}

			
	if(TrimData($_POST['postal']) === "" || strlen($_POST['postal']) === 0)
	{
		$errors['postal'] = "postal code required.<br>" ;
	}
	else
	{
		if(!preg_match('/^[A-Za-z]{1}\d{1}[A-Za-z]{1} \d{1}[A-Za-z]{1}\d{1}$/' , $_POST['postal']))
		{
			$errors['postalFormat'] = "Format of postal code is not correct. It should be N0N 0N2.<br>" ;
		}
	}

	
	if(TrimData($_POST['phone']) === "" || strlen($_POST['phone'] === 0))
	{
		$errors['phone'] = "phone required.<br>" ;
	}
	else
	{
		if(!preg_match('/^\d{3}\-\d{3}\-\d{4}$/' , $_POST['phone']))
		{
			$errors['phoneFormat'] = "Format of phone number is not correct. It should be 999-999-9999<br>" ;
		}
	}

	
	if (count($errors) == 0)
	{
		echo "Your order has been processed. Please Verify the information";

		echo "<h3>Shipping to:</h3>";

		$firstName = $_POST['first_name'];
		$lastName = $_POST['last_name'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$province = $_POST['province'];
		$postal = $_POST['postal'];

		echo $firstName.' '.$lastName."<br>".$address."<br>".$city. ',' .$province."<br>".$postal."<br>";
		
		$product = array('Murach for HTML and CSS','Murach for c#');
		$count1 = $_POST['quantity'];
		$count2 = $_POST['quantity2'];
		$count = array($count1,$count2); 
		$price = array(25, 35);
		$subTotal1 = $count[0] * $price[0];
		$subTotal2 = $count[1] * $price[1];
		$subTotal = array($subTotal1 , $subTotal2);
		$total = $subTotal[0] + $subTotal[1] ;
		$tax = 0;
		$delivery =0;
		$grandTotal = 0;

		echo "<table>";

		echo "<thead><tr><th>Order Information</th><tr></thead>";

		echo "<tbody>";

		echo "<tr>";
		echo"<td>";
		echo DisplayProduct();
		echo "</td>";
		echo "<td>";
		echo DisplaySubtotal();
		echo "</td>";
		echo"</tr>";
			
		echo "<tr>";
		echo "<td>Tax</td>";
		echo "<td>";
		echo TaxCalculation();
		echo "</td>";		
		echo "</tr>";
			
		echo "<tr>";
		echo "<td>Delivery</td>";
		echo "<td>";
		echo DeliveryCharge();
		echo "</td>";
		echo "</tr>";

		echo "<tr>";
		echo "<td>Total</td>";
		echo "<td>";
		echo GrandTotal();
		echo "</td>";
		echo "</tr>";

		echo "</body>";

		echo "<tfoot>";

		echo "<tr>";
		echo "<td>Estimated Delivery Date:</td>";
		echo "<td>";
		echo DeliveryDateDisplay();
		echo "</td>";
		echo"</tr>";

		echo "</tfoot>";

		echo "</table>";				
		
	}
	
	else
	{
		foreach($errors as $error)
		{
			echo $error . "<br>";			
		}	
		echo "<a href= 'A4.php'>CLICK HERE</a> to go back to the order page";
	}
}


//function to display the products orderd by customer 
function DisplayProduct()
{
	global $count;
	global $product;
	global $price;
		
	if($count[0] != 0)
	{ 
		echo "$count[0] $product[0] at $$price[0] each<br>";				
	}
		
	if($count[1] != 0)
	{
		echo "$count[1] $product[1] at $$price[1] each";				
	}	
}

//function to display total charges of products ordered
function DisplaySubtotal()
{
	global $subTotal;
	global $count;
	
	if($count[0] != 0)
	{
		echo $subTotal[0]."<br>";				
	}
	
	if($count[1] != 0)
	{
		echo $subTotal[1];				
	}
		
}

//function to display tax
function TaxCalculation()
{
	global $province;
	global $total;
	global $tax;
		
	if( $province === "Alberta"|| $province === "Northwest Territories" || $province === "Nunavut" || $province === "Yukon")
	{
		$tax = $total * (5/100);
		echo "$$tax";
	}
	
	else if ( $province === "Saskatchewan")
	{
		$tax = $total  * 11/100;
		echo "$$tax";
	}
	
	else if ($province === "British Columbia")
	{
		$tax = $total  * 12/100;
		echo "$$tax";
	}
	
	else if ( $province === "Manitoba" || $province === "Ontario")
	{
		$tax = $total  * 13/100;
		echo "$$tax";
	}
	
	else if ( $province === "Quebec")
	{
		$tax = $total  * 14.975/100;
		echo "$$tax";
	}
	
	else 
	{
		$tax = $total  * 15/100;
		echo "$$tax";
	}		
}

//function to display delivery carges and estimated delivery time
function DeliveryCharge()
{
	global $total;
	global $delivery;
	
	if($total <= 25.00 && $total >= 0.01)
	{
		$delivery = 3;
		
		echo "$$delivery";	
		
	}
	
	else if($total <= 50.00 && $total >= 25.01)
	{
		$delivery = 4;
		
		echo "$$delivery";		
	}
	
	else if($total <= 75.00 && $total >= 50.01)
	{
		$delivery = 5;
		
		echo "$$delivery";
	}
	
	else
	{
		$delivery = 6 ;
		
		echo "$$delivery";
	}		
}

//function to display delivery date
function DeliveryDateDisplay()
{
	global $delivery;
	
	if($delivery === 3 || $delivery === 4 )
	{
		$d=strtotime("+1 day");
		echo date("d-m-y",$d);
	}
	
	
	else 
	{
		$d=strtotime("+3 day");
		echo date("d-m-y",$d);
		
	}			
}

function GrandTotal()
{
	global $grandTotal;
	global $tax;
	global $delivery;
	global $subTotal;
	
	$grandTotal = $subTotal[0] + $subTotal[1] + $tax + $delivery;
	
	echo "$$grandTotal";
			
}

?>
					
		</main>
		
	</body>
	
</html>