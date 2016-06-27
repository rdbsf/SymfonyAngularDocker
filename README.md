SymfonyAngularDocker
========================

a slightly modified version of https://github.com/EwanValentine/SymfonyAngularDocker


### Updates

  * symfony 2.8.*
  * added Neo4j:3.0
  * removed mongo, rabbitmq, elasticsearch etc.
  * removed admin
  * added for Neo4j php support in composer
  

    "everyman/neo4jphp": "dev-master",
    
    "hirevoice/neo4jphp-ogm": "dev-master"


### Docker tips (using docker-machine, docker-compose)


    # get environment
    docker-machine env default
    
    #connect your shell to the machine
    eval "$(docker-machine env default)"
    
    # build (should be first time or when updated)
    docker-compose build
    
    # start up the containers
    docker-compose up
    
    #run commands to containers inside machine
    docker-compose run webserver bash -c "cd api && composer update"
    
    #fix cache folder symfony things
    docker-compose run webserver bash -c "cd api && chmod 777 app/cache/dev && chmod 777 app/logs"


# Set your /etc/hosts

(IP Address from docker-machine env) frontend.test.com

(IP Address from docker-machine env) api.test.com

# Visit

http://api.test.com/app_dev.php

http://frontend.test.com/

http://api.test.com:7474/ (u:neo4j p:neo5j)