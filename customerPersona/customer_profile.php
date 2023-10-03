<?php
$filename = isset($_GET['file']) ? $_GET['file'] : null;

if ($filename && preg_match("/^[a-zA-Z0-9_\-]+\.json$/", $filename) && file_exists($filename)) {
    $data = json_decode(file_get_contents($filename), true);
} else {
    // Handle error. For instance, redirect to an error page or display an error message.
    die("Invalid file or file not found.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persona Profile</title>
    <link rel="stylesheet" href="persona_style.css">
</head>

<body>

    <!-- Name Section -->
    <section id="name">
    <img src="<?php echo $data['img']; ?>" alt="Persona Image" class="persona-image">
    <div class="name-text">
        <h2 style="border-bottom: none; padding-bottom: 0em;"><?php echo $data['firstname']; ?></h2>
        <h2 style="border-bottom: none; padding-bottom: 0em;"><?php echo $data['lastname']; ?></h2>
    </div>
</section>

    <!-- Quote Section -->
    <section id="quote">
        <blockquote>
            "<?php echo $data['quote']; ?>"
        </blockquote>
    </section>

    <!-- Demographic Profile Section -->
    <section id="demographic-profile">
        <h2>Demographic Profile</h2>
        <?php foreach ($data['demographic'] as $key => $value): ?>
            <p><strong><?php echo ucfirst($key); ?>:</strong> <?php echo $value; ?></p>
        <?php endforeach; ?>
    </section>

    <!-- Needs and Goals Section -->
    <section id="needs-goals">
        <h2>Needs and Goals</h2>
        <?php foreach ($data['needsGoals'] as $key => $value): ?>
            <p><strong><?php echo ucfirst($key); ?>:</strong> <?php echo $value; ?></p>
        <?php endforeach; ?>
    </section>

    <!-- Scenario Section -->
    <section id="scenario">
        <h2>Scenario</h2>
        <p><?php echo $data['scenario']; ?></p>
    </section>

    <!-- USP Section -->
    <section id="usp">
        <h2>USP of Product/Service</h2>
        <?php foreach ($data['usp'] as $key => $value): ?>
            <p><strong><?php echo ucfirst($key); ?>:</strong> <?php echo $value; ?></p>
        <?php endforeach; ?>
    </section>

</body>

</html>
