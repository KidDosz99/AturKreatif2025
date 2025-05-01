FROM python:3.9-slim

WORKDIR /app
COPY . /app

# ✅ Install Flask and Flask-CORS
RUN pip install flask flask-cors

EXPOSE 8002
CMD ["python", "app.py"]

