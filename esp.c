#include <ArduinoJson.h>
#include <WiFi.h>
#include <HTTPClient.h>
#include <EEPROM.h>
#include <SoftwareSerial.h>

SoftwareSerial DataSerial(16, 17);
unsigned long prevMillis = 0;
const long interval = 3000;
String arrData[2];
float literCounter = 0.0;
float lastSentCounter = 0.0; // Menyimpan nilai literCounter terakhir yang dikirim
const float literThreshold = 1.0; // Batas keluaran satu liter

unsigned long lastNotificationTime = 0;
const long notificationInterval = 60000; // Interval notifikasi: 1 menit

int model = 0;

const char* ssid = "A5 2017";
const char* password = "bimabima7";
const char* serverUrl = "https://smartwatermeter.my.id";
const char* apiKey = "$2y$10$9LNYsBpLHo.LfNguG4NW3e5J8sfUlzBowWwgYRpOfr.OnA4GDKzCe";

void setup() {
  Serial.begin(9600);
  DataSerial.begin(9600);

  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }

  Serial.println("Connected to WiFi");

  EEPROM.begin(512); // Inisialisasi EEPROM dengan ukuran 512 bytes
  // Baca nilai literCounter terakhir dari EEPROM
  EEPROM.get(0, lastSentCounter);
  EEPROM.end();
}

void loop() {
  unsigned long currMillis = millis();
  if (currMillis - prevMillis >= interval) {
    prevMillis = currMillis;
    String dataa = "";
    while (DataSerial.available() > 0) {
      dataa += char(DataSerial.read());
    }
    dataa.trim();
    if (dataa != "") {
      int index = 0;
      for (int i = 0; i <= dataa.length(); i++) {
        char pemisah = '#';
        if (dataa[i] != pemisah)
          arrData[index] += dataa[i];
        else
          index++;
      }
      if (index == 1) {
        Serial.println(arrData[0]);
        Serial.println(arrData[1]);
        float keluaran = arrData[0].toFloat();
        literCounter += keluaran;

        if (literCounter >= literThreshold && (currMillis - lastNotificationTime >= notificationInterval)) {
          Serial.println("Potensi Kebocoran Terdeteksi");

          // Kirim HTTP request ke server API
          sendHttpRequest();

          lastNotificationTime = currMillis;

          // Simpan nilai literCounter terakhir ke EEPROM
          EEPROM.begin(512);
          EEPROM.put(0, literCounter);
          EEPROM.commit();
          EEPROM.end();
        }
      }
      arrData[0] = "";
      arrData[1] = "";
    }
    DataSerial.println("ya");
  }
}

void sendHttpRequest() {
  WiFiClient client;
  HTTPClient http;

  String url = String(serverUrl) + "/api/log_pemakaian"; // Ganti dengan endpoint yang sesuai di server Anda

  // Mengatur header untuk autentikasi API key
  http.begin(client, url);
  http.addHeader("Authorization", "Bearer " + String(apiKey));
  http.addHeader("Content-Type", "application/json");

  // Membuat payload JSON
  DynamicJsonDocument payload(128);
  payload["pemakaian_air"] = literCounter;

  // Mengirimkan permintaan POST dengan payload JSON
  String payloadString;
  serializeJson(payload, payloadString);
  int httpCode = http.POST(payloadString);
  Serial.println(httpCode);
 
    String response = http.getString();
    Serial.println("HTTP Response: " + response);

  http.end();
}
