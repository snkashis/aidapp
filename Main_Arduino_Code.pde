/*
SNK Main Arduino Code
FMP 2010
*/

//PhotoResistor Pin
int TempPin = 0;
int forcePin1 = 1;
int forcePin2 = 2;    // the pin the FSR is attached to

//LadyAda
int inPin = 2;         // the number of the input pin
int outPin = 13;       // the number of the output pin

int LEDstate = HIGH;      // the current state of the output pin
int reading;           // the current reading from the input pin
int previous = LOW;    // the previous reading from the input pin

// the follow variables are long's because the time, measured in miliseconds,
// will quickly become a bigger number than can be stored in an int.
long time = 0;         // the last time the output pin was toggled
long debounce = 50;   // the debounce time, increase if the output flickers

//LadyAda end




void setup() {
Serial.begin(9600); // Begin Serial Communication with computer
pinMode(inPin, INPUT);
digitalWrite(inPin, HIGH);   // turn on the built in pull-up resistor
pinMode(outPin, OUTPUT);  

}


void loop() {
//Tilt Sensor
int switchstate;
  
  reading = digitalRead(inPin);
  
  // If the switch changed, due to bounce or pressing...
  if (reading != previous) {
    // reset the debouncing timer
    time = millis();
  } 
    
  if ((millis() - time) > debounce) {
     // whatever the switch is at, its been there for a long time
     // so lets settle on it!
     switchstate = reading;

     // Now invert the output on the pin13 LED
    if (switchstate == HIGH)
      LEDstate = LOW;
    else
      LEDstate = HIGH;
  }
  digitalWrite(outPin, LEDstate);

  // Save the last reading so we keep a running tally
  previous = reading;






  
  
//Force Sensors
int Force1 = analogRead(forcePin1) / 4; //the voltage on the pin divded by 4 (to scale from 10 bits (0-1024) to 8 (0-255)  
int Force2 = analogRead(forcePin2) / 4; //the voltage on the pin divded by 4 (to scale from 10 bits (0-1024) to 8 (0-255)

//Temp Sensor
int reading = analogRead(TempPin);  

// converting that reading to voltage, for 3.3v arduino use 3.3
float TempVoltage = reading * 5.0 / 1024; 

// print out the voltage
//Serial.print(TempVoltage); Serial.println(" volts");
 
// now print out the temperature
//float temperatureC = (TempVoltage - 0.5) * 100 ;  //converting from 10 mv per degree wit 500 mV offset
                                               //to degrees ((volatge - 500mV) times 100)
//Serial.print(temperatureC); Serial.println(" degress C");
 
// now convert to Fahrenheight
//float temperatureF = (temperatureC * 9 / 5) + 32;
//Serial.print(temperatureF); Serial.println(" degress F");



//Serial Output
if (Serial.available() > 0) {
Serial.read();
Serial.print(switchstate,DEC);
Serial.print(',', BYTE);
Serial.print(Force1,DEC);
Serial.print(',',BYTE);
Serial.print(Force2,DEC);
Serial.print(',',BYTE);
Serial.print(TempVoltage,DEC);
Serial.print('*', BYTE);
delay(1000);
}

//Debug Printing
/*
Serial.print("Tilt detect is");
Serial.println(switchstate);
Serial.print("Force 1 is") ;
Serial.println(Force1);
Serial.print("Force 2 is");
Serial.println(Force2);
Serial.print("Temp Voltage is ") ;
Serial.println(TempVoltage);
delay(1000);
*/

/* Conditional 
if (lightLevel > 200) {
Serial.println('x');
}
*/
}
