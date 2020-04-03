//Wait for the page to finish loading
window.addEventListener('load', function(event)
{
	//Validate Form Input
	const MINIMUM_USERNAME_LENGTH = 5;
	const MINIMUM_PASSWORD_LENGTH = 7;

	var m_Form = document.querySelectorAll("form.login_form")[0];

	var m_UsernameInput = document.querySelectorAll("form.login_form div input")[0];
	var m_PasswordInput = document.querySelectorAll("form.login_form div input")[1];

	//Create an error message box
	var m_ErrorMessageBox = document.createElement("p");
	m_ErrorMessageBox.innerHTML = "Please Enter Valid Username and/or Password";
	m_ErrorMessageBox.style.color = 'red';
	m_ErrorMessageBox.style.fontWeight = 'bold';

	m_Form.addEventListener("submit", function(event)
	{
		//Validate Parameters
		var invalidInput = false;

		if(m_UsernameInput.value.length < MINIMUM_USERNAME_LENGTH)
		{
			m_UsernameInput.style.color = 'red';
			m_UsernameInput.parentElement.style.border = '0.15em solid red';
			invalidInput = true;	
		}
		else
		{
			m_UsernameInput.style.color = 'black';
			m_UsernameInput.parentElement.style.border = 'none';
		}

		if(m_PasswordInput.value.length < MINIMUM_PASSWORD_LENGTH)
		{
			m_PasswordInput.style.color = 'red';
			m_PasswordInput.parentElement.style.border = '0.15em solid red';
			invalidInput = true;
		}
		else
		{
			m_PasswordInput.style.color = 'black';
			m_PasswordInput.parentElement.style.border = 'none';
		}

		//Check if any input is invalid
		if(invalidInput)
		{
			event.preventDefault();
			m_Form.append(m_ErrorMessageBox);
		}
	});
});