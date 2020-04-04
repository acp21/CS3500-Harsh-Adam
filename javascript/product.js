//Wait for the page to finish loading
window.addEventListener('load', function(event)
{
	//Animate the pictures coming into view
	const PIC_ANIMATION_PERIOD_S = 0.6;

	var m_Images = document.querySelectorAll("img.pic");

	var m_InfoSection = document.querySelectorAll("div.info_section")[0];

	window.addEventListener("scroll", function(event)
	{
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
	const CATCH_PHRASES = ["Years ahead of the competetion", "A modern tool for the modern consumer"];

	var loopCtr = 0;

	function catchPhraseWriter()
	{
		var htmlPage = location.pathname.split('/').pop();

		var indexOfCatchPhrase = 0;

		if(htmlPage === "product.html") 
		{
			indexOfCatchPhrase = 0;
		} 
		else if(htmlPage === "watch.html")
		{
			indexOfCatchPhrase = 1;
		}
		else
		{
			// the invoker is neither of the pages
		}

		if(loopCtr < CATCH_PHRASES[indexOfCatchPhrase].length)
		{
			//Append a character to the mission statement
			document.querySelectorAll("div.catch_phrase")[0].innerHTML += CATCH_PHRASES[indexOfCatchPhrase].charAt(loopCtr);
			//Preincrement for effeciency
			++loopCtr;
			//Randomize the timeout to give more of a typing feeling
			setTimeout(catchPhraseWriter, (Math.random() * 20 + 35));
		}
	}

	//Call the function to start the "typing"
	catchPhraseWriter();	
});