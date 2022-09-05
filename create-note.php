<?php
$client = new Client();
$headers = [
  'Authorization' => '{{o3FVpe4HUuqb2fLdZl2jEf7V4UYMiBkj}}',
  'Content-Type' => 'application/json'
];
$body = '{
  "email": "killianjarelvitug@yahoo.com",
  "view_state": {
    "name": "public"
  }
}';
$request = new Request('POST', '{{url}}/api/rest/issues/[ISSUE_NUMBER]/notes', $headers, $body);
$res = $client->sendAsync($request)->wait();
echo $res->getBody();
