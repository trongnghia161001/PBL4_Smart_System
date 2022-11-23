#include <Servo.h> 
Servo myServo; 
int potPin = 0; 
int val; 
int toneVal; 
float sinVal;
const int trigPin = 5; // chân trig của HC-SR04
const int echoPin = 6; // chân echo của HC-SR04
void setup(){
  myServo.attach(3);
  Serial.begin(9600);
  pinMode(8, OUTPUT);
 pinMode(trigPin, OUTPUT); // chân trig sẽ phát tín hiệu
  pinMode(echoPin, INPUT); // chân echo sẽ nhận tín hiệu
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
  Serial.print("Distance Measured = ");
  Serial.print(distance);
  Serial.println("cm");  
    if  (distance < 5) 
    {
      myServo.write(125); 
    } 
    else {
     myServo.write(35);
    }
    delay(15);
}
void piezoSound() { 
    for (int i = 0; i < 180; i++) {
      sinVal = sin(i*3.1412/180); 
      toneVal = int(sinVal*1000)+2000; 
      tone(8, toneVal);
    }
}
