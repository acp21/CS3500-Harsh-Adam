//Wait for the page to finish loading
window.addEventListener('load', function(event)
{
	//Animate the pictures coming into view
	const PIC_ANIMATION_PERIOD_S = 0.6;

	var m_Images = document.querySelectorAll("img.pic");

	var m_InfoSection = document.querySelectorAll("div.info_section")[0];

	//Event listener to initiate animation of the pictures
	window.addEventListener("scroll", function(event)
	{
		//Pictures will come in one by one
		if(sectionShouldBeSeen(m_InfoSection))
		{
			var transitionCommandBase = "opacity ".concat(PIC_ANIMATION_PERIOD_S.toString(), "s ease-in ");
			var transitionWaitPeriod = 0;

			m_Images.forEach(function(pic)
			{
				pic.style.transition = transitionCommandBase.concat(transitionWaitPeriod.toString(), "s");
				pic.style.opacity = '100%';
				transitionWaitPeriod += PIC_ANIMATION_PERIOD_S;
			});
		}
	});

	//Checks if the pictures should be seen in the viewport
	function sectionShouldBeSeen(section)
	{
		var shouldBeInView = false;

		var sectionPosition = section.getBoundingClientRect();

		if(sectionPosition.top < window.innerHeight && sectionPosition.bottom >= 0)
		{
			shouldBeInView = true;
		}

		return shouldBeInView;
	}

	//Animate the Product Catch Phrase by typing it out
	const CATCH_PHRASES = ["","Years ahead of the competetion", "A modern tool for the modern consumer"];

	var loopCtr = 0;

	//Function that handles writing on the screen
	function catchPhraseWriter()
	{
		//Figure out what html page invoked our js function and select the 
		//appropriate catch phrase for that page

		// CODE NO LONGER NEEDED
		// var htmlPage = location.pathname.split('/').pop();

		// var indexOfCatchPhrase = 0;

		// if(htmlPage === "product.html") 
		// {
		// 	indexOfCatchPhrase = 0;
		// } 
		// else if(htmlPage === "watch.html")
		// {
		// 	indexOfCatchPhrase = 1;
		// }
		// else
		// {
		// 	// the invoker is neither of the pages
		// }

		// Getting passed string for catch phrase writer
		console.log("This ran")
		var urlParams = new URLSearchParams(window.location.search);
		var productID = urlParams.get('productID');

		// Get product id from passed query string, use that as index for CATCH_PHRASES
		if(loopCtr < CATCH_PHRASES[productID].length)
		{
			//Append a character to the mission statement
			document.querySelectorAll("div.catch_phrase")[0].innerHTML += CATCH_PHRASES[productID].charAt(loopCtr);
			//Preincrement for effeciency
			++loopCtr;
			//Randomize the timeout to give more of a typing feeling
			setTimeout(catchPhraseWriter, (Math.random() * 20 + 35));
		}
	}

	//Call the function to start the "typing"
	catchPhraseWriter();	

	//Handle form validation for the buy now form
	const MIN_STREET_ADDRESS_LENGTH = 8;
	const MIN_CITY_LENGTH = 3;

	var m_PurchaseButton = document.querySelectorAll("div.modal-footer button")[0];
	var m_InputFields = document.querySelectorAll(".form-control");

	//Event listener that invokes the validations
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

		if(!checkCityValidation())
		{
			invalidInput = true;
		}

		if(!checkZipCodeValidation())
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

	//Checks to see if the name is valid
	function checkNameValidation()
	{
		var isValid = true;

		var nameInput = m_InputFields[0];

		if(nameInput.value.length == 0 || !nameInput.value.includes(" "))
		{
			isValid = false;
		}

		nameInput.style.border = (isValid) ? '0.15em solid grey' : '0.15em solid red';

		return isValid;
	}

	//Checks to see if the street adress is long enough
	function checkStreetAddressValidation()
	{
		var isValid = true;

		var streetAddressInput = m_InputFields[1];

		if(streetAddressInput.value.length < MIN_STREET_ADDRESS_LENGTH || !streetAddressInput.value.includes(" "))
		{
			isValid = false;
		}

		streetAddressInput.style.border = (isValid) ? '0.15em solid grey' : '0.15em solid red';

		return isValid;
	}

	//Checks to see if the city is of minimum length
	function checkCityValidation()
	{
		var isValid = true;

		var cityInput = m_InputFields[2];

		if(cityInput.value.length < MIN_CITY_LENGTH)
		{
			isValid = false;
		}

		cityInput.style.border = (isValid) ? '0.15em solid grey' : '0.15em solid red';

		return isValid;
	}	

	//Checks to see zip code is valid
	function checkZipCodeValidation()
	{
		var isValid = true;

		var zipInput = m_InputFields[3];

		if(zipInput.value.length != 5 ||  !/^[0-9]*$/.test(zipInput.value))
		{
			isValid = false;
		}

		zipInput.style.border = (isValid) ? '0.15em solid grey' : '0.15em solid red';

		return isValid;
	}
});