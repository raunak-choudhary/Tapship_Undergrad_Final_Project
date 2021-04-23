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

day1_weather = []
day2_weather = []
day3_weather = []
day4_weather = []
day5_weather = []
day6_weather = []
day7_weather = []
day8_weather = []
day_name= ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday','Sunday']
month_name = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']

#degree sign
degree_sign = u"\N{DEGREE SIGN}"
# HTTP request
response = requests.get(URL)
# checking the status code of the request
if response.status_code == 200:
    # getting data in the json format
    data = response.json()
    # getting the main daily dict block
    daily = data['daily']
    l2_main = []
    #Collecting Daily Data Dictionary
    for i in daily:
        l2_main.append(i)
    #Collecting Daily Data for 8 days including current day   
    #Day 1 Data (current)
    date_ts = l2_main[0]['dt']
    sunrise_ts = l2_main[0]['sunrise']
    sunset_ts = l2_main[0]['sunset']
    temp = l2_main[0]['temp']['day']
    max_temp = l2_main[0]['temp']['max']
    min_temp = l2_main[0]['temp']['min']
    humidity = l2_main[0]['humidity']
    dew_point = l2_main[0]['dew_point']
    clouds = l2_main[0]['clouds']
    wind_speed = l2_main[0]['wind_speed']
    weather = l2_main[0]['weather'][0]['description']
    weather_icon_no = l2_main[0]['weather'][0]['icon']
        
    #Getting Date, Week Day, Month Name from timestamp of particular day 
    utc = datetime.fromtimestamp(date_ts)
    itc_time= utc.astimezone(tz.gettz('ITC'))
    year = itc_time.year
    month_no = itc_time.month
    day = itc_time.day
    date = str(day)+"-"+str(month_no)+"-"+str(year)
    week_day = datetime.strptime(date, '%d-%m-%Y').weekday()
    week_day = day_name[week_day]
    month = month_name[month_no-1]
    date = str(day)+" "+str(month)+" "+str(year)
        
    #Getting Sunrise Time from sunrise timestamp
    utc = datetime.fromtimestamp(sunrise_ts)
    itc_time= utc.astimezone(tz.gettz('ITC'))
    hour = itc_time.hour
    minute = itc_time.minute
    sunrise_time = str(hour)+":"+str(minute)
    sunrise_time_24hour = datetime.strptime(sunrise_time, "%H:%M")
    sunrise_time_12hour = sunrise_time_24hour.strftime("%I:%M %p")

    #Getting Sunset Time from sunset timestamp
    utc = datetime.fromtimestamp(sunset_ts)
    itc_time= utc.astimezone(tz.gettz('ITC'))
    hour = itc_time.hour
    minute = itc_time.minute
    sunset_time = str(hour)+":"+str(minute)
    sunset_time_24hour = datetime.strptime(sunset_time, "%H:%M")
    sunset_time_12hour = sunset_time_24hour.strftime("%I:%M %p")
        
    #Converting Integer Values to String Format and appending values to list
    day1_weather.append(week_day)
    day1_weather.append(date)
    weather_icon_link = "http://openweathermap.org/img/w/"+weather_icon_no+".png"
    weather_icon = '<img src="'+weather_icon_link+'"'+' style="vertical-align: middle; margin-right: 25px;" width="55" height="55" />'
    weather_icon = weather_icon.replace("&lt;", "<")
    weather_icon = weather_icon.replace("&gt;", ">")
    weather_icon = weather_icon.replace("\n", "")
    day1_weather.append(weather_icon)
    day1_weather.append(str(temp)+"&deg;"+"C")
    day1_weather.append(str(weather).title())
    day1_weather.append(str(clouds)+"%")
    day1_weather.append(str(humidity)+"%")
    day1_weather.append(str(dew_point)+"&deg;"+"C")
    day1_weather.append(str(wind_speed)+" km/h")
    day1_weather.append(sunrise_time_12hour)
    day1_weather.append(sunset_time_12hour)
    day1_weather.append(str(max_temp)+"&deg;"+"C")
    day1_weather.append(str(min_temp)+"&deg;"+"C")

    #Day 2 Data 
    date_ts = l2_main[1]['dt']
    sunrise_ts = l2_main[1]['sunrise']
    sunset_ts = l2_main[1]['sunset']
    temp = l2_main[1]['temp']['day']
    max_temp = l2_main[1]['temp']['max']
    min_temp = l2_main[1]['temp']['min']
    humidity = l2_main[1]['humidity']
    dew_point = l2_main[1]['dew_point']
    clouds = l2_main[1]['clouds']
    wind_speed = l2_main[1]['wind_speed']
    weather = l2_main[1]['weather'][0]['description']
    weather_icon_no = l2_main[1]['weather'][0]['icon']
        
    #Getting Date, Week Day, Month Name from timestamp of particular day 
    utc = datetime.fromtimestamp(date_ts)
    itc_time= utc.astimezone(tz.gettz('ITC'))
    year = itc_time.year
    month_no = itc_time.month
    day = itc_time.day
    date = str(day)+"-"+str(month_no)+"-"+str(year)
    week_day = datetime.strptime(date, '%d-%m-%Y').weekday()
    week_day = day_name[week_day]
    month = month_name[month_no-1]
    date = str(day)+" "+str(month)+" "+str(year)
        
    #Getting Sunrise Time from sunrise timestamp
    utc = datetime.fromtimestamp(sunrise_ts)
    itc_time= utc.astimezone(tz.gettz('ITC'))
    hour = itc_time.hour
    minute = itc_time.minute
    sunrise_time = str(hour)+":"+str(minute)
    sunrise_time_24hour = datetime.strptime(sunrise_time, "%H:%M")
    sunrise_time_12hour = sunrise_time_24hour.strftime("%I:%M %p")

    #Getting Sunset Time from sunset timestamp
    utc = datetime.fromtimestamp(sunset_ts)
    itc_time= utc.astimezone(tz.gettz('ITC'))
    hour = itc_time.hour
    minute = itc_time.minute
    sunset_time = str(hour)+":"+str(minute)
    sunset_time_24hour = datetime.strptime(sunset_time, "%H:%M")
    sunset_time_12hour = sunset_time_24hour.strftime("%I:%M %p")
        
    #Converting Integer Values to String Format and appending values to list
    day2_weather.append(week_day)
    day2_weather.append(date)
    weather_icon_link = "http://openweathermap.org/img/w/"+weather_icon_no+".png"
    weather_icon = '<img src="'+weather_icon_link+'"'+' style="vertical-align: middle; margin-right: 25px;" width="55" height="55" />'
    weather_icon = weather_icon.replace("&lt;", "<")
    weather_icon = weather_icon.replace("&gt;", ">")
    weather_icon = weather_icon.replace("\n", "")
    day2_weather.append(weather_icon)
    day2_weather.append(str(temp)+"&deg;"+"C")
    day2_weather.append(str(weather).title())
    day2_weather.append(str(clouds)+"%")
    day2_weather.append(str(humidity)+"%")
    day2_weather.append(str(dew_point)+"&deg;"+"C")
    day2_weather.append(str(wind_speed)+" km/h")
    day2_weather.append(sunrise_time_12hour)
    day2_weather.append(sunset_time_12hour)
    day2_weather.append(str(max_temp)+"&deg;"+"C")
    day2_weather.append(str(min_temp)+"&deg;"+"C")

    #Day 3 Data 
    date_ts = l2_main[2]['dt']
    sunrise_ts = l2_main[2]['sunrise']
    sunset_ts = l2_main[2]['sunset']
    temp = l2_main[2]['temp']['day']
    max_temp = l2_main[2]['temp']['max']
    min_temp = l2_main[2]['temp']['min']
    humidity = l2_main[2]['humidity']
    dew_point = l2_main[2]['dew_point']
    clouds = l2_main[2]['clouds']
    wind_speed = l2_main[2]['wind_speed']
    weather = l2_main[2]['weather'][0]['description']
    weather_icon_no = l2_main[2]['weather'][0]['icon']
        
    #Getting Date, Week Day, Month Name from timestamp of particular day 
    utc = datetime.fromtimestamp(date_ts)
    itc_time= utc.astimezone(tz.gettz('ITC'))
    year = itc_time.year
    month_no = itc_time.month
    day = itc_time.day
    date = str(day)+"-"+str(month_no)+"-"+str(year)
    week_day = datetime.strptime(date, '%d-%m-%Y').weekday()
    week_day = day_name[week_day]
    month = month_name[month_no-1]
    date = str(day)+" "+str(month)+" "+str(year)
        
    #Getting Sunrise Time from sunrise timestamp
    utc = datetime.fromtimestamp(sunrise_ts)
    itc_time= utc.astimezone(tz.gettz('ITC'))
    hour = itc_time.hour
    minute = itc_time.minute
    sunrise_time = str(hour)+":"+str(minute)
    sunrise_time_24hour = datetime.strptime(sunrise_time, "%H:%M")
    sunrise_time_12hour = sunrise_time_24hour.strftime("%I:%M %p")

    #Getting Sunset Time from sunset timestamp
    utc = datetime.fromtimestamp(sunset_ts)
    itc_time= utc.astimezone(tz.gettz('ITC'))
    hour = itc_time.hour
    minute = itc_time.minute
    sunset_time = str(hour)+":"+str(minute)
    sunset_time_24hour = datetime.strptime(sunset_time, "%H:%M")
    sunset_time_12hour = sunset_time_24hour.strftime("%I:%M %p")
        
    #Converting Integer Values to String Format and appending values to list
    day3_weather.append(week_day)
    day3_weather.append(date)
    weather_icon_link = "http://openweathermap.org/img/w/"+weather_icon_no+".png"
    weather_icon = '<img src="'+weather_icon_link+'"'+' style="vertical-align: middle; margin-right: 25px;" width="55" height="55" />'
    weather_icon = weather_icon.replace("&lt;", "<")
    weather_icon = weather_icon.replace("&gt;", ">")
    weather_icon = weather_icon.replace("\n", "")
    day3_weather.append(weather_icon)
    day3_weather.append(str(temp)+"&deg;"+"C")
    day3_weather.append(str(weather).title())
    day3_weather.append(str(clouds)+"%")
    day3_weather.append(str(humidity)+"%")
    day3_weather.append(str(dew_point)+"&deg;"+"C")
    day3_weather.append(str(wind_speed)+" km/h")
    day3_weather.append(sunrise_time_12hour)
    day3_weather.append(sunset_time_12hour)
    day3_weather.append(str(max_temp)+"&deg;"+"C")
    day3_weather.append(str(min_temp)+"&deg;"+"C")
	
    #Day 4 Data 
    date_ts = l2_main[3]['dt']
    sunrise_ts = l2_main[3]['sunrise']
    sunset_ts = l2_main[3]['sunset']
    temp = l2_main[3]['temp']['day']
    max_temp = l2_main[3]['temp']['max']
    min_temp = l2_main[3]['temp']['min']
    humidity = l2_main[3]['humidity']
    dew_point = l2_main[3]['dew_point']
    clouds = l2_main[3]['clouds']
    wind_speed = l2_main[3]['wind_speed']
    weather = l2_main[3]['weather'][0]['description']
    weather_icon_no = l2_main[3]['weather'][0]['icon']
        
    #Getting Date, Week Day, Month Name from timestamp of particular day 
    utc = datetime.fromtimestamp(date_ts)
    itc_time= utc.astimezone(tz.gettz('ITC'))
    year = itc_time.year
    month_no = itc_time.month
    day = itc_time.day
    date = str(day)+"-"+str(month_no)+"-"+str(year)
    week_day = datetime.strptime(date, '%d-%m-%Y').weekday()
    week_day = day_name[week_day]
    month = month_name[month_no-1]
    date = str(day)+" "+str(month)+" "+str(year)
        
    #Getting Sunrise Time from sunrise timestamp
    utc = datetime.fromtimestamp(sunrise_ts)
    itc_time= utc.astimezone(tz.gettz('ITC'))
    hour = itc_time.hour
    minute = itc_time.minute
    sunrise_time = str(hour)+":"+str(minute)
    sunrise_time_24hour = datetime.strptime(sunrise_time, "%H:%M")
    sunrise_time_12hour = sunrise_time_24hour.strftime("%I:%M %p")

    #Getting Sunset Time from sunset timestamp
    utc = datetime.fromtimestamp(sunset_ts)
    itc_time= utc.astimezone(tz.gettz('ITC'))
    hour = itc_time.hour
    minute = itc_time.minute
    sunset_time = str(hour)+":"+str(minute)
    sunset_time_24hour = datetime.strptime(sunset_time, "%H:%M")
    sunset_time_12hour = sunset_time_24hour.strftime("%I:%M %p")
        
    #Converting Integer Values to String Format and appending values to list
    day4_weather.append(week_day)
    day4_weather.append(date)
    weather_icon_link = "http://openweathermap.org/img/w/"+weather_icon_no+".png"
    weather_icon = '<img src="'+weather_icon_link+'"'+' style="vertical-align: middle; margin-right: 25px;" width="55" height="55" />'
    weather_icon = weather_icon.replace("&lt;", "<")
    weather_icon = weather_icon.replace("&gt;", ">")
    weather_icon = weather_icon.replace("\n", "")
    day4_weather.append(weather_icon)
    day4_weather.append(str(temp)+"&deg;"+"C")
    day4_weather.append(str(weather).title())
    day4_weather.append(str(clouds)+"%")
    day4_weather.append(str(humidity)+"%")
    day4_weather.append(str(dew_point)+"&deg;"+"C")
    day4_weather.append(str(wind_speed)+" km/h")
    day4_weather.append(sunrise_time_12hour)
    day4_weather.append(sunset_time_12hour)
    day4_weather.append(str(max_temp)+"&deg;"+"C")
    day4_weather.append(str(min_temp)+"&deg;"+"C")

    #Day 5 Data 
    date_ts = l2_main[4]['dt']
    sunrise_ts = l2_main[4]['sunrise']
    sunset_ts = l2_main[4]['sunset']
    temp = l2_main[4]['temp']['day']
    max_temp = l2_main[4]['temp']['max']
    min_temp = l2_main[4]['temp']['min']
    humidity = l2_main[4]['humidity']
    dew_point = l2_main[4]['dew_point']
    clouds = l2_main[4]['clouds']
    wind_speed = l2_main[4]['wind_speed']
    weather = l2_main[4]['weather'][0]['description']
    weather_icon_no = l2_main[4]['weather'][0]['icon']
        
    #Getting Date, Week Day, Month Name from timestamp of particular day 
    utc = datetime.fromtimestamp(date_ts)
    itc_time= utc.astimezone(tz.gettz('ITC'))
    year = itc_time.year
    month_no = itc_time.month
    day = itc_time.day
    date = str(day)+"-"+str(month_no)+"-"+str(year)
    week_day = datetime.strptime(date, '%d-%m-%Y').weekday()
    week_day = day_name[week_day]
    month = month_name[month_no-1]
    date = str(day)+" "+str(month)+" "+str(year)
        
    #Getting Sunrise Time from sunrise timestamp
    utc = datetime.fromtimestamp(sunrise_ts)
    itc_time= utc.astimezone(tz.gettz('ITC'))
    hour = itc_time.hour
    minute = itc_time.minute
    sunrise_time = str(hour)+":"+str(minute)
    sunrise_time_24hour = datetime.strptime(sunrise_time, "%H:%M")
    sunrise_time_12hour = sunrise_time_24hour.strftime("%I:%M %p")

    #Getting Sunset Time from sunset timestamp
    utc = datetime.fromtimestamp(sunset_ts)
    itc_time= utc.astimezone(tz.gettz('ITC'))
    hour = itc_time.hour
    minute = itc_time.minute
    sunset_time = str(hour)+":"+str(minute)
    sunset_time_24hour = datetime.strptime(sunset_time, "%H:%M")
    sunset_time_12hour = sunset_time_24hour.strftime("%I:%M %p")
        
    #Converting Integer Values to String Format and appending values to list
    day5_weather.append(week_day)
    day5_weather.append(date)
    weather_icon_link = "http://openweathermap.org/img/w/"+weather_icon_no+".png"
    weather_icon = '<img src="'+weather_icon_link+'"'+' style="vertical-align: middle; margin-right: 25px;" width="55" height="55" />'
    weather_icon = weather_icon.replace("&lt;", "<")
    weather_icon = weather_icon.replace("&gt;", ">")
    weather_icon = weather_icon.replace("\n", "")
    day5_weather.append(weather_icon)
    day5_weather.append(str(temp)+"&deg;"+"C")
    day5_weather.append(str(weather).title())
    day5_weather.append(str(clouds)+"%")
    day5_weather.append(str(humidity)+"%")
    day5_weather.append(str(dew_point)+"&deg;"+"C")
    day5_weather.append(str(wind_speed)+" km/h")
    day5_weather.append(sunrise_time_12hour)
    day5_weather.append(sunset_time_12hour)
    day5_weather.append(str(max_temp)+"&deg;"+"C")
    day5_weather.append(str(min_temp)+"&deg;"+"C")

    #Day 6 Data 
    date_ts = l2_main[5]['dt']
    sunrise_ts = l2_main[5]['sunrise']
    sunset_ts = l2_main[5]['sunset']
    temp = l2_main[5]['temp']['day']
    max_temp = l2_main[5]['temp']['max']
    min_temp = l2_main[5]['temp']['min']
    humidity = l2_main[5]['humidity']
    dew_point = l2_main[5]['dew_point']
    clouds = l2_main[5]['clouds']
    wind_speed = l2_main[5]['wind_speed']
    weather = l2_main[5]['weather'][0]['description']
    weather_icon_no = l2_main[5]['weather'][0]['icon']
        
    #Getting Date, Week Day, Month Name from timestamp of particular day 
    utc = datetime.fromtimestamp(date_ts)
    itc_time= utc.astimezone(tz.gettz('ITC'))
    year = itc_time.year
    month_no = itc_time.month
    day = itc_time.day
    date = str(day)+"-"+str(month_no)+"-"+str(year)
    week_day = datetime.strptime(date, '%d-%m-%Y').weekday()
    week_day = day_name[week_day]
    month = month_name[month_no-1]
    date = str(day)+" "+str(month)+" "+str(year)
        
    #Getting Sunrise Time from sunrise timestamp
    utc = datetime.fromtimestamp(sunrise_ts)
    itc_time= utc.astimezone(tz.gettz('ITC'))
    hour = itc_time.hour
    minute = itc_time.minute
    sunrise_time = str(hour)+":"+str(minute)
    sunrise_time_24hour = datetime.strptime(sunrise_time, "%H:%M")
    sunrise_time_12hour = sunrise_time_24hour.strftime("%I:%M %p")

    #Getting Sunset Time from sunset timestamp
    utc = datetime.fromtimestamp(sunset_ts)
    itc_time= utc.astimezone(tz.gettz('ITC'))
    hour = itc_time.hour
    minute = itc_time.minute
    sunset_time = str(hour)+":"+str(minute)
    sunset_time_24hour = datetime.strptime(sunset_time, "%H:%M")
    sunset_time_12hour = sunset_time_24hour.strftime("%I:%M %p")
        
    #Converting Integer Values to String Format and appending values to list
    day6_weather.append(week_day)
    day6_weather.append(date)
    weather_icon_link = "http://openweathermap.org/img/w/"+weather_icon_no+".png"
    weather_icon = '<img src="'+weather_icon_link+'"'+' style="vertical-align: middle; margin-right: 25px;" width="55" height="55" />'
    weather_icon = weather_icon.replace("&lt;", "<")
    weather_icon = weather_icon.replace("&gt;", ">")
    weather_icon = weather_icon.replace("\n", "")
    day6_weather.append(weather_icon)
    day6_weather.append(str(temp)+"&deg;"+"C")
    day6_weather.append(str(weather).title())
    day6_weather.append(str(clouds)+"%")
    day6_weather.append(str(humidity)+"%")
    day6_weather.append(str(dew_point)+"&deg;"+"C")
    day6_weather.append(str(wind_speed)+" km/h")
    day6_weather.append(sunrise_time_12hour)
    day6_weather.append(sunset_time_12hour)
    day6_weather.append(str(max_temp)+"&deg;"+"C")
    day6_weather.append(str(min_temp)+"&deg;"+"C")

    #Day 7 Data 
    date_ts = l2_main[6]['dt']
    sunrise_ts = l2_main[6]['sunrise']
    sunset_ts = l2_main[6]['sunset']
    temp = l2_main[6]['temp']['day']
    max_temp = l2_main[6]['temp']['max']
    min_temp = l2_main[6]['temp']['min']
    humidity = l2_main[6]['humidity']
    dew_point = l2_main[6]['dew_point']
    clouds = l2_main[6]['clouds']
    wind_speed = l2_main[6]['wind_speed']
    weather = l2_main[6]['weather'][0]['description']
    weather_icon_no = l2_main[6]['weather'][0]['icon']
        
    #Getting Date, Week Day, Month Name from timestamp of particular day 
    utc = datetime.fromtimestamp(date_ts)
    itc_time= utc.astimezone(tz.gettz('ITC'))
    year = itc_time.year
    month_no = itc_time.month
    day = itc_time.day
    date = str(day)+"-"+str(month_no)+"-"+str(year)
    week_day = datetime.strptime(date, '%d-%m-%Y').weekday()
    week_day = day_name[week_day]
    month = month_name[month_no-1]
    date = str(day)+" "+str(month)+" "+str(year)
        
    #Getting Sunrise Time from sunrise timestamp
    utc = datetime.fromtimestamp(sunrise_ts)
    itc_time= utc.astimezone(tz.gettz('ITC'))
    hour = itc_time.hour
    minute = itc_time.minute
    sunrise_time = str(hour)+":"+str(minute)
    sunrise_time_24hour = datetime.strptime(sunrise_time, "%H:%M")
    sunrise_time_12hour = sunrise_time_24hour.strftime("%I:%M %p")

    #Getting Sunset Time from sunset timestamp
    utc = datetime.fromtimestamp(sunset_ts)
    itc_time= utc.astimezone(tz.gettz('ITC'))
    hour = itc_time.hour
    minute = itc_time.minute
    sunset_time = str(hour)+":"+str(minute)
    sunset_time_24hour = datetime.strptime(sunset_time, "%H:%M")
    sunset_time_12hour = sunset_time_24hour.strftime("%I:%M %p")
        
    #Converting Integer Values to String Format and appending values to list
    day7_weather.append(week_day)
    day7_weather.append(date)
    weather_icon_link = "http://openweathermap.org/img/w/"+weather_icon_no+".png"
    weather_icon = '<img src="'+weather_icon_link+'"'+' style="vertical-align: middle; margin-right: 25px;" width="55" height="55" />'
    weather_icon = weather_icon.replace("&lt;", "<")
    weather_icon = weather_icon.replace("&gt;", ">")
    weather_icon = weather_icon.replace("\n", "")
    day7_weather.append(weather_icon)
    day7_weather.append(str(temp)+"&deg;"+"C")
    day7_weather.append(str(weather).title())
    day7_weather.append(str(clouds)+"%")
    day7_weather.append(str(humidity)+"%")
    day7_weather.append(str(dew_point)+"&deg;"+"C")
    day7_weather.append(str(wind_speed)+" km/h")
    day7_weather.append(sunrise_time_12hour)
    day7_weather.append(sunset_time_12hour)
    day7_weather.append(str(max_temp)+"&deg;"+"C")
    day7_weather.append(str(min_temp)+"&deg;"+"C")

    #Day 8 Data 
    date_ts = l2_main[7]['dt']
    sunrise_ts = l2_main[7]['sunrise']
    sunset_ts = l2_main[7]['sunset']
    temp = l2_main[7]['temp']['day']
    max_temp = l2_main[7]['temp']['max']
    min_temp = l2_main[7]['temp']['min']
    humidity = l2_main[7]['humidity']
    dew_point = l2_main[7]['dew_point']
    clouds = l2_main[7]['clouds']
    wind_speed = l2_main[7]['wind_speed']
    weather = l2_main[7]['weather'][0]['description']
    weather_icon_no = l2_main[7]['weather'][0]['icon']
        
    #Getting Date, Week Day, Month Name from timestamp of particular day 
    utc = datetime.fromtimestamp(date_ts)
    itc_time= utc.astimezone(tz.gettz('ITC'))
    year = itc_time.year
    month_no = itc_time.month
    day = itc_time.day
    date = str(day)+"-"+str(month_no)+"-"+str(year)
    week_day = datetime.strptime(date, '%d-%m-%Y').weekday()
    week_day = day_name[week_day]
    month = month_name[month_no-1]
    date = str(day)+" "+str(month)+" "+str(year)
        
    #Getting Sunrise Time from sunrise timestamp
    utc = datetime.fromtimestamp(sunrise_ts)
    itc_time= utc.astimezone(tz.gettz('ITC'))
    hour = itc_time.hour
    minute = itc_time.minute
    sunrise_time = str(hour)+":"+str(minute)
    sunrise_time_24hour = datetime.strptime(sunrise_time, "%H:%M")
    sunrise_time_12hour = sunrise_time_24hour.strftime("%I:%M %p")

    #Getting Sunset Time from sunset timestamp
    utc = datetime.fromtimestamp(sunset_ts)
    itc_time= utc.astimezone(tz.gettz('ITC'))
    hour = itc_time.hour
    minute = itc_time.minute
    sunset_time = str(hour)+":"+str(minute)
    sunset_time_24hour = datetime.strptime(sunset_time, "%H:%M")
    sunset_time_12hour = sunset_time_24hour.strftime("%I:%M %p")
        
    #Converting Integer Values to String Format and appending values to list
    day8_weather.append(week_day)
    day8_weather.append(date)
    weather_icon_link = "http://openweathermap.org/img/w/"+weather_icon_no+".png"
    weather_icon = '<img src="'+weather_icon_link+'"'+' style="vertical-align: middle; margin-right: 25px;" width="55" height="55" />'
    weather_icon = weather_icon.replace("&lt;", "<")
    weather_icon = weather_icon.replace("&gt;", ">")
    weather_icon = weather_icon.replace("\n", "")
    day8_weather.append(weather_icon)
    day8_weather.append(str(temp)+"&deg;"+"C")
    day8_weather.append(str(weather).title())
    day8_weather.append(str(clouds)+"%")
    day8_weather.append(str(humidity)+"%")
    day8_weather.append(str(dew_point)+"&deg;"+"C")
    day8_weather.append(str(wind_speed)+" km/h")
    day8_weather.append(sunrise_time_12hour)
    day8_weather.append(sunset_time_12hour)
    day8_weather.append(str(max_temp)+"&deg;"+"C")
    day8_weather.append(str(min_temp)+"&deg;"+"C")


#Printing Values of Day 1
print(day1_weather[0])
print(day1_weather[1])
print(day1_weather[2])
print(day1_weather[3])
print(day1_weather[4])
print(day1_weather[5])
print(day1_weather[6])
print(day1_weather[7])
print(day1_weather[8])
print(day1_weather[9])
print(day1_weather[10])
print(day1_weather[11])
print(day1_weather[12])

#Printing Values of Day 2
print(day2_weather[0])
print(day2_weather[1])
print(day2_weather[2])
print(day2_weather[3])
print(day2_weather[4])
print(day2_weather[5])
print(day2_weather[6])
print(day2_weather[7])
print(day2_weather[8])
print(day2_weather[9])
print(day2_weather[10])
print(day2_weather[11])
print(day2_weather[12])

#Printing Values of Day 3
print(day3_weather[0])
print(day3_weather[1])
print(day3_weather[2])
print(day3_weather[3])
print(day3_weather[4])
print(day3_weather[5])
print(day3_weather[6])
print(day3_weather[7])
print(day3_weather[8])
print(day3_weather[9])
print(day3_weather[10])
print(day3_weather[11])
print(day3_weather[12])

#Printing Values of Day 4
print(day4_weather[0])
print(day4_weather[1])
print(day4_weather[2])
print(day4_weather[3])
print(day4_weather[4])
print(day4_weather[5])
print(day4_weather[6])
print(day4_weather[7])
print(day4_weather[8])
print(day4_weather[9])
print(day4_weather[10])
print(day4_weather[11])
print(day4_weather[12])

#Printing Values of Day 5
print(day5_weather[0])
print(day5_weather[1])
print(day5_weather[2])
print(day5_weather[3])
print(day5_weather[4])
print(day5_weather[5])
print(day5_weather[6])
print(day5_weather[7])
print(day5_weather[8])
print(day5_weather[9])
print(day5_weather[10])
print(day5_weather[11])
print(day5_weather[12])

#Printing Values of Day 6	
print(day6_weather[0])
print(day6_weather[1])
print(day6_weather[2])
print(day6_weather[3])
print(day6_weather[4])
print(day6_weather[5])
print(day6_weather[6])
print(day6_weather[7])
print(day6_weather[8])
print(day6_weather[9])
print(day6_weather[10])
print(day6_weather[11])
print(day6_weather[12])

#Printing Values of Day 7	
print(day7_weather[0])
print(day7_weather[1])
print(day7_weather[2])
print(day7_weather[3])
print(day7_weather[4])
print(day7_weather[5])
print(day7_weather[6])
print(day7_weather[7])
print(day7_weather[8])
print(day7_weather[9])
print(day7_weather[10])
print(day7_weather[11])
print(day7_weather[12])

#Printing Values of Day 8
print(day8_weather[0])
print(day8_weather[1])
print(day8_weather[2])
print(day8_weather[3])
print(day8_weather[4])
print(day8_weather[5])
print(day8_weather[6])
print(day8_weather[7])
print(day8_weather[8])
print(day8_weather[9])
print(day8_weather[10])
print(day8_weather[11])
print(day8_weather[12])