let login = () => {
    let spotifyLogIn = window.open("https://accounts.spotify.com/authorize?client_id=c9d1c2ad21274bf4b128f46a5345b30f&response_type=code&redirect_uri=http://localhost");
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