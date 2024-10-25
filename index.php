<?php
require 'vendor/autoload.php';

use Elasticsearch\ClientBuilder;

// Connect to Elasticsearch
$client = ClientBuilder::create()
    ->setHosts(['localhost:9200']) // Replace with your Elasticsearch host and port if different
    ->build();

// 1. Indexing a Document (Add a document to an index)
$params = [
    'index' => 'students',
    'type' => 'students',
    'id'    => '1',
    'body'  => [
        'fname' => 'peter',
        'lname' => 'jacob',
        'class' => '8',
        'section' => 'A',
        'in_deleted' => '0',
        
    ]
];

$response = $client->index($params);
echo "Indexed document response: ";
echo '<pre>';print_r($response);

// 2. Searching for a Document (Retrieve documents from an index)
$searchParams = [
    'index' => 'students',
    'type' => 'students',
    'body'  => [
        'query' => [
            'match' => [
                'fname' => 'willson'
            ]
        ]
    ]
];

$searchResponse = $client->search($searchParams);
echo "Search response: ";
echo '<pre>';print_r($searchResponse);
echo '<br>';


// 3. Get the Document by ID
$getParams = [
        'index' => 'students',
        'type' => 'students',
        'id'    => '1'
    ];

    $getResponse = $client->get($getParams);
    echo '<pre>'; print_r($getResponse);
   
   
 // 4. Update the Document
/* $updateParams = [
        'index' => 'students',
        'type' => 'students',
        'id'    => '1',
        'body'  => [
            'doc' => [
                'fname' => 'ALEX'
            ]
        ]
    ];

$updateResponse = $client->update($updateParams);
echo '<pre>'; print_r($updateResponse); */


// 5. Delete the Document
/* try {
    $deleteParams = [
        'index' => 'students',
        'type' => 'students',
        'id'    => '1'
    ];

    $deleteResponse = $client->delete($deleteParams);
   echo '<pre>'; print_r($deleteResponse);

} catch (Exception $e) {
    echo "Delete Error: ", $e->getMessage(), "\n";
} */

   
?>
