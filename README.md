# Malayalam Astrology Suggestion Web App

A web application that provides astrology-based suggestions in Malayalam language. The application uses PHP for backend processing and stores data in CSV format.

## Features

- User-friendly interface in Malayalam
- Daily, weekly, and monthly predictions
- Zodiac sign selection
- Birth date input
- Admin panel for managing predictions
- Responsive design
- Beautiful animations and transitions

## Requirements

- PHP 7.4 or higher
- Web server (Apache/Nginx)
- Modern web browser with Malayalam font support

## Installation

1. Clone or download this repository to your web server's directory:
```bash
git clone <repository-url>
```

2. Ensure the `data` directory has write permissions for the web server:
```bash
chmod 755 data
chmod 644 data/astrology.csv
```

3. Configure your web server to serve the application from the project directory.

4. Access the application through your web browser:
```
http://localhost/path-to-project/
```

## Admin Access

The admin panel is accessible at:
```
http://localhost/path-to-project/admin/
```

Default admin password: `admin123`

**Important:** Change the default password in `admin/index.php` before deploying to production.

## CSV Data Structure

The application uses a CSV file (`data/astrology.csv`) with the following structure:

```csv
Zodiac,Date_Range,Daily_Prediction,Weekly_Prediction,Monthly_Prediction,General_Tips
മേടം,March 21-April 19,daily_text,weekly_text,monthly_text,tips_text
```

## Security Considerations

1. Change the default admin password
2. Implement proper authentication in production
3. Validate and sanitize all user inputs
4. Use HTTPS in production
5. Regular backup of the CSV data

## Contributing

Feel free to submit issues and enhancement requests.

## License

This project is licensed under the MIT License - see the LICENSE file for details. 