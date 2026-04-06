<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My GitHub App</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; padding: 20px; background: #f4f4f9; }
        .card { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #24292e; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #444; }
        ul { list-style: none; padding: 0; margin-top: 20px; }
        li { background: #eee; margin: 5px 0; padding: 10px; border-radius: 4px; display: flex; justify-content: space-between; }
    </style>
</head>
<body>

<div class="card">
    <h2>Link Saver</h2>
    <input type="text" id="linkInput" placeholder="Paste URL here...">
    <button onclick="addLink()">Save Link</button>
    <ul id="linkList"></ul>
</div>

<script>
    // Logic to handle "App" functionality without a PHP server
    const linkList = document.getElementById('linkList');
    const linkInput = document.getElementById('linkInput');

    // Load existing links from LocalStorage (Simulating a database)
    let savedLinks = JSON.parse(localStorage.getItem('myLinks')) || [];
    renderLinks();

    function addLink() {
        const url = linkInput.value;
        if (url) {
            savedLinks.push(url);
            localStorage.setItem('myLinks', JSON.stringify(savedLinks));
            linkInput.value = '';
            renderLinks();
        }
    }

    function renderLinks() {
        linkList.innerHTML = savedLinks.map(link => `
            <li>
                <a href="${link}" target="_blank">${link.substring(0, 30)}...</a>
            </li>
        `).join('');
    }
</script>

</body>
</html>
