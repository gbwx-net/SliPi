#-----------------------------------
# Name: Motor Driver
#
# Author: justin.zondagh
#
# Created: 06/04/2013
# Copyright: (c) justin.zondagh 2013
#-----------------------------------
#!/usr/bin/env python
 
# Import required libraries
import time
import RPi.GPIO as GPIO
import sys

GPIO.cleanup()
 
# Use BCM GPIO references
# instead of physical pin numbers
GPIO.setmode(GPIO.BCM)
 
# Map Input Args to

Passed = 0

# The pulse width is the total time to execute one pulse - i.e. On and Off
pulseWidth = 0.01


if(bool(sys.argv[1]) and bool(sys.argv[2])):

try:
motorPin = int(sys.argv[1])
runTime = float(sys.argv[2])
powerPercentage = float(sys.argv[3]) / 100
Passed = 1
except:
exit

if Passed:

# Set all pins as output
print "Setup Motor Pin"
GPIO.setup(motorPin,GPIO.OUT)
GPIO.output(motorPin, False)
counter = int(runTime / pulseWidth)

print "Start Motor"

print "Power: " + str(powerPercentage)
onTime = pulseWidth * powerPercentage
offTime = pulseWidth - onTime

while counter > 0:
GPIO.output(motorPin, True)
time.sleep(onTime)
GPIO.output(motorPin, False)
time.sleep(offTime)
counter = counter - 1

print "Stop Motor"
GPIO.output(motorPin, False)


else:
        print "Usage: motor.py GPIO_Pin_Number Seconds_To_Turn Power_Percentage"

GPIO.cleanup()