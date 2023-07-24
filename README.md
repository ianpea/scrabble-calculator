# Scrabble Calculator (Laravel)


## MacOS
### Prerequisites
Docker Desktop, PHP, Composer installed on your mac.

### Deploy Steps
Using terminal, in project root folder, run below commands to prepare the backend.

1) Convert .env.localhost to .env using this command 

        mv .env.localhost .env

2) Install dependencies

        composer install

3) Start the Laravel & MySQL containers using below command

        ./vendor/bin/sail up
4) Once the dockers are up you can check via `docker ps -a` or view them via the `Docker Desktop software`.

5) Run the database migration to generate a clean database.

        ./vendor/bin/sail artisan migrate

6) Once everything is up and running, test the backend using the command below.
    
        ./vendor/bin/sail artisan test

7) To stop the containers, run 

        ./vendor/bin/sail down 

8) To stop and remove the containers + volumes, run

        ./vendor/bin/sail down -v

## Windows (WSL2 Docker Desktop)
### Prerequisites (Windows)
Docker WSL2 (Windows Subsystem for Linux)
### Prerequisites (WSL2 Ubuntu After Installation of Docker)
Composer, PHP 

### Installation Steps
1) <b>Install Docker Desktop on Windows</b>. Docker run in a Linux env, which is why we need to install WSL2 (Windows Subsystem for Linux) on our windows machine to simulate an env for Docker.
2) In powershell, type and enter (this will set windows to use WSL2 as a default instead of WSL)

        wsl --set-default-version 2

3) Go to Microsoft store and install the Ubuntu distro v22.04 LTS.
4) Once installed, you can start the distro via the <b>Microsoft store</b> or in powershell type

        wsl
    if you hit any error after typing 'wsl', make sure you have selected the Ubuntu as default distro to run WSL with. To set it, run

        wsl --setdefault <DistributionName>
5) Once you are in, you can run your commands as usual in a Ubuntu/MacOS environment.
6) #IMPORTANT# Remember to link your distro to Docker Desktop software by going to <u>Docker Desktop Settings > Resources > WSL Integration.</u>

### Deploy Steps (In WSL2 Ubuntu's terminal)
1) Navigate to the root project folder via mounts
        
        cd /mnt/<PATH_TO_UR_LARAVEL_BACKEND_FOLDER> 
        (example): cd /mnt/d/apps/scrabble-calculator-laravel/

2) Install php

        sudo apt-get install php

3) Install composer
4) Install dependencies

        composer install

5) Start the Laravel & MySQL containers using below command

        ./vendor/bin/sail up
6) Once the dockers are up you can check via `docker ps -a` or view them via the `Docker Desktop software`.

7) Run the database migration to generate a clean database.

        ./vendor/bin/sail artisan migrate

8) Once everything is up and running, test the backend using the command below.
    
        ./vendor/bin/sail artisan test

9) To stop the containers, run 

        ./vendor/bin/sail down 

10) To stop and remove the containers + volumes, run

        ./vendor/bin/sail down -v

If you hit any error such as:

- chmod() operation not permitted, double check if you have the below options in the conf file of your WSL2 
        
        etc/wsl.conf 
    and insert the below config options:

        [automount]
        options = "metadata"

## Expected Results
### Database Migrations
![Alt text](<SS 2023-07-24 at 23.21.12.png>)

### Unit & Feature Tests
![Alt text](<SS 2023-07-24 at 23.22.49.png>)
