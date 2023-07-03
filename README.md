This project is an example of a new attribute implements in Symfony 6.3 - MapRequestPayload. In src/Controller/ManualController.php you can see how to do that manually, and in src/Controller/AutoController.php you can see how to do that using the new attribute.

To start the project clone this repository

```bash
$ git clone git@github.com:bpastukh/symfony-map-request-to-dto.git
```

Install dependencies
```bash
$ composer intall
```

Start a web-server, e.g. using symfony cli-tool
```bash
$ symfony server:start
```

Run http query
```bash
$ curl --location --request POST 'https://127.0.0.1:8000/manual' \
--header 'Content-Type: application/json' \
--data-raw '{
   "comment": "This is a title",
   "rating": 5
}'
```

You can also play with request payload to provoke exceptions.
