<?php
function readAstrologyData() {
    $file = fopen("data/astrology.csv", "r");
    $header = fgetcsv($file);
    $data = [];
    
    while (($row = fgetcsv($file)) !== false) {
        $data[$row[0]] = [
            'date_range' => $row[1],
            'daily' => $row[2],
            'weekly' => $row[3],
            'monthly' => $row[4],
            'tips' => $row[5],
            'year_2024' => $row[6],
            'year_2025' => $row[7],
            'year_2026' => $row[8],
            'year_2027' => $row[9],
            'year_2028' => $row[10],
            'year_2029' => $row[11],
            'year_2030' => $row[12],
            'year_2031' => $row[13],
            'year_2032' => $row[14],
            'year_2033' => $row[15]
        ];
    }
    
    fclose($file);
    return $data;
}

$zodiac = $_POST['zodiac'] ?? '';
$prediction_type = $_POST['prediction_type'] ?? '';
$dob = $_POST['dob'] ?? '';

if (empty($zodiac) || empty($prediction_type)) {
    header("Location: index.php");
    exit;
}

$astrologyData = readAstrologyData();
$prediction = '';
$date_range = '';
$yearly_predictions = [];

if (isset($astrologyData[$zodiac])) {
    $date_range = $astrologyData[$zodiac]['date_range'];
    switch ($prediction_type) {
        case 'daily':
            $prediction = $astrologyData[$zodiac]['daily'];
            break;
        case 'weekly':
            $prediction = $astrologyData[$zodiac]['weekly'];
            break;
        case 'monthly':
            $prediction = $astrologyData[$zodiac]['monthly'];
            break;
    }
    
    // Get yearly predictions
    $yearly_predictions = [
        '2024' => $astrologyData[$zodiac]['year_2024'],
        '2025' => $astrologyData[$zodiac]['year_2025'],
        '2026' => $astrologyData[$zodiac]['year_2026'],
        '2027' => $astrologyData[$zodiac]['year_2027'],
        '2028' => $astrologyData[$zodiac]['year_2028'],
        '2029' => $astrologyData[$zodiac]['year_2029'],
        '2030' => $astrologyData[$zodiac]['year_2030'],
        '2031' => $astrologyData[$zodiac]['year_2031'],
        '2032' => $astrologyData[$zodiac]['year_2032'],
        '2033' => $astrologyData[$zodiac]['year_2033']
    ];
}
?>

<!DOCTYPE html>
<html lang="ml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>പ്രവചന ഫലം - മലയാളം ജ്യോതിഷം</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Malayalam:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .prediction-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        
        .prediction-header {
            color: var(--primary-color);
            margin-bottom: 20px;
        }
        
        .prediction-text {
            font-size: 1.2rem;
            line-height: 1.8;
            margin-bottom: 20px;
        }
        
        .back-button {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: var(--primary-color);
            font-weight: bold;
        }

        .yearly-predictions {
            margin-top: 40px;
        }

        .year-card {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .year-header {
            color: var(--primary-color);
            font-size: 1.2rem;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .divider {
            border-top: 1px solid #ddd;
            margin: 30px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>പ്രവചന ഫലം</h1>
        </header>
        
        <main>
            <div class="prediction-card">
                <h2 class="prediction-header"><?php echo htmlspecialchars($zodiac); ?></h2>
                <p><strong>കാലഘട്ടം:</strong> <?php echo htmlspecialchars($date_range); ?></p>
                <div class="prediction-text">
                    <?php echo htmlspecialchars($prediction); ?>
                </div>

                <div class="divider"></div>

                <div class="yearly-predictions">
                    <h3>വാർഷിക പ്രവചനങ്ങൾ (2024-2033)</h3>
                    <?php foreach ($yearly_predictions as $year => $year_prediction): ?>
                        <div class="year-card">
                            <div class="year-header"><?php echo $year; ?></div>
                            <div class="prediction-text">
                                <?php echo htmlspecialchars($year_prediction); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <a href="index.php" class="back-button">← തിരികെ പോകുക</a>
            </div>
        </main>
    </div>
</body>
</html> 