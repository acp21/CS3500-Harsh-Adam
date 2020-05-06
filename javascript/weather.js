// CS3500 FINAL PROJECT
// Javascript page to operate weather.php
// Written by Adam Pohl

$(document).ready(function(){

    var api = "http://api.openweathermap.org/data/2.5/forecast?q=";
    // HAVING AN API KEY IN OPEN SOURCE CODE IS GENERALLLY A VERY BAD IDEA
    // IN A REAL PROJECT THIS SHOULD BE HIDDEN IN SOME WAY
    var apiID = "d2939654a3352a9dc8b97495cdb98211";

    function getCityImage(city){
        var apiCall = "https://en.wikipedia.org/w/api.php?action=query&titles=" +  city + "&prop=pageimages&pithumbsize=700&format=json";

        console.log(apiCall);
        // Make call to wikipedias api to get image url
        $.ajax({
            url: apiCall,
            contentType: "application/json",
            dataType: "jsonp",
            success: function(result){
                console.log("Got images");
                console.log(result);
                var pages = result["query"]["pages"];
                // For loop gets first page without needing to know page id
                for(var key in pages){
                    var imgSrc = (pages[key]["thumbnail"]["source"]);
                    console.log("SRC");
                    console.log(imgSrc);
                    $(".search-image").find("img").attr("src", imgSrc);
                }
            }

        })

    }
    
    // Wait for click on submit button
    $(".submit").on("click", function(event){
        target = event.target;
        // Prepare api call strin
        var city = $("#data").val();
        api = api + city;
        api = api + "&APPID=";
        api = api + apiID;
        // Make call to OpenWeatherMaps
        $.ajax({
            url: api,
            contentType: "application/json",
            dataType: 'jsonp',
            success: function(result){
                console.log(result);
                // Change value to farenheit and display temp and weather
                var temp = result["list"][0]["main"]["temp"];
                var weather = result["list"][0]["weather"][0]["main"];
                $(".temp").find("h2").html(Math.round(temp * 9/5 -459.67));
                $(".weather").find("h2").html("It is currently " + weather);
            }
        })
        console.log("Getting images");
        getCityImage(city);
    });
});