const FIRSTNAME_REQUIRED_ERROR = "First name required";
const LASTNAME_REQUIRED_ERROR = "Last name required";
const ADDRESS_REQUIRED_ERROR 	= "address required";
const CITY_REQUIRED_ERROR = "city required";
const PROVINCE_REQUIRED_ERROR = "province required";
const POSTAL_REQUIRED_ERROR = "postal code required";
const POSTAL_FORMAT_ERROR = "postal code format is not correct. Eg of correct format N2E 4G5";
const PHONE_REQUIRED_ERROR = "phone required";
const PHONE_FORMAT_ERROR = "enter the phone is the format mentioned eg; 999-9999-9999";
const QUANTITY_ZERO = "Quantity of at least one product should be more than zero";


//remove whitespace
function RemoveWhiteSpace(tempInputString)
{
	return tempInputString.trim();
}

//function to remove whitespace from user input and then return the value
function TrimInputString(id)
{
	var inputString = document.getElementById(id).value;

	return document.getElementById(id).value = RemoveWhiteSpace(inputString);

}
//function for case conversion
function UpperCase(tempInputString)
{
	return tempInputString.toUpperCase();
}

// function to convert the  user input to upper case and then return the value
function ChangeToUpperCase(id)
{
	var inputString = document.getElementById(id).value;

	return document.getElementById(id).value = UpperCase(inputString);
}

function ErrorFocus(id)
{
	return document.getElementById(id).focus();
}

function FormValidation()
{
	var firstName = document.getElementById("first_name").value;
	var lastName = document.getElementById("last_name").value;
	var address = document.getElementById("address").value;
	var count1 = document.getElementById("quantity1").value;
	var count2 = document.getElementById("quantity2").value;
	var city = document.getElementById("city").value;
	var province = document.getElementById("province").value;
	var postalCode = document.getElementById("postal").value;
	var phoneNumber = document.getElementById("phone").value;
	var errorMessage = 0;
	
	document.getElementById("outputError").innerHTML="";
				
	TrimInputString("first_name");
	TrimInputString("last_name");
	TrimInputString("address");
	TrimInputString("city");
	TrimInputString("postal");
	TrimInputString("phone");
	
	ChangeToUpperCase("postal")
	
	
	if (count1 == 0 && count2 == 0)
	{
		document.getElementById("outputError").innerHTML += QUANTITY_ZERO + "<br>";
		ErrorFocus('quantity1');
		errorMessage++;
	}
	
	
	if (firstName == " " || firstName.length==0)
	{
		document.getElementById("outputError").innerHTML += FIRSTNAME_REQUIRED_ERROR + "<br>";
		ErrorFocus("first_name");
		errorMessage++;
	}
	
	
	if (lastName == " " || lastName.length==0)
	{
		document.getElementById("outputError").innerHTML += LASTNAME_REQUIRED_ERROR + "<br>";
		ErrorFocus("last_name");
		errorMessage++;
	}
	
	
	if (address == " " || address.length==0)
	{
		document.getElementById("outputError").innerHTML += ADDRESS_REQUIRED_ERROR + "<br>";
		ErrorFocus("address");
		errorMessage++;
	}
	
	
	if (city == " " || city.length==0)
	{
		document.getElementById("outputError").innerHTML += CITY_REQUIRED_ERROR + "<br>";
		ErrorFocus("city");
		errorMessage++;
	}
		
		
	if (province == "Please Select" || province.length==0)
	{
		document.getElementById("outputError").innerHTML += PROVINCE_REQUIRED_ERROR + "<br>";
		ErrorFocus("province");
		errorMessage++;
	}
	
	
	if (postalCode == " " || postalCode.length==0)
	{
		document.getElementById("outputError").innerHTML += POSTAL_REQUIRED_ERROR + "<br>";
		ErrorFocus("postal");
		errorMessage++;
	}
	else
	{
		var regx =/^[A-Z]\d[A-Z]\s\d[A-Z]\d$/;
		var code= document.getElementById("postal").value;

		if(code.match(regx))
		{
			document.getElementById("postalError").innerHTML= " ";
		}
		else
		{
			document.getElementById("outputError").innerHTML += POSTAL_FORMAT_ERROR +"<br>";
			ErrorFocus("postal");
			errorMessage++;
		}					
	}
	
	
	if ( phoneNumber == " " ||  phoneNumber.length==0)
	{
		document.getElementById("outputError").innerHTML += PHONE_REQUIRED_ERROR + "<br>";
		ErrorFocus("phone");
		errorMessage++;
	}
	else
	{
		var regx =/^\d{3}\-\d{3}\-\d{4}$/;
		var phoneNumber = document.getElementById("phone").value;

		if(phoneNumber.match(regx))
		{
			document.getElementById("phoneError").innerHTML = "";
		}

		else
		{
			document.getElementById("outputError").innerHTML += PHONE_FORMAT_ERROR;
			ErrorFocus("phone");
			errorMessage++;
		}
	}	
	
	
	if(errorMessage == 0)
	{
		return true;
	}
	else
	{
		return false;
	}
	
}
