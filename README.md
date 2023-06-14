# OpenAI API PHP Client

## Install with composer
### Get composer
https://getcomposer.org/

```bash
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/Artcustomer/api-openai_client"
    }
],
"require": {
  "artcustomer/openai-api-client": "^1.0.0",
}
```

## How to use

Grab your `API key` and `Organisation ID` from OpenAI.

```bash
// Create and initialize the API gateway
$apiGateway = new OpenAIApiGateway('apiKey', 'organisation', true);
$apiGateway->initialize();

// Perform a request
$params = [
    'model' => 'gpt-4',
    'messages' => [
        [
            'role' => 'user',
            'content' => 'Here is my awesome prompt'
        ]
    ],
];
$response = $apiGateway->getChatConnector()->createCompletion($params);

// Interpret the response
if ($response->getStatusCode() === 200) {
  $content = $response->getContent();
  
  // Do something with the content
} else {
  // Status code is not 200, maybe an error occurred
}
```
