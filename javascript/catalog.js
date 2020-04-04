//Wait for the page to finish loading
window.addEventListener('load', function(event)
{	
	//Handle Flying in the vertical navigation bar from the right
	document.querySelectorAll("ul.main_page_vertical_nav")[0].style.transform = 'translateX(22em)';
	document.querySelectorAll("ul.main_page_vertical_nav")[0].style.transition = 'transform 0.6s linear 0s';

	//Hamdle fading products in and out of the view port
	var m_Products = document.querySelectorAll("div.product");

	window.addEventListener("scroll", function()
	{
		for(var i = 0; i < m_Products.length; i++)
		{
			if(checkIfProductShouldBeSeen(m_Products[i]))
			{
				animateProductOnScreen_Callback(i);
			}
			else
			{
				unanimateProductFromScreen_Callback(i);
			}
		}
	});

	//Checks if the product should be seen based on the location of it on the screen
	function checkIfProductShouldBeSeen(product)
	{
		var shouldBeInView = false;

		var productPosition = product.getBoundingClientRect();

		if(productPosition.top < window.innerHeight && productPosition.bottom >= 0)
		{
			shouldBeInView = true;
		}

		return shouldBeInView;
	}

	//Animates a product onto the screen
	function animateProductOnScreen_Callback(elemntId)
	{
		m_Products[elemntId].style.opacity = "100%";
		m_Products[elemntId].style.transition = '2.5s opacity';
	}

	//Fades a product off of the screen
	function unanimateProductFromScreen_Callback(elemntId)
	{
		m_Products[elemntId].style.opacity = "0%";
		m_Products[elemntId].style.transition = '2.5s opacity';
	}

	//Handle highlighting what product we are on in the vertical nav bar
	var m_VerticalNavEntries = document.querySelectorAll("ul.main_page_vertical_nav li a");
	var m_Products = document.querySelectorAll("section");

	m_Products.forEach(function(product)
	{
		product.addEventListener("mouseover", function()
		{
			if(getNavLinkFromProduct(product) != null)
			{
				getNavLinkFromProduct(product).style.backgroundColor = 'lightblue'; 
			}
		});
		product.addEventListener("mouseout", function()
		{
			if(getNavLinkFromProduct(product) != null)
			{
				getNavLinkFromProduct(product).style.backgroundColor = 'transparent'; 
			}
		});
	});

	//Create a psuedo map object to map product div objects to vertical nav bar objects
	function getNavLinkFromProduct(product)
	{
		if(product == m_Products[0]) return m_VerticalNavEntries[0];
		if(product == m_Products[1]) return m_VerticalNavEntries[1];
		if(product == m_Products[2]) return m_VerticalNavEntries[2];
		if(product == m_Products[3]) return m_VerticalNavEntries[3];

		return null;
	}

	//Add form validator for the buy now form
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
			m_PurchaseButton.setAttribute("data-dismiss", "");
		}
		else
		{
			m_PurchaseButton.setAttribute("data-dismiss", "modal");
			alert("Thank you for your purchasae!");
		}
	});

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
