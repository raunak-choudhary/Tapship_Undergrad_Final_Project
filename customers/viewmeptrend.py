import pandas as pd  
import sqlalchemy
import matplotlib.pyplot as plt
import io
import sys
import base64

engine =sqlalchemy.create_engine("mysql+pymysql://uodltp4afruoomkk:WAniOzDcPXxfNZTCLGnl@b3bu9bb23ikjqsiv8aku-mysql.services.clever-cloud.com:3306/b3bu9bb23ikjqsiv8aku")

cro_id = str(sys.argv[1])

s1=  'select * from mepdetails where cro_id='+cro_id +' order by id desc limit 5'
values = pd.read_sql_query(s1,engine)

AVG = int(values['mep'].mean())
lst=list(values['mep'])

val=[1,2,3,4,5]
fig, ax = plt.subplots(figsize=(20,6))
plt.bar(val, values['mep'], color ='maroon',width = 0.4)
plt.xlabel("Last 5 Transaction on Tapship", fontsize=15)
plt.ylabel("MEP in Rupees(₹)", fontsize=15)
plt.title("MEP Trends" , fontsize=20)
fig.savefig('assets/meptracking.png')

def fig_to_base64(fig):
    img = io.BytesIO()
    fig.savefig(img, format='png',
                bbox_inches='tight')
    img.seek(0)

    return base64.b64encode(img.getvalue())

encoded = fig_to_base64(fig)
my_html = '<img src="data:image/png;base64, {}">'.format(encoded.decode('utf-8'))

for i in range(5):
    print(lst[i])
print(AVG)
print(my_html)