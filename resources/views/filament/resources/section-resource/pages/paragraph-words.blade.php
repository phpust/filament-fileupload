<x-filament-panels::page>

        <textarea id="jsonData" name="jsonData" rows="10" cols="50">[
  {
    "transcript": " You're a monster",
    "start_time_ms": 0.82,
    "end_time_ms": 1.8,
    "words": [
      {
        "text": "You're",
        "id":85,
        "type":"word",
        "start": 0.82
      },
      {
        "text": "a",
        "type":"text",
        "start": 1.04
      },
      {
        "text": "monster",
        "id":13,
        "type":"word",
        "start": 1.16
      }
    ]
  }
]</textarea><br>

    <div id="generatedResult">
    <h2>Generated Paragraph:</h2>
    <div id="paragraph"></div>
    </div>

    <script>
        const jsonDataTextarea = document.getElementById('jsonData');
        const paragraphElement = document.getElementById('paragraph');

        // Function to generate paragraph with specific formatting
        function generateParagraph(jsonData) {
            try {
                const data = JSON.parse(jsonData);

                if (Array.isArray(data)) {
                    const paragraphs = data.map(entry => {
                        let paragraph = '';
                        let inWord = false;

                        entry.words.forEach(word => {
                            if (word.type === 'word') {
                                if (inWord) {
                                    paragraph += '</span>';
                                    inWord = false;
                                }
                                paragraph += `<span class="word">${word.text}</span>`;
                            } else {
                                paragraph += word.text;
                            }
                        });

                        if (inWord) {
                            paragraph += '</span>';
                        }

                        return paragraph;
                    });

                    return paragraphs.join('<br>');
                }
            } catch (error) {
                return 'Invalid JSON data. Please enter valid JSON.';
            }
        }

        // Generate paragraph when the page loads
        updateParagraph();

        // Listen for input events on the textarea and update the paragraph
        jsonDataTextarea.addEventListener('input', updateParagraph);

        // Function to update the paragraph based on JSON data
        function updateParagraph() {
            const jsonData = jsonDataTextarea.value;
            const paragraph = generateParagraph(jsonData);
            paragraphElement.innerHTML = paragraph;
        }
    </script>


</x-filament-panels::page>
