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

	//Handle highlighting what section we are on in the vertical nav bar
	var m_PageSections = document.querySelectorAll("div.row");
	var m_VerticalNavEntries = document.querySelectorAll("ul.main_page_vertical_nav li a");

	console.log(m_VerticalNavEntries);

	m_PageSections.forEach(function(section)
	{
		section.addEventListener("mouseover", function()
		{
			if(getNavLinkFromSection(section) != null)
			{
				getNavLinkFromSection(section).style.backgroundColor = 'lightblue'; 
			}
		});
		section.addEventListener("mouseout", function()
		{
			if(getNavLinkFromSection(section) != null)
			{
				getNavLinkFromSection(section).style.backgroundColor = 'transparent'; 
			} 
		});
	});

	//Create a psuedo map object to map div objects to vertical nav bar objects
	function getNavLinkFromSection(section)
	{
		if(section == m_PageSections[0] || section == m_PageSections[1] || section == m_PageSections[0])
		{
			return m_VerticalNavEntries[0];
		}

		if(section == m_PageSections[3]) return m_VerticalNavEntries[1];
		if(section == m_PageSections[4]) return m_VerticalNavEntries[2];

		if(section == m_PageSections[5] || section == m_PageSections[6] || section == m_PageSections[7])
		{
			return m_VerticalNavEntries[3];
		}

		return null;
	}

});