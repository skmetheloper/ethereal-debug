@echo off

set url=localhost:8888

set web=public

start http://%url% && php -S %url% -t %web%