# HealthCheck Doctrine checker

## Installation

Install checker:

```bash
    composer require alahaxe/healthcheck-doctrine
```

Register service in your app:

```yaml
    Alahaxe\HealthCheckBundle\Checks\Doctrine\DatabaseConnectivityCheck:
        autowire: true
        tags: ['lahaxearnaud.healthcheck.check']
```
