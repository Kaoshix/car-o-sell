document.addEventListener("DOMContentLoaded", function () {
    let temperatureDisplay = document.querySelector('.temperature_display');

    async function getWeather() {
        fetch('https://api.open-meteo.com/v1/forecast?latitude=48.892&longitude=2.2388&hourly=temperature_2m')
            .then(response => response.json())
            .then(data => {
                console.log(data.hourly.temperature_2m[0]);
                temperatureDisplay.innerHTML += data.hourly.temperature_2m[0] + '°C';
            }
            )
            .catch(error => console.log(error));
    }

    getWeather();

});