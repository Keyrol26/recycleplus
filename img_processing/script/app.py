# # import sys
# # import json
# # from tensorflow.keras.models import load_model
# # from tensorflow.keras.preprocessing.image import load_img, img_to_array
# # import numpy as np
# # import os  # Add this import statement

# # # Get the current script directory
# # base_dir = os.path.dirname(os.path.abspath(__file__))


# # # Correct the model path
# # model_path = os.path.join(base_dir, '..', 'model', 'recycle_classifier_model.h5')  # '..' moves up one directory level
# # print("Resolved model path:", model_path)

# # # Load the model
# # try:
# #     model = load_model(model_path)
# #     print("Model loaded successfully.")
# # except FileNotFoundError:
# #     print(f"Model file not found at {model_path}")
# #     raise
# # img_height, img_width = 244, 244  # Ensure this matches your model's input shape

# # # Path to the test image provided by Laravel
# # image_path = sys.argv[1]

# # # Load and preprocess the image
# # image = load_img(image_path, target_size=(img_height, img_width))
# # image_array = img_to_array(image) / 255.0  # Normalize image array
# # image_for_prediction = np.expand_dims(image_array, axis=0)  # Add batch dimension

# # # Predict
# # prediction = model.predict(image_for_prediction)
# # confidence = float(prediction[0][0])  # Confidence for "recycle" class

# # # Determine the status, prediction label, and percentage
# # if confidence > 0.5:
# #     status = "Valid"
# #     prediction_label = "Recycle"
# #     percentage = confidence * 100
# # else:
# #     status = "Invalid"
# #     prediction_label = "Non-Recyclable"
# #     percentage = (1 - confidence) * 100

# # # Prepare output as a JSON object
# # output = {
# #     'status': status,
# #     'prediction': prediction_label,
# #     'confidence': round(percentage, 2)
# # }

# # # Print the JSON output to stdout so Laravel can capture it
# # print(json.dumps(output))
# import sys
# import json
# from tensorflow.keras.models import load_model
# from tensorflow.keras.preprocessing.image import load_img, img_to_array
# import numpy as np
# import os

# # Ensure the script handles encoding correctly
# import io
# sys.stdout = io.TextIOWrapper(sys.stdout.buffer, encoding='utf-8')
# # Get the current script directory
# base_dir = os.path.dirname(os.path.abspath(__file__))

# # Correct the model path
# model_path = os.path.join(base_dir, '..', 'model', 'recycle_classifier_model.h5')  # '..' moves up one directory level
# print("Resolved model path:", model_path)

# # Load the model
# try:
#     model = load_model(model_path)
#     print("Model loaded successfully.")
# except FileNotFoundError:
#     print(f"Model file not found at {model_path}")
#     raise
# except Exception as e:
#     print(f"Error loading model: {e}")
#     raise

# # Ensure image dimensions match the model's input
# img_height, img_width = 244, 244  # Ensure this matches your model's input shape

# # Path to the test image provided by Laravel
# image_path = sys.argv[1]

# # Validate the image path
# if not os.path.exists(image_path):
#     print(f"Image file not found at {image_path}")
#     sys.exit(1)  # Exit gracefully with an error code

# # Load and preprocess the image
# try:
#     image = load_img(image_path, target_size=(img_height, img_width))
#     image_array = img_to_array(image) / 255.0  # Normalize image array
#     image_for_prediction = np.expand_dims(image_array, axis=0)  # Add batch dimension
# except Exception as e:
#     print(f"Error processing image: {e}")
#     sys.exit(1)

# # Predict
# try:
#     prediction = model.predict(image_for_prediction)
#     confidence = float(prediction[0][0])  # Confidence for "recycle" class

#     # Determine the status, prediction label, and percentage
#     if confidence > 0.5:
#         status = "Valid"
#         prediction_label = "Recycle"
#         percentage = confidence * 100
#     else:
#         status = "Invalid"
#         prediction_label = "Non-Recyclable"
#         percentage = (1 - confidence) * 100

#     # Prepare output as a JSON object
#     output = {
#         'status': status,
#         'prediction': prediction_label,
#         'confidence': round(percentage, 2)
#     }

#     # Print the JSON output to stdout so Laravel can capture it
#     print(json.dumps(output, ensure_ascii=False))  # Use ensure_ascii=False to avoid encoding issues

# except UnicodeEncodeError as e:
#     print(f"UnicodeEncodeError encountered: {e}")
#     sys.exit(1)  # Exit gracefully

# except Exception as e:
#     print(f"Error during prediction: {e}")
#     sys.exit(1)

import sys
import json
from tensorflow.keras.models import load_model
from tensorflow.keras.preprocessing.image import load_img, img_to_array
import numpy as np
import os
import io

# Ensure the script handles encoding correctly
sys.stdout = io.TextIOWrapper(sys.stdout.buffer, encoding='utf-8')

# Get the current script directory
base_dir = os.path.dirname(os.path.abspath(__file__))

# Correct the model path
model_path = os.path.join(base_dir, '..', 'model', 'v4_recycle_classifier_model.h5')  # '..' moves up one directory level
print("Resolved model path:", model_path)

# Load the model
try:
    model = load_model(model_path)
    print("Model loaded successfully.")
except FileNotFoundError:
    print(f"Model file not found at {model_path}")
    sys.exit(1)
except Exception as e:
    print(f"Error loading model: {e}")
    sys.exit(1)

# Ensure image dimensions match the model's input
img_height, img_width = 244, 244  # Ensure this matches your model's input shape

# Path to the test image provided by Laravel
image_path = sys.argv[1]

# Validate the image path
if not os.path.exists(image_path):
    print(f"Image file not found at {image_path}")
    sys.exit(1)  # Exit gracefully with an error code

# Load and preprocess the image
try:
    image = load_img(image_path, target_size=(img_height, img_width))
    image_array = img_to_array(image) / 255.0  # Normalize image array
    image_for_prediction = np.expand_dims(image_array, axis=0)  # Add batch dimension
except Exception as e:
    print(f"Error processing image: {e}")
    sys.exit(1)

# Predict
try:
    prediction = model.predict(image_for_prediction)
    confidence = float(prediction[0][0])  # Confidence for "recycle" class

    # Determine the status, prediction label, and percentage
    if confidence > 0.5:
        status = "Valid"
        prediction_label = "Recycle"
        percentage = confidence * 100
    else:
        status = "Invalid"
        prediction_label = "Non-Recyclable"
        percentage = (1 - confidence) * 100

    # Prepare output as a JSON object
    output = {
        'status': status,
        'prediction': prediction_label,
        'confidence': round(percentage, 2)
    }

    # Write the JSON output to a file to inspect
    with open("output.json", "w", encoding="utf-8") as f:
        json.dump(output, f, ensure_ascii=False)

    # Ensure the output is properly encoded in JSON and print it
    try:
        json_output = json.dumps(output, ensure_ascii=False)  # Ensure ASCII encoding for non-ASCII characters
        print(json_output)  # Output for Laravel to capture
    except Exception as e:
        print(f"Error generating JSON output: {e}")
        sys.exit(1)

except UnicodeEncodeError as e:
    print(f"UnicodeEncodeError encountered: {e}")
    sys.exit(1)  # Exit gracefully

except Exception as e:
    print(f"Error during prediction: {e}")
    sys.exit(1)
