<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 200px;
            height: 100vh;
            background-color: #333;
            color: #fff;
            padding-top: 20px;
        }

        .sidebar a {
            display: block;
            padding: 10px;
            color: #fff;
            text-decoration: none;
        }

        .sidebar a::before {
            display: inline-block;
            margin-right: 10px;
            width: 20px;
            height: 20px;
            font-family: "Font Awesome"; /* Replace with the font icon library you're using */
            font-size: 16px;
            line-height: 1;
            text-align: center;
        }

        .sidebar a.home::before {
            content: "\f015"; /* Home icon */
        }

        .sidebar a.profile::before {
            content: "\f007"; /* User icon */
        }

        .sidebar a.wallet::before {
            content: "\f155"; /* Wallet icon */
        }

        .sidebar a.analytics::before {
            content: "\f080"; /* Chart line icon */
        }

        .sidebar a.tasks::before {
            content: "\f0ae"; /* Tasks icon */
        }

        .sidebar a.settings::before {
            content: "\f013"; /* Cog icon */
        }

        .sidebar a.help::before {
            content: "\f059"; /* Question icon */
        }

        .content {
            margin-left: 200px;
            padding: 20px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Include the CSS file for the font icon library you're using -->
</head>
<body>
    <div class="sidebar">
        <a href="#" class="home">Home</a>
        <a href="#" class="profile">Profile</a>
        <a href="#" class="wallet">Wallet</a>
        <a href="#" class="analytics">Analytics</a>
        <a href="#" class="tasks">Tasks</a>
        <a href="#" class="settings">Settings</a>
        <a href="#" class="help">Help</a>
    </div>
    <div class="content">
        <!-- Dashboard content goes here -->
    </div>
</body>
</html>
