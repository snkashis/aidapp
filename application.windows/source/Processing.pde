import de.bezier.data.sql.*;

import processing.serial.*;

import krister.Ess.*;

AudioInput myinput;
int bufferSize=512;
FFT myFFT;
int AudioTest = 0;

Serial myPort;                    // The serial port
MySQL msql;

PFont fontA;     // The display font
String inString;  // Input string from serial port: 
float a,b,c,d,e,f;
String SQL_STRING;

int LastTilt, LastForce1, LastForce2, LastTemp, TempValue, LastAudio, LastShake, LastShake2 = 0;
int conv_Tilt, conv_Force1, conv_Force2, conv_Temp, conv_Audio, conv_Shake, conv_Shake2 = 0 ;
boolean UpdateTilt, UpdateForce1, UpdateForce2, UpdateTemp, UpdateAudio, UpdateShake = false;


void setup() {
  Ess.start(this);
  myinput=new AudioInput(bufferSize);

  myinput.start();
  myFFT=new FFT();
  
  // start the sound looping forever
  myFFT.damp(.3);
  myFFT.equalizer(true);
  myFFT.limits(.005,.05);
  // List all the available serial ports: 
  println(Serial.list()); 
  myPort = new Serial(this, Serial.list()[0], 9600); 
    size(500, 200); 
    
    String user     = "user";
    String pass     = "password";
    String database = "Arduino";
    msql = new MySQL( this, "localhost", "Arduino", "user", "password" );

    
}

void draw () {
background(0); 
  myPort.write(65);
  text("received: " + inString, 10,50); 
if (SQL_STRING != null)
{
  text(SQL_STRING, 30,100);
}
}

void serialEvent(Serial myPort) { 
  inString = myPort.readStringUntil('*'); 
  if (inString != null) {
    println("Receiving: " + inString);
    float[] vals = float(splitTokens(inString,",*"));
    a = vals[0];
    b = vals[1];
    c = vals[2];
    d = vals[3];
    e = vals[4];
    f = vals[5];
    
    //DEBUG PRINTING
    println("TILT STATE is" + a);
    println("FORCE 1 is" + b);
    println("FORCE 2 is" + c);
    println("TEMP VOLTS is" + d);
    println("SHAKE VAL is " + e);
    println("SHAKE VAL is " + f);
    // CONVERT TO STATES
    if (a < 200) {
    conv_Tilt = 1;
    }
    else
    {
    conv_Tilt = 0;
    }
    
    if (b > 0) {
    conv_Force1 = 1;
    }
    else
    {
    conv_Force1 = 0;
    }
    
    if (c > 0) {
    conv_Force2 = 1;
    }
    else {
    conv_Force2 = 0;
    }
    
    if (d >= 0.79) {
      conv_Temp = 1;
    }
    else {
      conv_Temp = 0;
    }
    
   
    if (AudioTest >= 1) {
      conv_Audio = 1;
    }
    else {
      conv_Audio = 0;
    }
    
    ///DONT FORGET BELOW IF
    if (e == 1 || f == 1)  {
    //if (e == 1)  {
      conv_Shake = 1;
    }
    else {
      conv_Shake = 0;
    }
    
    
    
    //Evaluate
    if (LastTilt != conv_Tilt) {
      UpdateTilt = true;
      LastTilt = conv_Tilt;
    }
    
    if (LastForce1 != conv_Force1) {
      UpdateForce1 = true;
      LastForce1 = conv_Force1;
    }
    
    if (LastForce2 != conv_Force2) {
      UpdateForce2 = true;
      LastForce2 = conv_Force2;
    }
    
    if (LastTemp != conv_Temp) {
        UpdateTemp = true; //set flag
        LastTemp = conv_Temp;
    }
    
    if (LastAudio != conv_Audio) {
        UpdateAudio = true; //set flag
        LastAudio = conv_Audio;
    }
    
    if (LastShake != conv_Shake) {
        UpdateShake = true; //set flag
        LastShake = conv_Shake;
    }


//MySQL Transactions
if (UpdateTilt == true) {
SQL_Execute("tilt", conv_Tilt);  
UpdateTilt = false;
}


if (UpdateForce1 == true) {
SQL_Execute("force1", conv_Force1);
      UpdateForce1 = false;
}

if (UpdateForce2 == true) {
SQL_Execute("force2", conv_Force2);

    UpdateForce2 = false;  
}

if (UpdateTemp == true) {
SQL_Execute("temp", conv_Temp);
UpdateTemp = false;
}

if (UpdateAudio == true) {
SQL_Execute("audio", conv_Audio);
UpdateAudio = false;
}

if (UpdateShake == true) {
SQL_Execute("shake", conv_Shake);
UpdateShake = false;
}
        
  }}




void SQL_Execute(String column, int value) {


    if ( msql.connect() )
    {
        msql.execute("UPDATE Couple SET " + column + "=" + value + " WHERE id='guest'");
        //print(msql.result);
        SQL_STRING = "LAST: MySQL transaction success for column " + column + " for guest id";
        println(SQL_STRING);
    }
    else
    {
      println("fail");       

        // connection failed !
    }
}

public void audioInputData(AudioInput theInput) {

  AudioTest = (int)(myFFT.getLevel(myinput)*255);
  delay(250);
  println(AudioTest);
  
}

    
public void stop() {
  Ess.stop();
  super.stop();
}

