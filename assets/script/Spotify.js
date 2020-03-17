let login = () => {
    let spotifyLogIn = window.open("https://accounts.spotify.com/authorize?client_id=a554dedfaa6e4e1d8977bcc630a44bd4&response_type=code&redirect_uri=http://mood-ify.net/&scope=user-read-private%20user-read-email&state=34fFs29kd09", "Log in Spotify", "width=600, height=800");
    window.redirect = (token) => {
        spotifyLogIn.close();
        window.location += token;
    }
}

window.onload = () => {
    let Spotify = document.getElementById("Spotify");
    Spotify.addEventListener("click", login);
    let token = window.location.href.substr(1).split('&')[0].split("=")[1];
    console.log(token);
        if (token) {
            window.opener.redirect(token);
        }
}