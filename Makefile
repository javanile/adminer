
start:
	@docker-compose up -d --build
	@echo "Open this page <http://localhost:7777>"

push:
	@git add .
	@git commit -m "update" || echo "No changes to commit"
	@git push

test:
	@docker-compose up -d --build
