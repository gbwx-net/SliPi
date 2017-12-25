import wiringpi  #get wiringpi-python

from time import sleep 

io = wiringpi.GPIO(wiringpi.GPIO.WPI_MODE_SYS) 
triggerpin = 18 #set my pins
motorpin = 23

io.pinMode(triggerpin,io.OUTPUT) 
io.pinMode(motorpin,io.OUTPUT)

wiringpi.pinMode(triggerpin,1)
wiringpi.pinMode(motorpin,1)

exposure = input('exposure time: ') # pick exposure, interval and number of shots
interval = input('interval: ')

shots = input('number of shots: ')

motor = 72.8/shots

print 'begin'

while shots != 0:  # loop through actions until complete
    io.digitalWrite(triggerpin,io.HIGH)
    sleep(exposure) 
    io.digitalWrite(triggerpin,io.LOW)
    sleep(0.5)
    io.digitalWrite(motorpin,io.HIGH)
    sleep(motor)
    io.digitalWrite(motorpin,io.LOW)
    sleep(interval)
    shots = shots-1
    print shots