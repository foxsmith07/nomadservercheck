import os
import sys
from subprocess import *
import subprocess as sp

os.system('clear')

def validate():
    Trains=['32','37','38']

    for train in Trains:
        ping = os.system('ping 10.226.'+str(train)+'.1 -c 3 >> /dev/null')

        if ping == 0:
            # osSistema=os.system('ssh -o StrictHostKeyChecking=no developer@10.226.'+train+'.1 sudo obn validate')
            output=sp.getoutput("ssh -o StrictHostKeyChecking=no developer@10.226."+train+".1 sudo obn validate")
            print('Train:'+train+ '\n'+output)
        else:
            print('non è raggiungibile')

validate()