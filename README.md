# Moodify
**Moodify** is a website that suggest music *in  accordance to the weather*. Weather affects your mood. We often feel sad, or emotional when it’s raining; energetic or excited when it’s sunny. So does music. We listen to upbeat songs when it’s sunny and moody ones when it’s raining,... the list goes on. So why not combining these two factors that when your mood (hence the name “mood-ify”) came in, the music list has already been planned out for you?
## Features
- **User Input**
    -  Input a city in search bar.
    -  Some recommended city appeared due to user input
- **Weathers**
    -  Get real weathers of user's input data from OpenWeatherAppAPI
- **Songs**
    - Song list is got from Embed Spotify's songlist (https://www.spotify.com)
    - Use the weathers data to generate song lists
    - Song infmation appear to screen contants: Album image, Song title, Artist name
    - A list of newly generated songs in JSON format every time a new request is made by user
- **Search bar**
    - Perform a GET request to moodify.net/city. The input should be the user’s city
    -  In /city, the index function is called in the controller first, which will load the view file ‘city.php’, perform the getRecommendation() function and send its data for the view file to parse
    -  The user input is used to get data from OpenWeatherMap API. Used to display weather data and to generate song lists

## Links to SRS and SDD files:
updating...
    
