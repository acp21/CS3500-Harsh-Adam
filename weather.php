<!DOCTYPE html>
<html lang="en">

<!-- <?php

    // Call a cURL GET request on the passed url
    function callAPI($url){
        // Prepare cURL object
        $curl = curl_init();
        // Set options for cURL object
        // HTTP headers, cURL url
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
           'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // Get cURL result
        $result = curl_exec($curl);
        if(!$result){die("Connection Failure");}
        curl_close($curl);
        return $result;
    }

    $get_data = callAPI('http://api.openweathermap.org/data/2.5/forecast?id=524901&APPID=c3c492a15455fbdbf933ae22da3863f7');
    $response = json_decode($get_data, true);
    //  $errors = $response['response']['errors'];
    $data = $response["list"][0]["main"]["temp"];
    echo $data;
    // Javascript script opener and closer for echoing js in php
    define("JS_OPEN", '<script type="text/javascript>');
    define("JS_CLOSE", '</script>');
?> -->

<head>
    <meta charset="UTF-8">
    <title>Atlas Corporation</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/weather.css">

    <!-- Include jquery and weather.js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/weather.js"></script>


</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-sm  navbar-dark fixed-top" id="navigation">
            <!-- Brand/Logo -->
            <a class="navbar-brand" href="index.html">
                <img src="images/Company-Logo.png" alt="Atlas Corporation" title="Atlas Corporation">
            </a>
            <!-- Pages -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="about.html">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="catalog.html">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact_us.html">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="log_in.html">Log In</a>
                </li>
            </ul>
        </nav>
        <!-- End Navbar -->
        <!-- Top Page header -->
        <h2 class="jumbotron"><b>Atlas Corp API Integrations</b></h2>
        <div class="row">
            <div class="col-md-12">
                <p class="intro">Here at Atlas Corp, we work to provide the best service to our customers and employees.
                    We do this not only with products, but with live services. We are very proud to say we
                    have collaborated with OpenWeatherMap to bring this live weather service straight to you.
                    Simply input your city and click submit to get the current weather in that city. Well known cities will also
                    have their image displayed next to the forecast
                </p>
            </div>
        </div> <!-- End row -->
        <div class="input-wrapper">
            <h2 class="input">CITY NAME</h2>
            <input type="text" class="input form-control" id="data">
        </div>
        <div class="submit">
            <input type="submit">
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="forecast">
                    <div class="temp">
                        <h1>TEMPERATURE</h1>
                        <h2></h2>
                    </div>
                    <div class="weather">
                        <h1>WEATHER</h1>
                        <h2></h2>
                        <img src="" id="icon" alt="">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="search-image">
                    <img id="city" src="">
                </div>
            </div>
        </div>
    </div> <!-- End container -->
</body>