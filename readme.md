## Api de Comentarios 
- Token no login 
- Migrations 
- Testes Unitarios


*database: arrayenterprises*
*user: root*
*password: secret*
 
    Instruções 
        1 - Verificar conteudo de Homestead.yaml
        2 - rodar comando php artisan migrate 
        3 - entrar no ip descrito do arquivo Homestead.yaml, clicar em register e se registrar
        4 - rodar o comando php artisan passport:client --password, após isso, dar enter para confirmar 
            e copiar o Client ID e Client Secret
        5 - A rota http://{{ip}}/api/v1/comments/ ja funcionará pois para vizualizar os comentarios não é necessario logar-se, porém ainda não retornará nenhum comentario.

            5.1- No postman:
	            > http://{{ip}}/oauth/token via post 
	            > selecione Body e marque x-www-form-urlencoded
	            > Insira os valores conforme abaixo:
	            	KEY				VALUE
	            	> grant_type 			password
	               	> client_id			"valor do Client ID do passo 4"
		            > client_secret			"valor do Client Secret do passo 4"
		            > username			"email cadastrado no passo 3"
	            	> password			"senha cadastrada no passo 3"
	            	> scope				"valor vazio"
	            > Enviar

    6 - Após o passo 5, copiar o valor de "access_token"

    7 - Esse passo serve para qualquer uma das rotas contidas em routes>api.php, usaremos para inserir um comentario
    	7.1 - No postman:
	    	>http://{{ip}}/api/v1/comments/ via post
		    >No Header, incluir 3 campos:
		    	KEY				VALUE
		    	> Content-Type			application/x-www-form-urlencoded
			    > Accept			application/json
			    > Authorization			Bearer + "conteudo de "access_token""
		        >No Body incluir o campo:
		        	KEY				VALUE
			        >comentario			"conteudo do comentario"



    Obs.: Usuarios com o valor 1 na coluna "admin" na tabela Users podem apagar qualquer comentário (quando se registra o padrão do campo é 0).



Ambiente criado em [Homestead](https://laravel.com/docs/5.7/homestead), [Virtualbox](https://www.virtualbox.org/) e  [Vagrant](https://www.vagrantup.com/).



