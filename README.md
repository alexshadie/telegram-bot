# Telegram bot api implementation
Examples need dev composer (composer install --dev)

# Webhook config

## Certificates
openssl req -newkey rsa:2048 -sha256 -nodes -keyout cert.key -x509 -days 365 -out YOURPUBLIC.pem -subj "/C=US/ST=New York/L=Brooklyn/O=Example Brooklyn Company/CN=YOURDOMAIN.EXAMPLE"

## Nginx
@todo

# Roadmap

  - <s>Translate PHPDoc (Telegram official API docs)</s>
  - <s>Implement objects</s>
  - State machine
  - Tests
  - Implement keyboards
  - Implement inline replies
  - Implement game API
  - Direct replies for webhook api
