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
```bash
$ bin/cake CriztianiX/Cremilla.Worker
```

## Running observer's workers
#### Using Mailgun built-in transport
```bash
MAILGUN_DOMAIN="" MAILGUN_API_KEY="" EMAIL_FROM_DOMAIN="postmaster@domain.com" \
EMAIL_FROM_NAME="Cremilla Alert" EMAIL_TO="sysadmin@localhost.com" bin/cake CriztianiX/Cremilla.worker_observer
```
