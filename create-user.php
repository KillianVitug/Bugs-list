<?php
$client = new Client();
$headers = [
  'Authorization' => '{{o3FVpe4HUuqb2fLdZl2jEf7V4UYMiBkj}}',
  'Content-Type' => 'application/json'
];
$body = '{
  "username": "Killian Vitug",
  "password": "18-1346-953",
  "real_name": "Killian Jarel Vitug",
  "email": "vitug.killianjarel@auf.edu.ph",
  "access_level": {
    "name": "updater"
  },
  "enabled": false,
  "protected": false
}';
$request = new Request('POST', 'https://ipt10-2022.mantishub.io/api/rest/users/', $headers, $body);
$res = $client->sendAsync($request)->wait();
echo $res->getBody();
