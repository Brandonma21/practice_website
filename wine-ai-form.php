<?php include 'header.php'; ?>

<body class="ai-page">
    <div class="wrapper">
        <section id="ai-recommendation">
            <h2>Ask AI for a Wine Recommendation</h2>
            <p>Tell us what you're looking for, and let our AI suggest the perfect wine for you!</p>
            
            <textarea id="customerInput" placeholder="Enter the wine name you're interested in (e.g., Cabernet Sauvignon)"></textarea>
            <button onclick="getWineDescription()">Get Wine Description</button>
            <div id="descriptionResult"></div>
        </section>
    </div>

<?php include 'footer.php'; ?>
<script src="script.js"></script>
