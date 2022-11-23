
#include <Wire.h> 
#include <LiquidCrystal_I2C.h>
LiquidCrystal_I2C lcd(0x27,16,2);
#include <Servo.h> 

Servo myservo1;

int IR1 = 2;
int IR2 = 4;
const int trigPin = 5; // chân trig của HC-SR04
const int echoPin = 6; // chân echo của HC-SR04
int Slot = 5;

int flag1 = 0;
int flag2 = 0;

void setup() {
    pinMode(trigPin, OUTPUT); // chân trig sẽ phát tín hiệu
  pinMode(echoPin, INPUT); // chân echo sẽ nhận tín hiệu
  lcd.begin();
  lcd.backlight();

myservo1.attach(3);
myservo1.write(100);

lcd.setCursor (0,0);
lcd.print("     NHOM 10    ");
lcd.setCursor (0,1);
lcd.print(" PARKING SYSTEM ");
delay (2000);
lcd.clear();  
}

void loop(){ 
  unsigned long duration; // biến đo thời gian
  int distance;           // biến lưu khoảng cách

  digitalWrite(trigPin, LOW); // tắt chân trig
  delayMicroseconds(2);
  digitalWrite(trigPin, HIGH); // phát xung từ chân trig
  delayMicroseconds(10); // xung có độ dài 10 microSeconds
  digitalWrite(trigPin, LOW); // tắt chân trig

  /* Tính toán thời gian */
  // Đo độ rộng xung HIGH ở chân echo. 
  duration = pulseIn(echoPin, HIGH);

  // Tính khoảng cách đến vật.
  distance = duration * 0.034 / 2;

  /* In kết quả ra Serial Monitor */
  Serial.print("Distance Measured = ");
  Serial.print(distance);
if(distance <20 && flag1==0){
if(Slot>0){flag1=1;
if(flag2==0){myservo1.write(35); Slot = Slot-1;}
}else{
lcd.setCursor (0,0);
lcd.print("    XIN LOI    ");  
lcd.setCursor (0,1);
lcd.print("  DA HET CHO  "); 
delay (3000);
lcd.clear(); 
}
}

if(distance <20  && flag2==0)
{flag2=1;
if(flag1==0){myservo1.write(35); Slot = Slot+1;}
}

if(flag1==1 && flag2==1){
delay (1000);
myservo1.write(125);
flag1=0, flag2=0;
}

lcd.setCursor (0,0);
lcd.print("    XIN CHAO    ");
lcd.setCursor (0,1);
lcd.print("CON LAI: ");
lcd.print(Slot);
}
