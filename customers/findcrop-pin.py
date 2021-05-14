import pandas as pd  
import sqlalchemy
import random 
import requests
import sys

engine =sqlalchemy.create_engine("mysql+pymysql://uodltp4afruoomkk:WAniOzDcPXxfNZTCLGnl@b3bu9bb23ikjqsiv8aku-mysql.services.clever-cloud.com:3306/b3bu9bb23ikjqsiv8aku")

c_mobile = str(sys.argv[1])
c_pincode = str(sys.argv[2])

s1= 'SELECT cd.cro_name, cd.cro_type, cd.cro_msp, cs.cr_id, cs.cr_quantity, cs.cr_mep, cs.cr_status, f.f_name, f.f_mobile,f.f_pincode FROM cropdetails cd, cropsale cs, farmer f  where cd.cro_id=cs.cr_cro_id AND f.f_mobile=cs.cr_f_mobile AND cs.cr_status IN (0,1) AND (SELECT count(cb_id) from cropbid cb WHERE cb.cb_c_mobile ='+c_mobile+' AND cb.cb_cr_id = cs.cr_id)=0 ORDER BY cs.cr_id DESC'

df1 = pd.read_sql_query(s1,engine)
df1 = pd.DataFrame(df1)

pinurl1 = 'http://dev.virtualearth.net/REST/v1/Locations?countryRegion=IN&o=json&postalCode='+c_pincode+'&maxResults=1&key=Alcd58ybycSq_3khfOUdGYo7AnC4PMT_03DlC6y8r7lcWZk7IwtK17LDNMq0_l3d'
response1 = requests.get(pinurl1)
resp_json_payload1 = response1.json()

coordinates1 = list(resp_json_payload1['resourceSets'][0]['resources'][0]['point']['coordinates'])
lat1 = str(coordinates1[0])
long1 = str(coordinates1[1])

pindic = pd.Series(df1.f_pincode.values,index=df1.cr_id).to_dict()
disdic = pindic.copy()

for ele in pindic:
    pinurl2 = 'http://dev.virtualearth.net/REST/v1/Locations?countryRegion=IN&o=json&postalCode='+pindic[ele]+'&maxResults=1&key=Alcd58ybycSq_3khfOUdGYo7AnC4PMT_03DlC6y8r7lcWZk7IwtK17LDNMq0_l3d'
    response2 = requests.get(pinurl2)
    resp_json_payload2 = response2.json()

    coordinates2 = list(resp_json_payload2['resourceSets'][0]['resources'][0]['point']['coordinates'])
    lat2 = str(coordinates2[0])
    long2 = str(coordinates2[1])

    disurl = 'https://dev.virtualearth.net/REST/v1/Routes/DistanceMatrix?origins='+lat1+','+long1+'&destinations='+lat2+','+long2+'&travelMode=driving&o=json&key=Alcd58ybycSq_3khfOUdGYo7AnC4PMT_03DlC6y8r7lcWZk7IwtK17LDNMq0_l3d&distanceUnit=km'
    response3 = requests.get(disurl)
    resp_json_payload3 = response3.json()

    distance = round(resp_json_payload3['resourceSets'][0]['resources'][0]['results'][0]['travelDistance'],2)
    #travelTime = round(resp_json_payload3['resourceSets'][0]['resources'][0]['results'][0]['travelDuration']/60,2)
    
    disdic[ele] = distance

disdicsort = dict(sorted(disdic.items(), key=lambda item: item[1]))

order = 'ORDER BY case '
count = 1
for ele in disdicsort:
    order = order+'when cr_id ='+str(ele) +' then '+str(count)+' '
    count+= 1
order+= ' else '+str(count)+' end asc'

s2= 'SELECT cd.cro_name as "Crop Name", cd.cro_type as "Crop Type", cs.cr_quantity as "Crop Quantity (in kgs.)", cd.cro_msp as "Crop MSP", cs.cr_mep as "Crop MEP", f.f_name as "Farmer Name", f.f_mobile as "Farmer Mobile", f.f_city as "Farmer City" FROM cropdetails cd, cropsale cs, farmer f  where cd.cro_id=cs.cr_cro_id AND f.f_mobile=cs.cr_f_mobile AND cs.cr_status IN (0,1) AND (SELECT count(cb_id) from cropbid cb WHERE cb.cb_c_mobile ='+c_mobile+' AND cb.cb_cr_id = cs.cr_id)=0 '+order

df2 = pd.read_sql_query(s2,engine)
df2 = pd.DataFrame(df2)

lis = []
for ele in disdicsort:
    lis.append(disdicsort[ele])
df2['Distance (in KM)'] = lis

cbidsort = list(disdicsort.keys())
 
idx = 0
num = 0
srcol = []
for i in range(len(cbidsort)):
    num+=1
    srcol.append(num)
    
df2.insert(loc=idx, column='Sr. No', value=srcol)

liscr = []
view = ''
for ele in disdicsort:
    view = '<button class="btn" style="background-color:#0c3823;"> <a href="viewcrop.php?cr_id='+str(ele)+'" class="text-white"> View </a> </button>'
    liscr.append(view)

for ele in liscr:
    df2['View'] = liscr

table = df2.to_html(classes=' table table-striped table-hover table-bordered')

table = table.replace("&lt;", "<")
table = table.replace("&gt;", ">")
table = table.replace("\n", "")

print(table)