#!/usr/bin/python

import fileinput

m=0
m_tuple=''
sourceAddress=''

try:
  f = fileinput.input(files=('source.txt'))
  for line in f:
    sourceAddress = line
  f.close()

except EOFError:
  pass

try:
	while 1:
		VMid, url, ru, r=raw_input().split()
		if url != sourceAddress:
                  t= (float(ru)*float(r))/2
		  if t>m:
			  m=t; m_tuple= VMid, url, ru, r
except EOFError:
	pass

VMid, url, ru, r=m_tuple
print url
