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
		//Figure out what product we have to display info for
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
});