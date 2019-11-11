
# ApiStock

Api Rest desenvolvida em laravel

## Ambiente

- docker ;
- Docker-compose;


## Conteiners :

- Ngix, DB(MySql) , Redis , App(api-web-sac)

##**OBSERVACAO IMPORTANTE**:

- Após clonar o repositório , copiar o conteudo dos arquivos entrypoint.sh e .env da pasta .docker, gera-los novamente pelo terminal usando nano ou vim , colar o conteudo e salvar.
- O container de banco roda na porta 3306 por padrão , observar se mysql server ou outro SGBD enconstra-se instalado localmente e esta rodando nesta porta.
- Também é necessário alterar o endereço IP do servidor NGinx para IP da máquina de trabalho.

## Como executar o projeto 

Dentro da pasta app (api-web-sac) 

- execute docker-compose up -d --build 

Verifique os containers executados :

- docker ps

Acessa bash da aplicação

- docker exec -it (ID / Nome do container) bash

Para desligar os containers:

- docker-compose down (opção é passar parâmetro desligar apenas o container que se quer)

Verificar logs dos cointaners:

- docker logs (nome do container)
