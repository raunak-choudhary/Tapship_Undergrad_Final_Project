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

coordinates1 = list(
    resp_json_payload1['resourceSets'][0]['resources'][0]['point']['coordinates'])
lat1 = str(coordinates1[0])
long1 = str(coordinates1[1])

# Getting Location Name
liveurl = 'http://dev.virtualearth.net/REST/v1/Locations/'+lat1+','+long1 +'?&includeNeighborhood=1&o=json&key=Alcd58ybycSq_3khfOUdGYo7AnC4PMT_03DlC6y8r7lcWZk7IwtK17LDNMq0_l3d'
responselive = requests.get(liveurl)
resp_json_payloadlive = responselive.json()

loclive = (resp_json_payloadlive['resourceSets'][0]['resources'][0]['name'])
loc = str(loclive)

# Finding Weather Forecast using OpenWeatherMap API
BASE_URL = "http://api.openweathermap.org/data/2.5/onecall?"
API_KEY = "69abaf93c37f52a54804658d2ddd3f26"

URL = BASE_URL + "lat=" + lat1 + "&lon=" + long1 + "&exclude=minutely,hourly&units=metric&appid=" + API_KEY

# degree sign
degree_sign = u"\N{DEGREE SIGN}"
# HTTP request
response = requests.get(URL)

df1 = pd.DataFrame()
df1 = pd.DataFrame(columns=['Date', 'Time of Sunrise', 'Time of Sunset','Max Temperature', 'Min Temperature', 'Humidity', 'Dew Point', 'Weather Forecast'])

# checking the status code of the request
if response.status_code == 200:
    # getting data in the json format
    data = response.json()
    # getting the main dict block
    daily = data['daily']
    l1_main = []
    date_lst = []
    sunrise_lst = []
    sunset_lst = []
    datetimestamp_lst = []
    sunrisetimestamp_lst = []
    sunsettimestamp_lst = []
    humidity_lst = []
    dew_point_lst = []
    max_temp_lst = []
    min_temp_lst = []
    weather_forecast_lst = []

    for i in daily:
        l1_main.append(i)

    for i in l1_main:
        datetimestamp_lst.append(i['dt'])
        sunrisetimestamp_lst.append(i['sunrise'])
        sunsettimestamp_lst.append(i['sunset'])
        humidity_lst.append(str(i['humidity'])+"%")
        dew_point_lst.append(i['dew_point'])
        min_temp_lst.append(str(i['temp']['min'])+degree_sign+"C")
        max_temp_lst.append(str(i['temp']['max'])+degree_sign+"C")
        weather_forecast_lst.append(
            str(i['weather'][0]['description']).title())

    for i in datetimestamp_lst:
        utc = datetime.fromtimestamp(i)
        itc_time = utc.astimezone(tz.gettz('ITC'))
        year = itc_time.year
        month = itc_time.month
        day = itc_time.day
        full_date = str(day)+'/'+str(month)+'/'+str(year)
        date_lst.append(full_date)

    for i in sunrisetimestamp_lst:
        utc = datetime.fromtimestamp(i)
        itc_time = utc.astimezone(tz.gettz('ITC'))
        hour = itc_time.hour
        minute = itc_time.minute
        full_time = str(hour)+":"+str(minute)
        full_time_24hour = datetime.strptime(full_time, "%H:%M")
        fulltime_12hour = full_time_24hour.strftime("%I:%M %p")
        sunrise_lst.append(fulltime_12hour)

    for i in sunsettimestamp_lst:
        utc = datetime.fromtimestamp(i)
        itc_time = utc.astimezone(tz.gettz('ITC'))
        hour = itc_time.hour
        minute = itc_time.minute
        full_time = str(hour)+":"+str(minute)
        full_time_24hour = datetime.strptime(full_time, "%H:%M")
        fulltime_12hour = full_time_24hour.strftime("%I:%M %p")
        sunset_lst.append(fulltime_12hour)

    for ele in date_lst:
        df1['Date'] = date_lst

    for ele in sunrise_lst:
        df1['Time of Sunrise'] = sunrise_lst

    for ele in sunset_lst:
        df1['Time of Sunset'] = sunset_lst

    for ele in max_temp_lst:
        df1['Max Temperature'] = max_temp_lst

    for ele in min_temp_lst:
        df1['Min Temperature'] = min_temp_lst

    for ele in humidity_lst:
        df1['Humidity'] = humidity_lst

    for ele in dew_point_lst:
        df1['Dew Point'] = dew_point_lst

    for ele in weather_forecast_lst:
        df1['Weather Forecast'] = weather_forecast_lst

#else:
    # showing the error message
    #print("Error in the HTTP request")


table = df1.to_html(classes=' table table-striped table-hover table-bordered')

table = table.replace("&lt;", "<")
table = table.replace("&gt;", ">")
table = table.replace("\n", "")

print(table)
print(loc)
