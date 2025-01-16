<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Speech to Text Example</title>
</head>
<body>
<div id="demo">
<h2>Speech to Text Example</h2>
<button id="start-record">Start Recording</button>
<p id="status">Click the button and start speaking...</p>
<form action="process_speech.php" method="POST">
    <textarea id="speech-to-text" name="speechText" rows="5" cols="50"></textarea><br>
    <button type="submit">Submit</button>
</form>

<script>
    const startRecordButton = document.getElementById('start-record');
    const speechText = document.getElementById('speech-to-text');
    const status = document.getElementById('status');

    // Check if the browser supports the Web Speech API
    if (!('webkitSpeechRecognition' in window)) {
        status.innerText = "Sorry, your browser doesn't support speech recognition.";
    } else {
        const recognition = new webkitSpeechRecognition();
        recognition.lang = 'en-US';  // Set the language
        recognition.interimResults = false; // Final results only
        recognition.maxAlternatives = 1;

        // When the user clicks the button, start speech recognition
        startRecordButton.addEventListener('click', () => {
            recognition.start();
            status.innerText = 'Listening...';
        });

        // Capture the result when the user stops speaking
        recognition.onresult = (event) => {
            const transcript = event.results[0][0].transcript;
            speechText.value = transcript;  // Set the transcript in the textarea
            status.innerText = 'Speech captured!';
        };

        // Handle recognition errors
        recognition.onerror = (event) => {
            status.innerText = 'Error occurred during speech recognition: ' + event.error;
        };

        // Stop recognition when speech ends
        recognition.onspeechend = () => {
            recognition.stop();
            status.innerText = 'Speech stopped. You can now submit.';
        };
    }
</script>
</div>
</body>
</html>
