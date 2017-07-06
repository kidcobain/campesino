# coding=utf-8
import wget
from pyquery import PyQuery as pq

print("---- actualizacion avg ----")
jquery = pq(url="http://www.avg.com/es-ww/download-update")
enlace = jquery('.dc-table td').eq(1).find('a').attr('href')

print(enlace)

# enlace = 'http://www.futurecrew.com/skaven/song_files/mp3/razorback.mp3'
# print(enlace)

out = "C:/Users/kidcobain/Desktop/" #directorio para guardar actualizacion


wget.download(enlace, out)

print('\n listo')