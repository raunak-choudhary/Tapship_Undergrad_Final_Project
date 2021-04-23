import numpy as np
import pandas as pd
import random
import requests
import sys
import requests
import json
from dateutil import tz
from datetime import datetime
import time
from numpy import mean

f_mobile = str(sys.argv[1])
f_pincode = str(sys.argv[2])

# Finding Latitude & Longitude using Bing API
pinurl1 = 'https://dev.virtualearth.net/REST/v1/Locations?countryRegion=IN&o=json&postalCode=' +f_pincode+'&maxResults=1&key=Alcd58ybycSq_3khfOUdGYo7AnC4PMT_03DlC6y8r7lcWZk7IwtK17LDNMq0_l3d'

response1 = requests.get(pinurl1)
resp_json_payload1 = response1.json()

coordinates1 = list(resp_json_payload1['resourceSets'][0]['resources'][0]['point']['coordinates'])
lat1 = str(coordinates1[0])
long1 = str(coordinates1[1])

# Getting Location Name
liveurl = 'http://dev.virtualearth.net/REST/v1/Locations/'+lat1+','+long1 +'?&includeNeighborhood=1&o=json&key=Alcd58ybycSq_3khfOUdGYo7AnC4PMT_03DlC6y8r7lcWZk7IwtK17LDNMq0_l3d'
responselive = requests.get(liveurl)
resp_json_payloadlive = responselive.json()

loclive = (resp_json_payloadlive['resourceSets'][0]['resources'][0]['address']['locality'])
current_loc = str(loclive)

# Finding Weather Forecast using OpenWeatherMap API
BASE_URL = "http://api.openweathermap.org/data/2.5/onecall?"
API_KEY = "69abaf93c37f52a54804658d2ddd3f26"

URL = BASE_URL + "lat=" + lat1 + "&lon=" + long1 + "&exclude=minutely,hourly&units=metric&appid=" + API_KEY

#degree sign
degree_sign = u"\N{DEGREE SIGN}"
# HTTP request
response = requests.get(URL)
# checking the status code of the request
if response.status_code == 200:
    # getting data in the json format
    data = response.json()
    # getting the main dict block
    current = data['current']
    daily = data['daily']
    l1_main = {}
    l2_main = []
    #Collecting Current Dictionary
    for i in current:
        l1_main[i] = current[i]
    for i in daily:
        l2_main.append(i)
    #Collect Current Values
    current_date_ts = l1_main['dt']
    current_sunrise_ts = l1_main['sunrise']
    current_sunset_ts = l1_main['sunset']
    current_temp = l1_main['temp']
    current_feels_like = l1_main['feels_like']
    current_humidity = l1_main['humidity']
    current_dew_point = l1_main['dew_point']
    current_clouds = l1_main['clouds']
    current_wind_speed = l1_main['wind_speed']
    current_weather = l1_main['weather'][0]['description']
    current_weather_icon_no = l1_main['weather'][0]['icon']
#else:
    # showing the error message
    #print("Error in the HTTP request")

day_name= ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday','Sunday']
month_name = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']

#Getting Current Date, Week Day, Month Name from current timestamp
utc = datetime.fromtimestamp(current_date_ts)
itc_time= utc.astimezone(tz.gettz('ITC'))
year = itc_time.year
month_no = itc_time.month
day = itc_time.day
current_date = str(day)+"-"+str(month_no)+"-"+str(year)
week_day = datetime.strptime(current_date, '%d-%m-%Y').weekday()
current_week_day = day_name[week_day]
month = month_name[month_no-1]
current_date = str(day)+" "+str(month)+" "+str(year)

#Getting Sunrise Time from sunrise timestamp
utc = datetime.fromtimestamp(current_sunrise_ts)
itc_time= utc.astimezone(tz.gettz('ITC'))
hour = itc_time.hour
minute = itc_time.minute
current_sunrise_time = str(hour)+":"+str(minute)
current_sunrise_time_24hour = datetime.strptime(current_sunrise_time, "%H:%M")
current_sunrise_time_12hour = current_sunrise_time_24hour.strftime("%I:%M %p")

#Getting Sunset Time from sunset timestamp
utc = datetime.fromtimestamp(current_sunset_ts)
itc_time= utc.astimezone(tz.gettz('ITC'))
hour = itc_time.hour
minute = itc_time.minute
current_sunset_time = str(hour)+":"+str(minute)
current_sunset_time_24hour = datetime.strptime(current_sunset_time, "%H:%M")
current_sunset_time_12hour = current_sunset_time_24hour.strftime("%I:%M %p")

#Converting Integer Values to String Format
current_temp = str(current_temp)+degree_sign+"C"
current_feels_like = str(current_feels_like)+degree_sign+"C"
current_humidity = str(current_humidity)+"%"
current_dew_point = str(current_dew_point)+degree_sign+"C"
current_clouds = str(current_clouds)+"%"
current_wind_speed = str(current_wind_speed)+" km/h"
current_weather = str(current_weather).title()
current_weather_icon_link = "http://openweathermap.org/img/w/"+current_weather_icon_no+".png"
current_weather_icon = '<img src="'+current_weather_icon_link+'"'+' style="vertical-align: middle; margin-right: 25px;" width="55" height="55" />'

current_weather_icon = current_weather_icon.replace("&lt;", "<")
current_weather_icon = current_weather_icon.replace("&gt;", ">")
current_weather_icon = current_weather_icon.replace("\n", "")
current_temp = current_temp.replace("°", "&deg;")
current_feels_like = current_feels_like.replace("°", "&deg;")
current_dew_point = current_dew_point.replace("°", "&deg;")

#Printing Values
print(current_week_day)
print(current_date)
print(current_loc)
print(current_weather_icon)
print(current_temp)
print(current_weather)
print(current_clouds)
print(current_humidity)
print(current_feels_like)
print(current_dew_point)
print(current_wind_speed)
print(current_sunrise_time_12hour)
print(current_sunset_time_12hour)