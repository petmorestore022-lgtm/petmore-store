## SETUP
### 1 - copy env.php to docker compose
    cp app/etc/env.php.local app/etc/env.php

### 2 docker compose up
    docker compose up

#### 2.1 build framework
    docker compose exec php sh build-app.sh

### 3 import Dump in docker/mysql/*tar.gz

    get dump file slim and import to mysql container

### 4 access

    http://localhost/

### 5 admin

    http://localhost/admin_wzxnrj2/

    user: bruno_112_fake_admin
    pass: vZ0qbTR12WUQ

