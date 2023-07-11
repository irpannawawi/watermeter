import requests
import time as t
def req(data):
    url = "https://smartwatermeter.my.id/api/log_pemakaian"
    data = {'pemakaian_air': data['air'], 'status':data['status'], 'user_id':data['id'], 'email':'bima14pro@gmail.com', 'password':'bima7'}
    x = requests.get(url, data)
    print(x.text)
    print('==============================')
    t.sleep(5)

i=1
while i<5:
    dt = {'air':0, 'status': 'baik', 'id': 2}
    print('bagian 1 | Loop ke '+str(i))
    print('Data : ', dt)
    print("response : ")
    req(dt)
    i+=1


# bagian 2
i=1
status = 'baik'
while i<5:
    if status == 'baik':
        status = 'potensi%20kebocoran'
    else:
        status = 'baik'

    dt = {'air':i, 'status': status, 'id': 2}
    print('bagian 2 | Loop ke '+str(i))
    print('Data : ', dt)
    print("response : ")
    req(dt)
    i+=1


# bagian 3
i=1
while i<5:
    dt = {'air':0, 'status': 'baik', 'id': 2}
    print('bagian 3 | Loop ke '+str(i))
    print('Data : ', dt)
    print("response : ")
    req(dt)
    i+=1
