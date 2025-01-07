<!DOCTYPE html>
<html lang="ml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>മലയാളം ജ്യോതിഷ നിർദ്ദേശങ്ങൾ</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Malayalam:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>മലയാളം ജ്യോതിഷ നിർദ്ദേശങ്ങൾ</h1>
        </header>
        
        <main>
            <form action="prediction.php" method="POST">
                <div class="form-group">
                    <label for="zodiac">രാശി തിരഞ്ഞെടുക്കുക:</label>
                    <select name="zodiac" id="zodiac" required>
                        <option value="">--തിരഞ്ഞെടുക്കുക--</option>
                        <option value="മേടം (Aries)">മേടം (Aries)</option>
                        <option value="ഇടവം (Taurus)">ഇടവം (Taurus)</option>
                        <option value="മിഥുനം (Gemini)">മിഥുനം (Gemini)</option>
                        <option value="കർക്കടകം (Cancer)">കർക്കടകം (Cancer)</option>
                        <option value="ചിങ്ങം (Leo)">ചിങ്ങം (Leo)</option>
                        <option value="കന്നി (Virgo)">കന്നി (Virgo)</option>
                        <option value="തുലാം (Libra)">തുലാം (Libra)</option>
                        <option value="വൃശ്ചികം (Scorpio)">വൃശ്ചികം (Scorpio)</option>
                        <option value="ധനു (Sagittarius)">ധനു (Sagittarius)</option>
                        <option value="മകരം (Capricorn)">മകരം (Capricorn)</option>
                        <option value="കുംഭം (Aquarius)">കുംഭം (Aquarius)</option>
                        <option value="മീനം (Pisces)">മീനം (Pisces)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="prediction_type">പ്രവചന തരം:</label>
                    <select name="prediction_type" id="prediction_type" required>
                        <option value="daily">ദൈനംദിന പ്രവചനം</option>
                        <option value="weekly">ആഴ്ചാ പ്രവചനം</option>
                        <option value="monthly">മാസ പ്രവചനം</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="dob">ജനന തീയതി:</label>
                    <input type="date" name="dob" id="dob" required>
                </div>

                <button type="submit">പ്രവചനം കാണുക</button>
            </form>
        </main>
    </div>
    <script src="js/script.js"></script>
</body>
</html> 