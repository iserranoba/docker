# Jenkins readme.md

We will start using Jenkins to automate the builds and testing for the RESTAPI project as it 
is getting a bit too complex to review the right execution every time we make a change in any file

We will start by playing around to understand how it works before integrating the RESTAPI containers app

`docker pull jenkins`

will pull the jenkins server image. For persistency we are going to create a `/Users/<user_name>/jenkins` folder

`docker run -p 8080:8080 -p 50000:50000 -v /Users/<user_name>/jenkins:/var/jenkins_home jenkins`

