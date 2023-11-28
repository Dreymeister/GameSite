<?php
// Get all json files in the current directory
$json_files = glob("*.json");

$all_personas = [];
foreach ($json_files as $file) {
    $data = json_decode(file_get_contents($file), true);
    if ($data) {
        // Add the filename to each persona array for later reference
        $data['filename'] = $file;
        $all_personas[] = $data;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persona Index</title>
    <link rel="stylesheet" href="persona_style.css">
</head>

<body>

<section id="persona-list">
    <h1>Personas</h1>
    <div class="persona-cards">
        <?php foreach ($all_personas as $persona): ?>
            <div class="persona-card">
                <img src="<?php echo $persona['img']; ?>" alt="Persona Image" class="persona-thumbnail">
                <h2><?php echo $persona['firstname'] . ' ' . $persona['lastname']; ?></h2>
                <p>"<?php echo substr($persona['quote'], 0, 50) . "..."; ?>"</p>
                <a href="customer_profile.php?file=<?php echo urlencode($persona['filename']); ?>">View Profile</a>
            </div>
        <?php endforeach; ?>
    </div>
</section>

</body>

</html>
