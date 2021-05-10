import pandas as pd  
import sqlalchemy
import random 
import requests
import sys

engine =sqlalchemy.create_engine("mysql+pymysql://root@localhost:3306/tapship")

d_mobile = "7042757709"
d_pincode = "574115"

s1= 'SELECT CD.cro_name, CD.cro_type, cb.cb_id, CS.cr_id, CS.cr_quantity, f.f_name, f.f_mobile, f.f_city, f.f_pincode, c.c_name, c.c_mobile, c.c_city, c.c_pincode FROM cropdetails cd, cropbid cb, cropsale cs, farmer f, customer c, transportbid tb where cd.cro_id=cs.cr_cro_id AND cb.cb_cr_id=cs.cr_id AND f.f_mobile=cb.cb_f_mobile AND c.c_mobile=cb.cb_c_mobile AND cb.cb_transporttype=2 AND cb.cb_status in (6,7) AND tb.tb_status=0 AND tb.tb_cb_id!=cb.cb_id'


df1 = pd.read_sql_query(s1,engine)
df1 = pd.DataFrame(df1)

pinurl1 = 'https://dev.virtualearth.net/REST/v1/Locations?countryRegion=IN&o=json&postalCode='+d_pincode+'&maxResults=1&key=Alcd58ybycSq_3khfOUdGYo7AnC4PMT_03DlC6y8r7lcWZk7IwtK17LDNMq0_l3d'
response1 = requests.get(pinurl1)
resp_json_payload1 = response1.json()

coordinates1 = list(resp_json_payload1['resourceSets'][0]['resources'][0]['point']['coordinates'])
lat1 = str(coordinates1[0])
long1 = str(coordinates1[1])

pindic = pd.Series(df1.f_pincode.values,index=df1.cb_id).to_dict()
crcbdic = pd.Series(df1.cr_id.values,index=df1.cb_id).to_dict()
disdic = pindic.copy()

for ele in pindic:
    pinurl2 = 'https://dev.virtualearth.net/REST/v1/Locations?countryRegion=IN&o=json&postalCode='+pindic[ele]+'&maxResults=1&key=Alcd58ybycSq_3khfOUdGYo7AnC4PMT_03DlC6y8r7lcWZk7IwtK17LDNMq0_l3d'
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
    order = order+'when cb_id ='+str(ele) +' then '+str(count)+' '
    count+= 1
order+= ' else '+str(count)+' end asc'

s2= 'SELECT CD.cro_name as "Crop Name", CD.cro_type as "Crop Type", CS.cr_quantity as "Crop Quantity", c.c_name as "Customer Name", c.c_mobile as "Customer Mobile", c.c_city as "Customer City", c.c_pincode as "Customer Pincode", f.f_name as "Farmer Name", f.f_mobile as "Farmer Mobile", f.f_city as "Farmer City", f.f_pincode as "Farmer Pincode" FROM cropdetails cd, cropbid cb, cropsale cs, farmer f, customer c, transportbid tb where cd.cro_id=cs.cr_cro_id AND cb.cb_cr_id=cs.cr_id AND f.f_mobile=cb.cb_f_mobile AND c.c_mobile=cb.cb_c_mobile AND cb.cb_transporttype=2 AND cb.cb_status in (6,7) AND tb.tb_status=0 AND tb.tb_cb_id!=cb.cb_id '+order


df2 = pd.read_sql_query(s2,engine)
df2 = pd.DataFrame(df2)

lis = []
for ele in disdicsort:
    lis.append(disdicsort[ele])
df2['Distance (in KM)'] = lis

cbidsort = list(disdicsort.keys())
crcbdicsort = dict(sorted(crcbdic.items(), key=lambda pair: cbidsort.index(pair[0])))

idx = 0
num = 0
srcol = []
for i in range(len(cbidsort)):
    num+=1
    srcol.append(num)
    
df2.insert(loc=idx, column='Sr. No', value=srcol)

liscr = []
view = ''
for ele in crcbdicsort:
    view = '<button class="btn" style="background-color:#0c3823;"> <a href="viewdeal.php?cr_id='+str(crcbdicsort[ele])+'" class="text-white"> View </a> </button>'
    liscr.append(view)

for ele in liscr:
    df2['View'] = liscr

table = df2.to_html(classes=' table table-striped table-hover table-bordered')

table = table.replace("&lt;", "<")
table = table.replace("&gt;", ">")
table = table.replace("\n", "")


print(table)