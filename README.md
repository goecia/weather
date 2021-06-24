# Plain simple: Weather

Oh boy... writting the readme... always a pleasure to make a bufoon of me showing my extremely sharp knowledge of UX, design skills and, more than anything, how savy I am on Markdown.

Why hello there, this is a wrapper for current weather on this open API: http://openweathermap.org for an online test.
For the current example, we're wrapping the current weather API. Current result are the following endpoints:

## City: Get weather by city name ([ISO3136](https://www.iso.org/obp/ui/#search) format)
    URL: /current/city/{city}
    METHOD: GET
    EXAMPLE:
        ```
            https://weather.com/current/city/london?state_code=uk&contry_code=44&units=metric&lang=en
        ```


## Id: Get current weather by city id (A curated list can be downloaded [here](http://bulk.openweathermap.org/sample/))
    URL: /current/id/{id}
    METHOD: GET
    EXAMPLE:
        ```
            https://weather.com/current/id/2172797?units=metric&lang=en
        ```


## Latitude & Longitude: Get current weather by it's geographical coordinates.
    URL: /current/lat/{lat}/long/{long}
    METHOD: GET
    EXAMPLE:
        ```
            https://weather.com/current/lat/35/long/139?units=metric&lang=en
        ```


## Zip: Get current weather by postal zip code.
    URL: /current/zip/{zip}
    METHOD: GET
    EXAMPLE:
        ```
            https://weather.com/current/zip/94040?units=metric&lang=en
        ```


## Bbox: Get current weather in a geometric rectangular area. Provinding latitude, longitud and zoom on map.
    URL: /current/bbox/{bbox}
    METHOD: GET
    EXAMPLE:
        ```
            https://weather.com/current/bbox/12,32,15,37,10?units=metric&lang=en
        ```


## Find: Get current weather for a given, circular area, around a given latitude and lingitude point.
    URL: /current/find/lat/{lat}/long/{long}
    METHOD: GET
    EXAMPLE:
        ```
            https://weather.com/current/lat/35.5/long/37.5?cnt=10&units=metric&lang=en
        ```
