#Folder for Ontap and other NetApp technology
There's a configuration file in .json to instruct the driver/plugin the IP's, SVM's,User/password and so on
For what I understand instead of "registering" the driver as indicated in the docker documentation
[Plugins API](https://docs.docker.com/engine/extend/plugin_api/)
Instead:
place the ontap-nas.json file (defining the config) in the `/etc/netappdvp/` directory. Create it if not present: 
`sudo mkdir -p /etc/netappdvp`
##download and unpack the application
`wget https://github.com/NetApp/netappdvp/releases/download/v1.2/netappdvp-1.2.tar.gz`

`tar zxf netappdvp-1.2.tar.gz`

###move to a location in the bin path
`sudo mv netappdvp /usr/local/bin`

`sudo chown root:root /usr/local/bin/netappdvp`

`sudo chmod 755 /usr/local/bin/netappdvp`

###Start the deamon...
`sudo netappdvp --config=/etc/netappdvp/ontap-nas.json`
###Create volumes
`docker volume create -d netapp --name ndvp_1`
###Provision docker volume when creating a container
`docker run --rm -it --volume-driver netapp --volume ndvp_2:/my_vol alpine ash`
