<?php

namespace Ivan\Lan;

class Model
{
    protected string $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }
    protected function queryApi (string $token, string $secondPart, string $parameters=''): array
    {
        $baseUrl = 'https://openapi.e.lanbook.com/';

        $url = $baseUrl . $secondPart . $parameters;
        $authorization = "x-auth-token: " . $token;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        $streamVerboseHandle = fopen('php://temp', 'w+');
        curl_setopt($ch, CURLOPT_STDERR, $streamVerboseHandle);
        $result = curl_exec($ch);
        curl_close($ch);
        if ($result === FALSE) {
            printf("cUrl error (#%d): %s<br>\n",
                curl_errno($ch),
                htmlspecialchars(curl_error($ch)));


            rewind($streamVerboseHandle);
            $verboseLog = stream_get_contents($streamVerboseHandle);

            echo "cUrl verbose information:\n",
            "<pre>", htmlspecialchars($verboseLog), "</pre>\n";
        }

        return json_decode($result)->data;
    }
}