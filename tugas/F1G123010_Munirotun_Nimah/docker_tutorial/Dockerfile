FROM python:latest
WORKDIR /app
COPY kebutuhan.txt .
RUN pip install --no-cache-dir -r kebutuhan.txt
EXPOSE 8000
COPY . .
CMD python app.py
