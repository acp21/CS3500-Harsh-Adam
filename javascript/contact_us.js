//Wait for the page to finish loading
window.addEventListener('load', function(event)
{
	const MUST_CONTAIN_SUBSTRINGS 	= ["@", ".com"];
	const MINIMUM_EMAIL_LENGTH 		= MUST_CONTAIN_SUBSTRINGS[0].length + MUST_CONTAIN_SUBSTRINGS[1].length + 2;

	var m_NameInput		= document.querySelectorAll(".form-control")[0];
	var m_EmailInput 	= document.querySelectorAll(".form-control")[1];
	var m_SubjectInput 	= document.querySelectorAll(".form-control")[2];
	var m_MessageInput 	= document.querySelectorAll(".form-control")[3];
	var m_SubmitButton 	= document.querySelectorAll("button")[0];

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

	function checkEmailValidation()
	{
		var isValid = true;

		if(!m_EmailInput.value.includes(MUST_CONTAIN_SUBSTRINGS[0]))
		{
			isValid = false;
		} 
		else if(!m_EmailInput.value.includes(MUST_CONTAIN_SUBSTRINGS[1]))
		{
			isValid = false;
		}
		else if(m_EmailInput.value.length < MINIMUM_EMAIL_LENGTH)
		{
			isValid = false;
		}
		else
		{
			//Form input is valid
		}

		m_EmailInput.style.color = (isValid) ? 'black' : 'red';
		m_EmailInput.style.border = (isValid) ? '0.05em solid grey' : '0.15em solid red';

		return isValid;
	}

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