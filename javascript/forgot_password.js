//Wait for the page to finish loading
window.addEventListener('load', function(event)
{
	//Validate Form Input
	const MUST_CONTAIN_SUBSTRINGS = ["@", ".com"];
	const MINIMUM_EMAIL_LENGTH = MUST_CONTAIN_SUBSTRINGS[0].length + MUST_CONTAIN_SUBSTRINGS[1].length + 2;

	var m_Form = document.querySelectorAll("form")[0];
	console.log(m_Form);

	var m_EmailInput = document.querySelectorAll("form div input")[0];

	//Create an error message box
	var m_ErrorMessageBox = document.createElement("p");
	m_ErrorMessageBox.innerHTML = "Please Enter Valid Email Id";
	m_ErrorMessageBox.style.color = 'red';
	m_ErrorMessageBox.style.fontWeight = 'bold';

	m_Form.addEventListener("submit", function(event)
	{
		//Validate Parameters
		var invalidInput = false;

		if(!m_EmailInput.value.includes(MUST_CONTAIN_SUBSTRINGS[0]))
		{
			invalidInput = true;
		} 
		else if(!m_EmailInput.value.includes(MUST_CONTAIN_SUBSTRINGS[1]))
		{
			invalidInput = true;
		}
		else if(m_EmailInput.value.length < MINIMUM_EMAIL_LENGTH)
		{
			invalidInput = true;
		}
		else
		{
			//Form input is valid
		}

		//Check if any input is invalid
		if(invalidInput)
		{
			m_EmailInput.style.color = 'red';
			event.preventDefault();
			m_Form.append(m_ErrorMessageBox);
		}
		else
		{
			alert("An email will be sent with password reset instructions!")
		}
	});
});