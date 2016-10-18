FROM ubuntu:latest
MAINTAINER Seris "seris_bamad@yahoo.es"
RUN apt-get update -y
RUN apt-get install -y python-pip python-dev build-essential
RUN mkdir -p /app
ADD https://raw.githubusercontent.com/iserranoba/docker/PythonREST/PythonREST/app.py /app
WORKDIR /app
RUN echo "Flask==0.10.1" > requirements.txt
RUN pip install -r requirements.txt   
ENTRYPOINT ["python"]
CMD ["app.py"]
