<?php
session_start();

// Simple authentication (in production, use proper authentication)
$admin_password = "admin123"; // Change this in production

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
    if ($_POST['password'] === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
    }
}

if (!isset($_SESSION['admin_logged_in'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="container">
            <header>
                <h1>Admin Login</h1>
            </header>
            <main>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <button type="submit">Login</button>
                </form>
            </main>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// Handle CSV upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csv_file'])) {
    $target_file = "../data/astrology.csv";
    if (move_uploaded_file($_FILES["csv_file"]["tmp_name"], $target_file)) {
        $upload_message = "File uploaded successfully.";
    } else {
        $upload_message = "Error uploading file.";
    }
}

// Read current CSV data
function readCSV() {
    $file = fopen("../data/astrology.csv", "r");
    $data = [];
    while (($row = fgetcsv($file)) !== false) {
        $data[] = $row;
    }
    fclose($file);
    return $data;
}

$csv_data = readCSV();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astrology Admin Panel</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background: white;
        }
        
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        
        th {
            background-color: var(--primary-color);
            color: white;
        }
        
        .upload-section {
            margin-bottom: 30px;
        }
        
        .message {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            background-color: #dff0d8;
            color: #3c763d;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Astrology Admin Panel</h1>
        </header>
        
        <main>
            <div class="upload-section">
                <h2>Upload New CSV File</h2>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="csv_file">Select CSV File:</label>
                        <input type="file" name="csv_file" id="csv_file" accept=".csv" required>
                    </div>
                    <button type="submit">Upload</button>
                </form>
                <?php if (isset($upload_message)): ?>
                    <div class="message"><?php echo $upload_message; ?></div>
                <?php endif; ?>
            </div>

            <h2>Current Data</h2>
            <div style="overflow-x: auto;">
                <table>
                    <thead>
                        <tr>
                            <?php foreach ($csv_data[0] as $header): ?>
                                <th><?php echo htmlspecialchars($header); ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 1; $i < count($csv_data); $i++): ?>
                            <tr>
                                <?php foreach ($csv_data[$i] as $cell): ?>
                                    <td><?php echo htmlspecialchars($cell); ?></td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>
            
            <a href="../index.php" class="back-button">← Back to Main Site</a>
        </main>
    </div>
</body>
</html> 