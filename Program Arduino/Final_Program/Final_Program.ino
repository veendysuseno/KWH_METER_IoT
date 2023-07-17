#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
const char* ssid = "KelasRobot.com";
const char* password = "k3l4sr0b0t";
String url = "http://192.168.0.102/kwhmeter/api/create.php";

#include <PZEM004Tv30.h>
PZEM004Tv30 pzem(D3, D4); //D3 //D4

const unsigned long jeda = 1000;
unsigned long zero  = 0;

void setup() {
  Serial.begin(115200);

  WiFi.begin(ssid, password);
  Serial.print("Connecting to WiFi");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500); Serial.print(".");
  }
  Serial.print("OK! IP=");
  Serial.println(WiFi.localIP());
}

void loop() {

  float voltage = pzem.voltage();
  if ( !isnan(voltage) ) {
    Serial.print("Voltage: "); Serial.print(voltage); Serial.println("V");
  } else {
    Serial.println("Error reading voltage");
  }
  float current = pzem.current();
  if ( !isnan(current) ) {
    Serial.print("Current: "); Serial.print(current); Serial.println("A");
  } else {
    Serial.println("Error reading current");
  }
  float power = pzem.power();
  if ( !isnan(power) ) {
    Serial.print("Power: "); Serial.print(power); Serial.println("W");
  } else {
    Serial.println("Error reading power");
  }
  float energy = pzem.energy();
  if ( !isnan(energy) ) {
    Serial.print("Energy: "); Serial.print(energy); Serial.println("kWh");
  } else {
    Serial.println("Error reading energy");
  }
  float frequency = pzem.frequency();
  if ( !isnan(frequency) ) {
    Serial.print("Frequency: "); Serial.print(frequency, 1); Serial.println("Hz");
  } else {
    Serial.println("Error reading frequency");
  }
  float pf = pzem.pf();
  if ( !isnan(pf) ) {
    Serial.print("PF: "); Serial.println(pf);
  } else {
    Serial.println("Error reading power factor");
  }
  Serial.println();

  if (millis() - zero >= jeda) {
    HTTPClient http;
    http.begin(url);
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");
    String httpRequestData = String() + "voltage=" + voltage + "&current=" + current +
                             "&power=" + power + "&energy=" + energy +
                             "&freq=" + frequency + "&pf=" + pf;
    int httpResponseCode = http.POST(httpRequestData);
    if (httpResponseCode > 0) {
      Serial.print("HTTP ");
      Serial.println(httpResponseCode);
      String payload = http.getString();
      Serial.println();
      Serial.println(payload);
    }
    else {
      Serial.print("Error code: ");
      Serial.println(httpResponseCode);
      Serial.println(":-(");
    }
    zero = millis();
  }

}
