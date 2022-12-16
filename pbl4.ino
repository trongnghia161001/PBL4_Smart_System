
#include <Servo.h>

#include <Wire.h> 
#include <LiquidCrystal_I2C.h>
LiquidCrystal_I2C lcd(0x27,16,2);
int x;
int slot;
#define Servo_PWM 6
int led = 13;
Servo MG995_Servo;
void setup() {
  lcd.init();
  lcd.backlight();
   MG995_Servo.attach(6);
    pinMode(led, OUTPUT);   
  Serial.begin(115200);
  Serial.setTimeout(1);
  lcd.setCursor (0,0);
lcd.print(" Khanh Nghia Dat Trang ");
lcd.setCursor (0,1);
lcd.print(" SMART PARKING");
delay (2000);
lcd.clear();  
}

void loop() {
  while (!Serial.available());
  x = Serial.readString().toInt();
  slot = Serial.readString().toInt();
  if(x == 1 && slot != 0 ) {
     MG995_Servo.write(90); 
     lcd.setCursor (0,0);
      lcd.print("    XIN CHAO    ");
      lcd.setCursor (0,1);
      lcd.print("CON LAI: ");
      lcd.print(slot);
      delay (3000);
      MG995_Servo.write(0);
      lcd.clear();
  }
  else if(x == 0  ) {
      lcd.setCursor (0,0);
      lcd.print("   BAN CHUA DANG KY    ");
      lcd.setCursor (0,1);
      lcd.print("HAY DANG KY DE SU DUNG ");
      delay (3000);
      MG995_Servo.write(0);
      lcd.clear();
  }
  else if(x == 1 && slot == 0 ) {
    lcd.setCursor (0,0);
    lcd.print("    XIN LOI    ");  
    lcd.setCursor (0,1);
    lcd.print("  DA HET CHO  "); 
    delay (3000);
    MG995_Servo.write(0);
    lcd.clear();
  }
  else {
     lcd.setCursor (0,0);
    lcd.print("   BUG HERE    ");  
    lcd.setCursor (0,1);
    lcd.print("  TRY FIX IT  "); 
  }
}