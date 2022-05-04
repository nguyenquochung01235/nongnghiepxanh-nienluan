
async function getWeather(locator) {
    let apiUrl = `http://api.openweathermap.org/data/2.5/forecast?q=${locator}&lang=vi&appid=04b838353da9e4fa3511f9c0f9897d71`;
    let data = await fetch(apiUrl).then((res) => res.json());
    for (let index = 0; index < data.cnt; index++) {
      
      city_name = data.city.name;
      date = data.list[index].dt_txt;
      temp = (data.list[index].main.temp - 273).toFixed(0);
      weather_description = data.list[index].weather[0].description;
      icon = data.list[index].weather[0].icon;
      src_thumb = `http://openweathermap.org/img/wn/${icon}@2x.png`;
      wind_speed = data.list[index].wind.speed;
      
      var today = new Date();
      var dd = String(today.getDate()).padStart(2, "0");
      var current_time = today.getHours();
      var time = date.slice(11, 16);
      var nextDay = date.slice(0, 10);    
  
      if (date.slice(8, 10) == dd) {
        if (parseInt(time.slice(0, 2)) == current_time) {
          $(".weather__temperature-number").text(temp);
          $(".weather__place").text(
            "Thời tiết được xem tại thành phố " + city_name
          );
          $(".weather__date").text(today);
          $(".weather__status").text("Trời có thể có " + weather_description);
          $(".weather__wind").text("Gió: " + wind_speed + " km/h");
        } else {
          if (parseInt(time.slice(0, 2)) == current_time + 1) {
            $(".weather__temperature-number").text(temp);
            $(".weather__place").text(
              "Thời tiết được xem tại thành phố " + city_name
            );
            $(".weather__date").text(today);
            $(".weather__status").text("Trời có thể có " + weather_description);
            $(".weather__wind").text("Gió: " + wind_speed + " km/h");
          } else {
            if (parseInt(time.slice(0, 2)) == current_time + 2) {
              $(".weather__temperature-number").text(temp);
              $(".weather__place").text(
                "Thời tiết được xem tại thành phố " + city_name
              );
              $(".weather__date").text(today);
              $(".weather__status").text("Trời có thể có " + weather_description);
              $(".weather__wind").text("Gió: " + wind_speed + " km/h");
            } 
          }
        }
  
        $("#time").append(`
                            
                    <li class="weather__item"
                        <span id="tuesday" class="weather__day">${time}</span>
                        <img class="weather__img weather__img--small" src="${src_thumb}" alt="img" />
                        <p><span>${temp} Độ C</span></p>
                    </li>
                `);
      }
      if (date.slice(8, 10) !== dd && date.slice(11, 19) == "00:00:00") {
        $("#date").append(`
                    <li class="weather__item " id="weather__nextday">
                        <span id="tuesday" class="weather__day">${nextDay}</span>
                        <img class="weather__img weather__img--small" src="${src_thumb}" alt="img" />
                        <p><span>${temp} Độ C</span></p>
                    </li>
                `);
      }
    }
  }
var locator = $("#locator").val();
  getWeather(locator);
  