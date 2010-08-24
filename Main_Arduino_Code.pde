/*
SNK Main Arduino Code
FMP 2010
*/

//PhotoResistor Pin
int TempPin = 0;
int forcePin1 = 1;
int forcePin2 = 2;    // the pin the FSR is attached to
int TiltPin = 4;
     


const int knockSensor = 3;  // the piezo is connected to analog pin 3
const int threshold = 500;  // threshold value to decide when the detected sound is a knock or not
const int knockSensor2 = 5;

// these variables will change:
int sensorReading = 0;      // variable to store the value read from the sensor pin
int ShakeReading = 0;

int sensorReading2 = 0;      // variable to store the value read from the sensor pin
int ShakeReading2 = 0;




void setup() {
Serial.begin(9600); // Begin Serial Communication with computer
}


void loop() {



//Shake Sensor = piezo
sensorReading = analogRead(knockSensor); 

if (sensorReading >= threshold) {
    ShakeReading = 1;     
    //Serial.println("Knock!");         
  }
else {
  ShakeReading = 0;
}  


sensorReading2 = analogRead(knockSensor2); 

if (sensorReading2 >= threshold) {
    ShakeReading2 = 1;     
    //Serial.println("Knock!");         
  }
else {
  ShakeReading2 = 0;
}  
                                           
// Tilt (Chin) Sensor = light            
int TiltReading = analogRead(TiltPin);

                                        
 TiltReading = map(TiltReading, 0, 900, 0, 255); 
         //adjust the value 0 to 900 to
         //span 0 to 255



 TiltReading = constrain(TiltReading, 0, 255);//make sure the 
                                           //value is betwween 
                                           //0 and 255
                                           
  
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
Serial.print(TiltReading,DEC);
Serial.print(',', BYTE);
Serial.print(Force1,DEC);
Serial.print(',',BYTE);
Serial.print(Force2,DEC);
Serial.print(',',BYTE);
Serial.print(TempVoltage,DEC);
Serial.print(',',BYTE);
Serial.print(ShakeReading,DEC);
Serial.print(',',BYTE);
Serial.print(ShakeReading2,DEC);
Serial.print('*', BYTE);
delay(1000);
}

//delay(500);
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
Serial.println(ShakeReading);
delay(1000);
*/

/* Conditional 
if (lightLevel > 200) {
Serial.println('x');
}
*/
}
