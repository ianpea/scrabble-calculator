# Scrabble Calculator (Laravel)

![Alt text](<SS 2023-07-25 at 22.27.57.png>)
![Alt text](<SS 2023-07-25 at 22.41.33.png>)

This is the backend of <i>Scrabble Calculator</i>.
Download the source code into a folder using your preffered method. Follow the steps below to deploy it locally on MacOS or Windows.

<i>Scrabble Calculator</i> is a simple scrabble board with adjustable tiles, realtime scoring with score submission API. 

### Version Info 2023-07-25
Please feel free to use the latest version of the packages mentioned below. If anything failed, feel free to fallback to below versions.
- ``Composer 2.5.8``
- ``Laravel 10 / Sail v2.19.1`` 
- ``PHP 8.2``

## Table of Contents
1. [MacOS](#macos)
2. [Windows WSL2](#windows)
3. [Expected Results](#expected-results)


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

## Windows 
(WSL2 Docker Desktop)
### Prerequisites (Windows)
[Docker WSL2 (Windows Subsystem for Linux)](https://docs.docker.com/desktop/wsl/)
### Prerequisites (Inside WSL2 Ubuntu After Installation of Docker)
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

<b>IMPORTANT REMINDER:  Remember to link your distro to Docker Desktop software </b>by going to [<u>Docker Desktop Settings > Resources > WSL Integration.</u>](https://docs.docker.com/desktop/wsl/) You may need to restart your Docker / Ubuntu for changes to take effect.

### Deploy Steps (In WSL2 Ubuntu's terminal)
Login to your WSL2 distro:
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
### Docker 
(`vendor/bin/sail up`)
![Alt text](<SS 2023-07-25 at 07.49.41.png>)

### Database Migrations
(`vendor/bin/sail artisan migrate`)
![Alt text](<SS 2023-07-24 at 23.21.12.png>)

### Unit & Feature Tests
(`vendor/bin/sail artisan test`)
![Alt text](<SS 2023-07-24 at 23.22.49.png>)
