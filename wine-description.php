<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_input = $_POST['customer_input'];

    
    $api_key = "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";

    if (!$api_key) {
        echo "Error: OpenAI API key is missing or invalid.";
        exit;
    }

    
    $url = 'https://api.openai.com/v1/chat/completions';
    $headers = [
        "Authorization: Bearer $api_key",
        "Content-Type: application/json"
    ];

   
    $data = [
        'model' => 'gpt-3.5-turbo',
        'messages' => [
            ['role' => 'system', 'content' => 'You are an AI assistant that recommends wines based on customer descriptions.'],
            ['role' => 'user', 'content' => $customer_input],
        ],
        'max_tokens' => 150
    ];

    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    
    $retries = 3;
    $delay = 5; 

    while ($retries > 0) {
        
        $response = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        
        if (curl_errno($ch)) {
            echo 'cURL Error: ' . curl_error($ch);
            break;
        }

        
        if ($http_status !== 200) {
            echo "Error: Received HTTP status code $http_status. Response: $response";
        }

        
        if ($http_status == 429) {
            echo "Rate limit exceeded. Retrying in $delay seconds...";
            sleep($delay);  
            $retries--;
            continue;  
        }

        
        if ($http_status == 200) {
            $response_data = json_decode($response, true);

            
            if (isset($response_data['choices'][0]['message']['content'])) {
                echo $response_data['choices'][0]['message']['content'];
                break;  
            } else {
                echo "Error: No content in the response.";
                break;
            }
        } else {
            
            echo "Error: Received HTTP status code $http_status. Please try again later.";
            break;
        }
    }

    
    curl_close($ch);
}
?>
