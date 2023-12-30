const searchBox = document.querySelector(".search input");
const searchBtn = document.querySelector(".search button");

searchBtn.addEventListener("click", () => {
    const city = searchBox.value;
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            console.log(this.responseText);
        }
    };
    xhttp.open("GET", `update_weather.php?city=${city}`, true);
    xhttp.send();
});
