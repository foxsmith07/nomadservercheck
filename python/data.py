#!/usr/bin/python3

import os
import os.path
import time
import colorama
from colorama import Fore, Style
import paramiko
import sys
from subprocess import *
import subprocess as sp
from geopy.geocoders import Nominatim
import traceback

import mysql.connector


""" COLOR
print(Fore.BLACK + 'BLACK')
print(Fore.BLUE + 'BLUE')
print(Fore.CYAN + 'CYAN')
print(Fore.GREEN + 'GREEN')
print(Fore.LIGHTBLACK_EX + 'LIGHTBLACK_EX')
print(Fore.LIGHTBLUE_EX + 'LIGHTBLUE_EX')
print(Fore.LIGHTCYAN_EX + 'LIGHTCYAN_EX')
print(Fore.LIGHTGREEN_EX + 'LIGHTGREEN_EX')
print(Fore.LIGHTMAGENTA_EX + 'LIGHTMAGENTA_EX')
print(Fore.LIGHTRED_EX + 'LIGHTRED_EX')
print(Fore.LIGHTWHITE_EX + 'LIGHTWHITE_EX')
print(Fore.LIGHTYELLOW_EX + 'LIGHTYELLOW_EX')
print(Fore.MAGENTA + 'MAGENTA')
print(Fore.RED + 'RED')
print(Fore.RESET + 'RESET')
print(Fore.WHITE + 'WHITE')
print(Fore.YELLOW + 'YELLOW')

"""

os.system('clear')

###############
# MENU
###############
def menu():
    print('\nQuale dati vorresti ottenere?\n\n')
    print('1  -> obn validate\n')
    print('2  -> marcli status\n')

    choose=input('inserisci il numero corrispondete all\'azione da te scelta -->  ')
    def checkSim():
        print('check sim...')

    if choose == '1':
        print('\nhai scelto 1')
        checkObn()

    elif choose == '2':
        print('\nhai scelto 2')
        checkSim()

    else:
        print('\ndevi scegliere o 1 o 2')

################
# OBN VALIDATE
################

def checkObn():
    Trains=['32','37','38','45','52']

    os.system('clear')

    train=input('\n enter train?  ')

    print('\n\n--- TRAIN '+train+' ---------\n\n')

    if train in Trains:
        ping = os.system('ping 10.226.'+str(train)+'.1 -c 3 >> /dev/null')

        if ping == 0:
            # osSistema=os.system('ssh -o StrictHostKeyChecking=no developer@10.226.'+train+'.1 sudo obn validate')
            spGetoutput=sp.getoutput("ssh -o StrictHostKeyChecking=no developer@10.226."+train+".1 sudo obn validate")
            print('SP OBN VALLIDATE: \n'+spGetoutput)
        else:
            print('non è raggiungibile')
    else:
        print('devi inserire uno dei treni con il nuovo IOB solution')


def checkSim():
    print('check sim...')



menu()
