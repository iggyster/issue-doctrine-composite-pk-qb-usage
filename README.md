# issue-doctrine-composite-pk-qb-usage

A short repo that reproduce a [specific problem](https://github.com/doctrine/orm/issues/8143) of using composite PKs in Doctrine ORM in query builder.

# Getting started

1. Add `127.0.0.1 composite-test.lm` to your `/ect/hosts` file.
2. Execute `docker-compose up -d --build`.
3. Go to container's shell: `docker-compose exec php sh`.
4. Install dependencies: `composer install`.
5. Run migrations: `./bin/console d:m:m -n`.
6. Open [page with the issue](http://composite-test.lm/4021d80d-d355-4d52-a0e8-8785e940cdff) in your browser.
