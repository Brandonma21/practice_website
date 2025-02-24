<?php
// Define wine data
$wines = [
    "Chardonnay" => [
        "image" => "chardonnay.jpg",
        "origin" => "Burgundy, France",
        "history" => "Known for producing both fresh, mineral wines and rich, full-bodied styles.",
        "regions" => "Burgundy, Napa Valley, and Australia",
        "harvesting" => "Grapes are harvested early to preserve their fresh fruit character.",
        "fermentation" => "Often fermented in oak barrels for added complexity.",
        "malolactic" => "Some undergo malolactic fermentation for a buttery texture.",
        "aging" => "Aged in oak barrels for flavors of vanilla and toast, or stainless steel for freshness.",
        "taste" => "Rich and full-bodied with flavors of apple, pear, citrus, and tropical fruits.",
        "aroma" => "Aromas of peach, apple, and melon, with hints of vanilla and toast from oak aging."
    ],
    "Cabernet Sauvignon" => [
        "image" => "cabernet.jpg",
        "origin" => "Bordeaux, France",
        "history" => "A bold red wine with firm tannins, often blended for complexity.",
        "regions" => "Bordeaux, Napa Valley, Chile, and Australia",
        "harvesting" => "Grapes are picked late for full ripeness and rich tannins.",
        "fermentation" => "Fermented in stainless steel, then aged in oak barrels.",
        "malolactic" => "Always undergoes malolactic fermentation for smoothness.",
        "aging" => "Aged in French or American oak for a rich, complex flavor.",
        "taste" => "Bold with blackcurrant, plum, cedar, and spice notes.",
        "aroma" => "Aromas of black cherry, tobacco, and vanilla."
    ],
    "Merlot" => [
        "image" => "merlot.jpg",
        "origin" => " Merlot hails from the Bordeaux region of France.",
        "history" => " Planted in regions such as California, Italy, and Chile.",
        "regions" => "Bordeaux, Napa Valley, and Tuscany are known for producing exceptional Merlot wines.",
        "harvesting" => "Merlot grapes are harvested later in the season to ensure ripeness.",
        "fermentation" => "Grapes undergo fermentation in large vats at controlled temperatures.",
        "malolactic" => "Some undergo malolactic fermentation for a buttery texture.",
        "aging" => "Aged in oak barrels for subtle flavors of vanilla and spice.",
        "taste" => "Soft, round, and smooth with flavors of plum, cherry, and chocolate.",
        "aroma" => "Fruity aromas of red berries and plum, with hints of chocolate, herbs, and earth."
    ],
    "Pinot Noir" => [
        "image" => "pinot.jpg",
        "origin" => "Originates from the Burgundy region of France.",
        "history" => "Known for producing some of the finest and most expensive wines.",
        "regions" => "Pinot Noir is grown in regions like Oregon, California, and New Zealand.",
        "harvesting" => "Pinot Noir grapes are delicate and need careful harvesting, often ripening earlier than other reds.",
        "fermentation" => "Fermented in small, open-top fermenters for controlled extraction of flavor and color.",
        "malolactic" => "Some undergo malolactic fermentation for a buttery texture.",
        "aging" => "Aged in French oak barrels to enhance its complexity.",
        "taste" => "Light-bodied, low tannins, and high acidity. Flavors of raspberry, strawberry, and cherry with earthy undertones.",
        "aroma" => "Aromas of red berries, rose petals, and spices with earthy notes like mushrooms or truffle."
    ],
    "Sauvignon Blanc" => [
        "image" => "sauvignon.jpg",
        "origin" => "Hails from the Bordeaux region of France, known for its crisp, aromatic wines.",
        "history" => "Grown in regions like Marlborough (New Zealand), Loire Valley, and California.",
        "regions" => "Bordeaux, Marlborough, and the Loire Valley are known for producing world-class Sauvignon Blanc wines.",
        "harvesting" => "Grapes are harvested early to preserve their fresh acidity.",
        "fermentation" => "Usually fermented in stainless steel to maintain fresh, fruity characteristics.",
        "malolactic" => "Some undergo malolactic fermentation for a buttery texture.",
        "aging" => "Rarely aged in oak, but sometimes blended for added complexity.",
        "taste" => "Crisp, dry, and acidic with flavors of lime, grapefruit, and green apple.",
        "aroma" => "Aromas of citrus, gooseberry, and grass, with some wines offering green pepper or herbal notes."
    ],
    "Riesling" => [
        "image" => "riesling.jpg",
        "origin" => "Riesling comes from the Rhine region of Germany, where it has a long history.",
        "history" => "Known for its floral aroma, crisp acidity, and ability to age well.",
        "regions" => "Grown in regions like Alsace (France), Australia, and the U.S. as well.",
        "harvesting" => "Riesling is often harvested late to increase sugar levels, especially for sweeter styles.",
        "fermentation" => "Usually fermented in stainless steel to preserve freshness.",
        "malolactic" => "Some undergo malolactic fermentation for a buttery texture.",
        "aging" => "Can be aged in stainless steel or large oak barrels, depending on style.",
        "taste" => "Light-bodied with crisp acidity, flavors of green apple, peach, apricot, and honey.",
        "aroma" => "Floral aromas like jasmine and honeysuckle, with ripe fruit and sometimes petrol notes in aged wines."
    ],

];

// Get the wine name from the URL
$wine_name = isset($_GET['name']) ? $_GET['name'] : 'Chardonnay';

// If the wine exists, use its data; otherwise, default to Chardonnay
$wine = $wines[$wine_name] ?? $wines["Chardonnay"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $wine_name; ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="wine-page <?php echo strtolower(str_replace(' ', '-', $wine_name)); ?>">
    <?php include 'header.php'; ?>

    <h1><?php echo $wine_name; ?></h1>
    <img src="<?php echo $wine['image']; ?>" alt="<?php echo $wine_name; ?>">

    <section>
        <h2>History</h2>
        <ul>
            <li><strong>Origin:</strong> <?php echo $wine['origin']; ?></li>
            <li><strong>Historical Development:</strong> <?php echo $wine['history']; ?></li>
            <li><strong>Famous Regions:</strong> <?php echo $wine['regions']; ?></li>
        </ul>
    </section>

    <section>
        <h2>Winemaking Process</h2>
        <ul>
            <li><strong>Harvesting:</strong> <?php echo $wine['harvesting']; ?></li>
            <li><strong>Fermentation:</strong> <?php echo $wine['fermentation']; ?></li>
            <li><strong>Malolactic Fermentation:</strong> <?php echo $wine['malolactic']; ?></li>
            <li><strong>Aging:</strong> <?php echo $wine['aging']; ?></li>
        </ul>
    </section>

    <section>
        <h2>Flavor Profile</h2>
        <ul>
            <li><strong>Taste:</strong> <?php echo $wine['taste']; ?></li>
            <li><strong>Aroma:</strong> <?php echo $wine['aroma']; ?></li>
        </ul>
    </section>

    <script src="script.js"></script>
</body>
</html>
