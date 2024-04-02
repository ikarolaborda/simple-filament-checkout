# Simple Filament Checkout App
This application is a simple, yet very well conceived Laravel application that uses Filament, 
and Livewire (Under the hood)
to build an admin panel for managing products and orders, There, you can view the products and simulate a purchase.

## Integrations
This app comes fully ready for integrating with stripe, and also exposing your container to the web via the Ngrok service.

## Installation

- Clone the repo
- Make sure you have Docker and Docker Compose installed

Then, set up the following **env** vars:

```dotenv
    STRIPE_KEY=your_stripe_key
    STRIPE_SECRET=your_stripe_secret
    STRIPE_CURRENCY=usd # Or another currency of your preference
    STRIPE_WEBHOOK_SECRET=your_webhook_secret
    NGROK_PORT=4040  #Or another port of your preference
    NGROK_AUTHTOKEN=your_ngrok_token
    NGROK_CUSTOM_DOMAIN=your_custom_domain # Optional
```

after that, run:

```bash
docker-compose --env-file .env up -d
```

This will start the Docker containers in the background using the environment variables

then to access the app, go to:

http://localhost

and use the credentials:

Email: admin@admin.com

Password: password


