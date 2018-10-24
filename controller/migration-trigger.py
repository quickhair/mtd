#!/usr/bin/python

import os
import subprocess
import fileinput

print "Listening for attacks"

try:
        while 1:
                while os.path.exists('/update/attacker-ip.txt'):
                        f = fileinput.input(files=('/update/attacker-ip.txt'))
                        for line in f:
                                con, ip = line.split()
                                if int(con) > 10:
                                        print ('replace me with migration script')
                                        subprocess.call("bash /root/triggeredScript.sh", shell=True)
                                        os.remove('/update/attacker-ip.txt')
                        f.close()

except EOFError:
        pass
#try:
#       print con
#       if int(con) > 10:
#               print ('Replace me with migration script')
#
#except EOFError:
#       pass
