//Wait for the page to finish loading
window.addEventListener('load', function(event)
{
	//Hamdle fading products in and out of the view port
	var m_Products = document.querySelectorAll("div.product");

	window.addEventListener("scroll", function()
	{
		for(var i = 0; i < m_Products.length; i++)
		{
			if(checkIfProductShouldBeSeen(m_Products[i]))
			{
				animateProductOnScreen_Callback(i);
			}
			else
			{
				unanimateProductFromScreen_Callback(i);
			}
		}
	});

	function checkIfProductShouldBeSeen(product)
	{
		var shouldBeInView = false;

		var productPosition = product.getBoundingClientRect();

		if(productPosition.top < window.innerHeight && productPosition.bottom >= 0)
		{
			shouldBeInView = true;
		}

		return shouldBeInView;
	}

	function animateProductOnScreen_Callback(elemntId)
	{
		m_Products[elemntId].style.opacity = "100%";
		m_Products[elemntId].style.transition = '4s opacity';
	}

	function unanimateProductFromScreen_Callback(elemntId)
	{
		m_Products[elemntId].style.opacity = "0%";
		m_Products[elemntId].style.transition = '4s opacity';
	}


});
