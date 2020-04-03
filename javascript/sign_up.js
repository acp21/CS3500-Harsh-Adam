//Wait for the page to finish loading
window.addEventListener('load', function(event)
{
	const MINIMUM_USERNAME_LENGTH 	= 5;
	const MINIMUM_PASSWORD_LENGTH 	= 7;

	const MUST_CONTAIN_SUBSTRINGS 	= ["@", ".com"];
	const MINIMUM_EMAIL_LENGTH 		= MUST_CONTAIN_SUBSTRINGS[0].length + MUST_CONTAIN_SUBSTRINGS[1].length + 2;

	var m_Form 						= document.querySelectorAll("form")[0];
	var m_NameInput 				= document.querySelectorAll("input.full_name")[0];
	var m_UsernameInput 			= document.querySelectorAll("input.user_name")[0];
	var m_EmailInput 				= document.querySelectorAll("input.user_email")[0];
	var m_PasswordInput 			= document.querySelectorAll("input.user_password")[0];
	var m_PasswordReentryIntput 	= document.querySelectorAll("input.user_password_reentry")[0];

	m_Form.addEventListener("submit", function(event)
	{
		var invalidInput = false;

		if (!checkNameValidation())
		{
			invalidInput = true;
		}
		
		if (!checkUserNameValidation())
		{
			invalidInput = true;
		}
		
		if (!checkEmailValidation())
		{
			invalidInput = true;
		}
		
		if (!checkPasswordValidation())
		{
			invalidInput = true;
		}
		
		if (!checkPasswordReentryValidation())
		{
			invalidInput = true;
		}

		if(invalidInput)
		{
			event.preventDefault();
		}
		else
		{
			alert("Thank You For Signing Up!");
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

		return isValid;
	}

	function checkUserNameValidation()
	{
		var isValid = true;

		if(m_UsernameInput.value.length < MINIMUM_USERNAME_LENGTH)
		{
			isValid = false;
		}

		m_UsernameInput.style.color = (isValid) ? 'black' : 'red';

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

		return isValid;
	}

	function checkPasswordValidation()
	{
		var isValid = true;

		if(m_PasswordInput.value.length < MINIMUM_PASSWORD_LENGTH)
		{
			isValid = false;
		}

		m_PasswordInput.style.color = (isValid) ? 'black' : 'red';

		return isValid;
	}

	function checkPasswordReentryValidation()
	{
		var isValid = true;

		if(m_PasswordInput.value.localeCompare(m_PasswordReentryIntput.value) != 0)

		{
			isValid = false;
		}

		m_PasswordReentryIntput.style.color = (isValid) ? 'black' : 'red';

		return isValid;
	}
});