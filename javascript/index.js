//Wait for the page to finish loading
window.addEventListener('load', function(event)
{
	const MISSION_STATEMENT = "We are driven to keep the spark that innovates alive to fuel the minds of the future.";

	//Fly in the vertical nav bar from the left
	document.querySelectorAll("ul.main_page_vertical_nav")[0].style.transform = 'translateX(22em)';
	document.querySelectorAll("ul.main_page_vertical_nav")[0].style.transition = 'transform 0.6s linear 0ms';

	//Animate writing the mission statement
	var loopCtr = 0;
	

	function missionStatementWriterHandler()
	{
		if(loopCtr < MISSION_STATEMENT.length)
		{
			//Append a character to the mission statement
			document.querySelectorAll("p.mission_statement")[0].innerHTML += MISSION_STATEMENT.charAt(loopCtr);
			//Preincrement for effeciency
			++loopCtr;
			//Randomize the timeout to give more of a typing feeling
			setTimeout(missionStatementWriterHandler, (Math.random() * 20 + 35));
		}
	}

	//Call the function to start the "typing"
	missionStatementWriterHandler();	
});