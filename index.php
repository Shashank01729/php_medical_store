<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Website</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body onload="loadContent('home')">
   
    <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
    
  
    <div class="sidebar">
        <ul>
            <li onclick="loadContent('home')">
                <i class="fas fa-home"></i><span>Home</span>
            </li>
            <li onclick="loadContent('about')">
                <i class="fas fa-info-circle"></i><span>About Us</span>
            </li>
            <li onclick="loadContent('contact')">
                <i class="fas fa-phone-alt"></i><span>Contact</span>
            </li>
            <li onclick="loadContent('invoice')">
                <i class="fas fa-file-invoice"></i><span>Invoice Generator</span>
            </li>
        </ul>
    </div>
    
    <div class="content" id="content-area">
        
    </div>
</body>
</html>
