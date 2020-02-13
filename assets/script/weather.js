function getUserLocation() {
    return new Promise((res, rej) => {
        navigator.geolocation.getCurrentPosition((pos) => res(pos), (err) => rej(err))
    })
}

function updateDom(data) {
    document.getElementById("city_name").innerHTML = data.name || "Paris";
    document.getElementById("wind-speed").innerHTML = data.wind.speed + " m/s" || "1m/s";
    document.getElementById("weather-condition").innerHTML = data.weather[0].main || "Fog";
    document.getElementById("temperature").innerHTML = data.main.temp.toFixed(1) + "°C"|| "10°C";
    console.log("DOM update");
}

async function getCurrentWeather(coord) {
    

    try {
        const data = new FormData();
        data.append("lat", coord.lat);
        data.append("lon", coord.lon);
        const response  = await fetch("/weather", {
            method : 'POST',           
            body : data
        });
        if (response.status === 200) 
            return response
            .json()
            .then(data =>  (data))
            .catch(err => {throw ("Can't handle JSON" + err)});
        else throw new Error("Can't get weather data");  
    } catch (err) {
        throw(err + "Problem when fetch");
    }
}

async function main()  {
    

    let weather = "";
    try {
        const pos = await getUserLocation();
        const location = {lat:pos.coords.latitude, lon:pos.coords.longitude};
        weather = await getCurrentWeather(location);
        console.log(weather);

    } catch(err) {
        console.log(err);
        const weather = "";
    }
    updateDom(weather);
}
