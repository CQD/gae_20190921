.PHONY: deploy server

PROJECT_ID:=$(GOOGLE_CLOUD_PROJECT)
DEPLOY_CMD:=gcloud app deploy

deploy:
	@echo \\033[32m執行指令：\\033[1\;33m $(DEPLOY_CMD) \\033[m
	@$(DEPLOY_CMD)
	@echo \\033[32m執行完成，請開啟 \\033[1\;33m$(PROJECT_ID).appspot.com\\033[0\;32m 觀看結果。\\033[m

server:
	php -S localhost:8080 -t public/
