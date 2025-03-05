<?php

include("connection.php");
session_start();
error_reporting(E_ALL);
$is_logged_in = isset($_SESSION['user_id']);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["user_id"])) {
        $user_id = intval($_POST["user_id"]);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Learn about game development, tools, and techniques used to create amazing games.">
    <title>Rayworks Studios</title>
    <link rel="stylesheet" href="lifeofadev.css">
</head>

<body>
    <header>
        <img src="picies/Banner 2.0.png" alt="Rayworks Studios Banner">
    </header>

    <nav>
        <a href="#home">Home</a>
        <a href="#tools">Tools</a>
        <a href="#techniques">Techniques</a>
        <a href="aboutus.html">About</a>
        <a href="subscription.html">Start Your Journey</a>
        <a href="mutant_hunter.html">Our Game</a>
        <form method="POST" action="">
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <br>
            <button type="submit">Login</button>
        </form>
        <div class="auth-section">
            <?php if ($is_logged_in): ?>
                <a href="myprofile.html">My Profile</a> | <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="register.php">Register</a>
            <?php endif; ?>
        </div>
    </nav>

    <section id="home">
        <h2>Welcome to Rayworks Studios</h2>
        <p>Dive into the world of game development! Whether you're a beginner or an experienced developer, we have everything you need to explore tools, techniques, and technologies for creating immersive games.</p>
    </section>

    <section id="tools">
        <h2>Popular Game Development Tools</h2>
        <div class="content">
            <div class="Unity">
                <h3>Unity</h3>
                <img src="picies/download.png" alt="Unity Logo">
                <p>Unity is a cross-platform game engine used to develop 2D, 3D, VR, and AR games.</p>
            </div>
            <div class="Unreal">
                <h3>Unreal Engine</h3>
                <img src="picies/unreal.png" alt="Unreal Engine Logo">
                <p>Unreal Engine is a powerful game engine for high-fidelity graphics and real-time rendering.</p>
            </div>
            <div class="Godot">
                <img src="picies/download (1).png" alt="Godot Logo">
                <h3>Godot</h3>
                <p>Godot is an open-source game engine known for its simplicity and flexibility.</p>
            </div>
        </div>
    </section>

    <section id="techniques">
        <h2>Game Development Techniques</h2>
        <div class="content">
            <div>
                <h3>Game Design</h3>
                <p>Game design is the process of designing the content, rules, and gameplay mechanics of a game.</p>
            </div>
            <div>
                <h3>Programming</h3>
                <p>Programming is at the core of game development, implementing logic and functionality using languages like C++, C#, or Python.</p>
            </div>
            <div>
                <h3>Asset Creation</h3>
                <p>Assets include characters, environments, animations, and sounds that bring the game world to life.</p>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Rayworks Studios. All rights reserved.</p>
    </footer>
</body>

</html>