import sys
from PIL import Image
import mysql.connector

# Database connection details
DB_HOST = '127.0.0.1'
DB_USER = 'root'
DB_PASS = ''  # Update with your password if necessary
DB_NAME = 'recycleplus'

# Connect to the MySQL database
db = mysql.connector.connect(
    host=DB_HOST,
    user=DB_USER,
    password=DB_PASS,
    database=DB_NAME
)

cursor = db.cursor()

# Get the absolute image path from the command-line arguments
image_path = sys.argv[1]

try:
    with Image.open(image_path) as img:
        width, height = img.size

        # Simple validation: if width and height > 500, return 'yes', otherwise 'no'
        if width > 500 and height > 500:
            validation_status = 'True'
            print('yes')  # Output 'yes' for valid image
        else:
            validation_status = 'False'
            print('no')  # Output 'no' for invalid image


except Exception as e:
    print(f"Error: {str(e)}")

finally:
    cursor.close()
    db.close()
