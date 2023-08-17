# Spryker Checkout Demo

## Description

Spryker Checkout Demo is an extension of the current Checkout feature, adding a new field to name the orders.

## Quick start

This section describes how to get started with the Spryker Checkout Demo.

### Installing

To set up the Spryker Checkout Demo, do the following:

1. Create a project folder and navigate into it:
```bash
mkdir spryker-checkout-demo && cd spryker-checkout-demo
```

2. Clone the B2B Demo Shop:
```bash
git clone https://github.com/victor-luis-espinoza-soto/towa-spryker-demo.git ./
```

3. Clone the Docker SDK:
```bash
git clone git@github.com:spryker/docker-sdk.git docker
```

#### Setting up

1. Bootstrap the docker setup:

```bash
docker/sdk boot deploy.dev.yml
```

2. Build and start the instance:
```bash
docker/sdk up
```

3. Switch to your branch, re-build the application with assets and demo data from the new branch:

```bash
git checkout {your_branch}
docker/sdk boot -s deploy.dev.yml
docker/sdk up --build --assets --data
```

You've set up your Spryker Checkout Demo and can access your applications.

## Optional

1. Reload all the data:

```bash
docker/sdk clean-data && docker/sdk up && docker/sdk console q:w:s -v -s
```
