#include <ESP8266HTTPClient.h>
#include <ESP8266WiFi.h>
#include <MFRC522.h>
#include <SPI.h>

//Network SSID
const char* ssid = "Nan4you";
const char* password = "dwikrisnandi19";

//pengenal host (server) = IP Address komputer server
const char* host = "192.168.45.137";

#define LED_PIN D8
#define BTN_PIN D1

#define SDA_PIN D4
#define RST_PIN D3

MFRC522 mfrc522(SDA_PIN, RST_PIN);

void setup() {
   Serial.begin(115200);

  //setting koneksi wifi 
  WiFi.hostname("NodeMCU");
  WiFi.begin(ssid, password);

  //cek koneksi wifi
  while(WiFi.status() !=WL_CONNECTED)
  {
    //progress sedang mencari wifi
    delay(500);
    Serial.println(".");
  }

  Serial.println("Wifi Connected");
  Serial.println("IP Address : ");
  Serial.println(WiFi.localIP());

  pinMode(LED_PIN, OUTPUT);
  pinMode(BTN_PIN, OUTPUT);

  SPI.begin();
  mfrc522.PCD_Init();
  Serial.println("Dekatkan Kartu RFID Anda ke Reader");
  Serial.println();
}

void loop() {
  WiFiClient client ;
  if(digitalRead(BTN_PIN)==1)
  {
  digitalWrite(LED_PIN, HIGH);
  while(digitalRead(BTN_PIN)==1) ;
  String getData, Link ;
  HTTPClient http ;

  Link ="http://192.168.45.137/TubesIoT/ubahmode.php";
  http.begin(client, Link);

  int httpCode = http.GET();
  String payload = http.getString();
  http.end();
  
}
digitalWrite(LED_PIN, LOW);

if(! mfrc522.PICC_IsNewCardPresent())
  return ;

if(! mfrc522.PICC_ReadCardSerial())
  return ;

String IDTAG = "";
for(byte i=0; i<mfrc522.uid.size; i++)
{
  IDTAG += mfrc522.uid.uidByte[i];
}

digitalWrite(LED_PIN, HIGH);


const int httpPort = 80;
if(!client.connect(host, httpPort))
{
  Serial.println("Connection Failed");
  return;
}

String Link;
HTTPClient http ;
Link ="http://192.168.45.137/TubesIoT/kirimkartu.php?nokartu=" + IDTAG;
http.begin(client, Link);

int httpCode = http.GET();
String payload = http.getString();
Serial.println(payload);
http.end();

delay(1000);
}
