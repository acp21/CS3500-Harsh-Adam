//Wait for the page to finish loading
window.addEventListener('load', function(event)
{	
	//Add form validator for the purchase now form
	const MIN_STREET_ADDRESS_LENGTH = 8;
	const MIN_CITY_STATE_LENGTH = 5;

	var m_PurchaseButton = document.querySelectorAll("button.place_order_button")[0];
	var m_InputFields = document.querySelectorAll(".form-control");

	//event listener that will validate the input fields
	m_PurchaseButton.addEventListener("click", function(event)
	{
		var invalidInput = false;

		if(!checkNameValidation())
		{
			invalidInput = true;
		}

		if(!checkStreetAddressValidation())
		{
			invalidInput = true;
		}

		if(!checkCityStateValidation())
		{
			invalidInput = true;
		}

		if(!checkZipCodeValidation())
		{
			invalidInput = true;
		}

		if(!checkCardNumberValidation())
		{
			invalidInput = true;
		}

		if(!checkDateValidation())
		{
			invalidInput = true;
		}

		if(!checkCvvValidation())
		{
			invalidInput = true;
		}

		if(invalidInput)
		{
			event.preventDefault();
			m_PurchaseButton.setAttribute("data-dismiss", "");
		}
		else
		{
			m_PurchaseButton.setAttribute("data-dismiss", "modal");
			alert("Thank you for your purchasae!");
		}
	});

	//Fake call back from ajax function

	//Checks to see if the name field is a valid input
	function checkNameValidation()
	{
		var firstNameValid = true;
		var lastNameValid = true;

		var firstNameInput = m_InputFields[0];
		var lastNameInput = m_InputFields[1];

		if(firstNameInput.value.length == 0)
		{
			firstNameValid = false;
		}

		if(lastNameInput.value.length == 0)
		{
			lastNameValid = false;
		}

		firstNameInput.style.border = (firstNameValid) ? '0.15em solid grey' : '0.15em solid red';
		lastNameInput.style.border = (lastNameValid) ? '0.15em solid grey' : '0.15em solid red';

		return (firstNameValid && lastNameValid);
	}

	//Checks the validation of the street address input field
	function checkStreetAddressValidation()
	{
		var isValid = true;

		var streetAddressInput = m_InputFields[2];

		if(streetAddressInput.value.length < MIN_STREET_ADDRESS_LENGTH || !streetAddressInput.value.includes(" "))
		{
			isValid = false;
		}

		streetAddressInput.style.border = (isValid) ? '0.15em solid grey' : '0.15em solid red';

		return isValid;
	}

	//Checks the validation of the city and state input field
	function checkCityStateValidation()
	{
		var isValid = true;

		var cityStateInput = m_InputFields[4];

		if(cityStateInput.value.length < MIN_CITY_STATE_LENGTH || !cityStateInput.value.includes(","))
		{
			isValid = false;
		}

		cityStateInput.style.border = (isValid) ? '0.15em solid grey' : '0.15em solid red';

		return isValid;
	}

	//Checks the validation of the zip code
	function checkZipCodeValidation()
	{
		var isValid = true;

		var zipInput = m_InputFields[5];

		if(zipInput.value.length != 5 || !/^[0-9]*$/.test(zipInput.value))
		{
			isValid = false;
		}

		zipInput.style.border = (isValid) ? '0.15em solid grey' : '0.15em solid red';

		return isValid;
	}

	//Checks if the card given is a valid card number
	function checkCardNumberValidation()
	{
		var isValid = true;

		var cardInput = m_InputFields[6];

		if(cardInput.value.length != 16 || !/^[0-9]*$/.test(cardInput.value))
		{
			isValid = false;
		}

		cardInput.style.border = (isValid) ? '0.15em solid grey' : '0.15em solid red';

		return isValid;
	}

	//Checks to see if the expiration date is valid 
	function checkDateValidation()
	{
		var isValid = true;

		var dateInput = m_InputFields[7];

		var now = new Date();

		if(dateInput.value === "" || Date.parse(dateInput.value) < now)
		{
			isValid = false;
		}

		dateInput.style.border = (isValid) ? '0.15em solid grey' : '0.15em solid red';

		return isValid;
	}

	//Checks to see if cvv is a valid number
	function checkCvvValidation()
	{
		var isValid = true;

		var cvvInput = m_InputFields[8];

		if(cvvInput.value.length != 3 || !/^[0-9]*$/.test(cvvInput.value))
		{
			isValid = false;
		}

		cvvInput.style.border = (isValid) ? '0.15em solid grey' : '0.15em solid red';

		return isValid;
	}


});
