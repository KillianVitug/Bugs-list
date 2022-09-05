<?php
include "vendor/autoload.php";
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
define('TOKEN', 'o3FVpe4HUuqb2fLdZl2jEf7V4UYMiBkj');
define('MANTISHUB_URL', 'https://ipt10-2022.mantishub.io');


$client = new Client();
$headers = [
  'Authorization' => TOKEN
];
$request = new Request('GET', MANTISHUB_URL. '/api/rest/issues?page_size=10&page=1', $headers);
$res = $client->sendAsync($request)->wait();
$bugs = $res->getBody()->getContents();
$bugs_list = json_decode($bugs);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
<body>

<h1>IPT10 Bugs List</h1>
<h2>Killian Jarel C. Vitug</h2>

<table class="table table-bordered">
<thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Summary</th>
      <th scope="col">Severity</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($bugs_list->issues as $bug)
{
	echo '<tr>' . '<th>'. $bug->id . '</th>' .
  '<td>'. $bug->summary . '</td>' . 
  '<td>'. $bug->severity->name .'</td>' .
  '<td>'. $bug->status->name . '</td>' . '</tr>';
}
?>
  </tbody>
</table>

</body>
</html>

