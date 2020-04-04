//Wait for the page to finish loading
window.addEventListener('load', function(event)
{
	//Animate the sections to coming in as chunks in the about us page
	const SECTION_ANIMATION_PERIOD_S = 1.25;

	//Grab all the sections on the page
	var m_Sections = document.querySelectorAll("div.section");

	//Setup strings to set css properties to
	var m_TransitionCommandBase = "opacity ".concat(SECTION_ANIMATION_PERIOD_S.toString(), "s ease-in ");
	var m_TransitionWaitPeriod = 0;

	//Animate Sections
	m_Sections.forEach(function(section)
	{
		section.style.transition = m_TransitionCommandBase.concat(m_TransitionWaitPeriod.toString(), "s");
		section.style.opacity = '100%';
		m_TransitionWaitPeriod += SECTION_ANIMATION_PERIOD_S;
	});
});