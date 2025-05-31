#!/bin/sh

echo "🔧 Fixing permissions for Symfony..."

mkdir -p var/cache var/log
chmod -R 775 var
chown -R appuser:appuser var

# Executa o comando padrão
exec "$@"
