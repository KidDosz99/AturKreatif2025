FROM python:3.9-slim

WORKDIR /app

COPY . /app/

RUN pip install --no-cache-dir flask

# Set environment variable for the flag
ENV DYN_FLAG="AKCTF25{j1nj4_0wn3d_4g41n}"

# Expose the port Flask runs on
EXPOSE 5000

# Command to run the application
CMD ["python", "app.py"]