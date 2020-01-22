function getUserLocation() {
    return new Promise((res, rej) => {
        navigator.geolocation.getCurrentPosition((pos) => res(pos), (err) => rej(err))
    })
}

function updateDom(data) {
    document.getElementById("city_name").innerHTML = data.name;
    document.getElementById("wind-speed").innerHTML = data.wind.speed + " m/s";
    document.getElementById("weather-condition").innerHTML = data.weather[0].main;
    document.getElementById("temperature").innerHTML = data.main.temp.toFixed(1) + "°C";
    console.log("DOM update");
}

async function getCurrentWeather(coord) {
    //Move api to backend to avoid leaking api key

    try {
        const response  = await fetch("/weather/", {
            method : 'POST',
            headers: {
                'Content-Type': 'application/json'
                // 'Content-Type': 'application/x-www-form-urlencoded',
            },
            body : JSON.stringify(coord)
        });
        if (response.status === 200) return await response.json();
        else throw new Error("Can't get weather data");  
    } catch (err) {
        throw(err);
    }
}

async function test()  {
    const pos = await getUserLocation();
    const location = {lat:pos.coords.latitude, lon:pos.coords.longitude};
    try {
        const weather = await getCurrentWeather(location);
        updateDom(weather);   
    } catch(err) {
        console.log(err);
    }
    
}

window.onload = test;