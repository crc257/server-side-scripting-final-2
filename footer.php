<?php
use GuzzleHttp\Client;

// Call Genrenator API to get a random genre
$genre = "experimental fusion"; // Default fallback
try {
    $client = new Client();
    $response = $client->request('GET', 'https://binaryjazz.us/wp-json/genrenator/v1/genre/');
    
    if ($response->getStatusCode() == 200) {
        $genre = $response->getBody()->getContents();
        // Remove quotes if present
        $genre = trim($genre, '"');
    }
} catch (Exception $e) {
    // If API call fails, use the default genre
    if (isset($logger)) {
        $logger->warning("Genrenator API call failed: " . $e->getMessage());
    }
}
?>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
        <p><em>Starting a band and not sure what kind of music to play? Try <?php echo h($genre); ?>!</em></p>
    </footer>
</body>
</html>