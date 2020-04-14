$(document).ready(function(){

    var api = "http://api.openweathermap.org/data/2.5/forecast?q=";
    var apiID = "d2939654a3352a9dc8b97495cdb98211";

    function getCityImage(city){
        var apiCall = "https://en.wikipedia.org/w/api.php?action=query&titles=" +  city + "&prop=pageimages&pithumbsize=300&format=json";
        console.log(apiCall);
        $.ajax({
            url: apiCall,
            contentType: "application/json",
            dataType: "jsonp",
            success: function(result){
                console.log("Got images");
                console.log(result);
                var pages = result["query"]["pages"]; //[0]["thumbnail"]["source"];
                for(var key in pages){
                    console.log(pages[key]["thumbnail"]["source"]);
                }

                // console.log(imgSrc)
                // query.pages[17867].thumbnail
            }

        })

    }
    

    $(".submit").on("click", function(event){
        target = event.target;
        var city = $("#data").val();
        api = api + city;
        api = api + "&APPID=";
        api = api + apiID;
        $.ajax({
            url: api,
            contentType: "application/json",
            dataType: 'jsonp',
            success: function(result){
                console.log(result);
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