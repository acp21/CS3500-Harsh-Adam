//Wait for the page to finish loading
window.addEventListener('load', function(event)
{	
	//Handle Flying in the vertical navigation
	document.querySelectorAll("ul.main_page_vertical_nav")[0].style.transform = 'translateX(22em)';
	document.querySelectorAll("ul.main_page_vertical_nav")[0].style.transition = 'transform 0.6s linear 0s';

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
		m_Products[elemntId].style.transition = '4.5s opacity';
	}

	function unanimateProductFromScreen_Callback(elemntId)
	{
		m_Products[elemntId].style.opacity = "0%";
		m_Products[elemntId].style.transition = '4s opacity';
	}

	//Handle Bolding what product we are on in the vertical nav bar
	var m_VerticalNavEntries = document.querySelectorAll("ul.main_page_vertical_nav li a");
	var m_Products = document.querySelectorAll("section");

	m_Products.forEach(function(product)
	{
		product.addEventListener("mouseover", function()
		{
			getNavLinkFromProduct(product).style.backgroundColor = 'lightblue'; 

		});
		product.addEventListener("mouseout", function()
		{
			getNavLinkFromProduct(product).style.backgroundColor = 'transparent'; 
		});
	});

	//Create a psuedo map object to map product div objects to vertical nav bar objects
	function getNavLinkFromProduct(product)
	{
		if(product == m_Products[0]) return m_VerticalNavEntries[0];
		if(product == m_Products[1]) return m_VerticalNavEntries[1];
		if(product == m_Products[2]) return m_VerticalNavEntries[2];
		if(product == m_Products[3]) return m_VerticalNavEntries[3];

		return null;
	}

});
