CakePHP-Cremilla

Running migrations
## Quesadilla migrations
```bash
$ bin/cake Migrations migrate -p Josegonzalez/CakeQueuesadilla
```
## Cremilla migrations
```bash
$ bin/cake Migrations migrate -p CriztianiX/Cremilla
```

## Running worker
#### Notice, this worker cannot be stopped from UI
```bash
$ bin/cake CriztianiX/Cremilla.Worker --queue default --logger cremilla
```

## Running observer's workers
#### Using Mailgun built-in transport
```bash
MAILGUN_DOMAIN="" MAILGUN_API_KEY="" EMAIL_FROM_DOMAIN="postmaster@domain.com" \
EMAIL_FROM_NAME="Cremilla Alert" EMAIL_TO="sysadmin@localhost.com" bin/cake CriztianiX/Cremilla.worker_observer
```

## Adding Workers from UI
#### /cremilla/workers/add
![alt tag](https://raw.githubusercontent.com/CriztianiX/cakephp-cremilla/master/doc/img/Add_Worker.PNG)

## Workers Status
#### /cremilla/workers
![alt tag](https://raw.githubusercontent.com/CriztianiX/cakephp-cremilla/master/doc/img/Workers.PNG)

## Jobs Status
#### /cremilla/logs

![alt tag](https://raw.githubusercontent.com/CriztianiX/cakephp-cremilla/master/doc/img/Logs.PNG)
