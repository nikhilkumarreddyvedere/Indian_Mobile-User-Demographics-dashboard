
# -*- coding: utf-8 -*-

import pandas as pd

import mysql.connector as sql

db_connection = sql.connect(host='127.0.0.1',port='3306' ,database='Capstone_Projects', user='root', password='root')

ev = pd.read_sql('SELECT event_id, device_id,timestamp,longitude,latitude FROM user_data', con=db_connection)
#ev1 = ev.applymap(str)
#print "ev datatype"
#print(type(ev1))
print ev

data_path = './input/'
gen_age_tr  = pd.read_sql('SELECT * FROM gender_age_train', con=db_connection)
#gen_age_tr = pd.read_csv(data_path + 'gender_age_train.csv')
print gen_age_tr
#print "gender datatype" 
#print(type(gen_age_tr))
#ev = pd.read_csv(data_path + 'myevents.csv')
#print(type(ev))
#ph_br_dev_model = pd.read_csv(data_path + 'phone_brand_device_model.csv')
ph_br_dev_model = pd.read_sql('SELECT * FROM phone_brand_device_model', con=db_connection)

df = gen_age_tr.merge(ev, how='left', on='device_id')
print df
df = df.merge(ph_br_dev_model, how='left', on='device_id')
print df

