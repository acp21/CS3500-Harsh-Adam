//Wait for the page to finish loading
window.addEventListener('load', function(event)
{
	//Handle form validation for the contact us form
	const MUST_CONTAIN_SUBSTRINGS 	= ["@", ".com", ".edu"];
	const MINIMUM_EMAIL_LENGTH 		= MUST_CONTAIN_SUBSTRINGS[0].length + MUST_CONTAIN_SUBSTRINGS[1].length + 2;

	var m_NameInput		= document.querySelectorAll(".form-control")[0];
	var m_EmailInput 	= document.querySelectorAll(".form-control")[1];
	var m_SubjectInput 	= document.querySelectorAll(".form-control")[2];
	var m_MessageInput 	= document.querySelectorAll(".form-control")[3];
	var m_SubmitButton 	= document.querySelectorAll("button")[0];

	//Event listener to handle the validation
	m_SubmitButton.addEventListener("click", function(event)
	{
		var invalidInput = false;

		if (!checkNameValidation())
		{
			invalidInput = true;
		}

		if (!checkEmailValidation())
		{
			invalidInput = true;
		}

		if (!checkSubjectValidation())
		{
			invalidInput = true;
		}

		if (!checkMessageValidation())
		{
			invalidInput = true;
		}

		if(!invalidInput)
		{
			animateResponseToFormSubmission();
		}
	});

	//Check if entered name is valid
	function checkNameValidation()
	{
		var isValid = true;

		if(m_NameInput.value.length < 1)
		{
			isValid = false;
		}
		else if (!m_NameInput.value.includes(" "))
		{
			isValid = false;
		}
		else
		{
			//Input field is valid
		}

		m_NameInput.style.color = (isValid) ? 'black' : 'red';
		m_NameInput.style.border = (isValid) ? '0.05em solid grey' : '0.15em solid red';

		return isValid;
	}

	//Check if entered email is valid
	function checkEmailValidation()
	{
		var isValid = true;

		if(!m_EmailInput.value.includes(MUST_CONTAIN_SUBSTRINGS[0]))
		{
			isValid = false;
		} 
		
		if(!m_EmailInput.value.includes(MUST_CONTAIN_SUBSTRINGS[1]))
		{
			if(!m_EmailInput.value.includes(MUST_CONTAIN_SUBSTRINGS[2]))
			{
				isValid = false;
			}
		}
		
		if(m_EmailInput.value.length < MINIMUM_EMAIL_LENGTH)
		{
			isValid = false;
		}
		
		m_EmailInput.style.color = (isValid) ? 'black' : 'red';
		m_EmailInput.style.border = (isValid) ? '0.05em solid grey' : '0.15em solid red';

		return isValid;
	}

	//Check if the subject line isn't blank
	function checkSubjectValidation()
	{
		var isValid = true;

		if(m_SubjectInput.value.length == 0)
		{
			isValid = false;
		}

		m_SubjectInput.style.border = (isValid) ? '0.05em solid grey' : '0.15em solid red';

		return isValid;
	}

	//Check if the message isn't blank
	function checkMessageValidation()
	{
		var isValid = true;

		if(m_MessageInput.value.length == 0)
		{
			isValid = false;
		}

		m_MessageInput.style.border = (isValid) ? '0.05em solid grey' : '0.15em solid red';

		return isValid;		
	}

	//Fade in the affirmation that the contact form has been submitted
	function animateResponseToFormSubmission()
	{
		var affirmation = document.querySelectorAll("div.jumbotron")[0];

		affirmation.style.transition = 'opacity 2s ease-in 0s';
		affirmation.style.opacity = '100%';
	}
});