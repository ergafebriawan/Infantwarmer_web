#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <ArduinoJson.h>
#include "DHT.h"

#define DHTPIN 0
#define DHTTYPE DHT22
DHT dht(DHTPIN, DHTTYPE);

String SSID = "Listiani Bakery"; //name wifi
String password = "113333555555"; //password wifi

HTTPClient http;
String URLget = "http://192.168.0.6/infantwarmer_web/api/Device?id_device=";
String URLput = "http://192.168.0.6/infantwarmer_web/api/getSensorData";
String ID_Device = "4"; // id device from web
const char *host = "192.169.0.6"; // IP your Laptop/pc
int dataSensor1; //data sesnsor Suhu
int dataSensor2; //data sesnor detakjantung
const char* namaDevice; // name device from web
int kipas; //value off kipas

void setup() {
  Serial.begin(115200);
  pinMode(LED_BUILTIN, OUTPUT);     // Initialize the LED_BUILTIN pin as an output
  WiFi.mode(WIFI_STA);
  WiFi.begin(SSID, password);
  dht.begin();
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting..");
  }
}

// the loop function runs over and over again forever
void loop() {
  if (WiFi.status() == WL_CONNECTED) {

    //read data from web

    http.begin(URLget+ID_Device);
    int httpCode = http.GET();

    if (httpCode > 0) {
      char json[500];
      String payload = http.getString();
      payload.toCharArray(json, 500);
      StaticJsonDocument<200> doc;
      deserializeJson(doc, json);

      namaDevice = doc["nama_device"];
      kipas = doc["kipas"];

      Serial.print("nama device: ");
      Serial.println(namaDevice);
      Serial.print("status kipas: ");
      Serial.println(kipas);

      if (kipas == 0) {
        digitalWrite(LED_BUILTIN, LOW);
      } else {
        digitalWrite(LED_BUILTIN, HIGH);
      }
      //Serial.println(payload);
    }
    http.end();

    //read data from sensor
    float t = dht.readTemperature();
    float h = dht.readHumidity();

    //sendata from sensor
    Serial.print("connecting to ");
    Serial.println(host);
    WiFiClient client;
    const int httpPort = 80;
    if (!client.connect(host, httpPort)) {
      Serial.println("connection failed");
      return;
    }

    URLput = URLput+"?id_device="+ID_Device
          +"&nama_device="+namaDevice
          +"&detak_jantung="+h
          +"&suhu="+t
          +"&kipas="+kipas;

    Serial.print("Requesting URL: ");
    Serial.println(URLput);

    client.print(String("GET ") + URLput + " HTTP/1.1\r\n" +
                 "Host: " + host + "\r\n" +
                 "Connection: close\r\n\r\n");
    unsigned long timeout = millis();
    while (client.available() == 0) {
      if (millis() - timeout > 1000) {
        Serial.println(">>> Client Timeout !");
        client.stop();
        return;
      }
    }

    // Read all the lines of the reply from server and print them to Serial
    while (client.available()) {
      String line = client.readStringUntil('\r');
      Serial.print(line);
    }

    Serial.println();
    Serial.println("closing connection");
    
  } else {
    Serial.println("not connect WiFi....");
  }
  delay(1000);
}
