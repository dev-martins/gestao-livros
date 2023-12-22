## implementações

1. lógica de exceptions centralizada utilizando pattern strategy;
 - mantém um contrato entre o backend e o frontend (que sabe sempre a estrutura de resposta esperada)
 - facilita a criação de testes automatizados por saber o que esperar de resposta
 - evita utilização de try/cath na aplicação reduzindo o tamanho do código
 - evita que cada desenvolvedor crie uma estrutura de exception e mensagens diferentes
 - acaba sendo uma questão de segurança para a aplicação onde pode ser passada uma quantidade maior de informações em desenvolvimento e apenas uma mensagem resumida em produção

2.  validação da requisição com FormRequest
 - evita que um erro estoure no banco, ou seja se os dados foram enviados errados não é necessário que a query seja executada no banco (ou uma API externa) para retornar o erro
 -  fácil manutenção, porque a lógica fica centralizada em arquivo específico para isso

3. Autenticação única via API REST onde é possível validar rotas web também 
4. implementação do Admin LTE para o front end
5. Implementação do Telescop para debug da aplicação
6. Implementações dos patterns Strategy, Repository e Service
7. Migrations de todas a tabelas
