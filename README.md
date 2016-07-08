- Design Pattern (projeto fase 2)
	Funcionalidades:
		- Para cada campo adicionado ao formulário, deve ser possível renderiza-lo separadamente. Criar um método “createField()” e este deve receber parâmetros para a criação do campo (poderemos ter vários tipos de campos).
        - Todos os forms agora deverão depender de uma classe chamada “Validator”, que será responsável pela validação dos dados do formulário. Esta classe dependerá de outra classe chamada de “Request”, que representará uma requisição do usuário.
        - Criar 4 instancias deste form com os campos que você quiser e renderize.

        Restrições & dicas
        - Toda a implementação deve ser feita usando OO (sem uso de funções)
        - Não é permitido usar métodos e atributos estáticos
        - Não é permitido usar os patterns Singleton e/ou Registry
        - Procure fazer classes pequenas.
        - Classes com +300 linhas não serão permitidas
        - Procure fazer métodos pequenos. Métodos com +100 linhas não serão permitidos
        - Usar muitas interfaces para confiar na comuniçação/contrato entre os objetos.
        - Separe as classes em namespaces.


- v0.1.1
- Inclusão de novo tipo de input: checkbox

- Design Pattern (projeto fase 1)
	Formulário básico:
		- Criar uma classe(s) que seja responsável por gerar um formulário HTML de forma totalmente dinâmico;
		- Uma vez que você criar o objeto de seu formulário, você poderá chamar métodos para adicionar um novo campo, especificando seu tipo, entre outros;
		- Essa classe deverá possuir um método chamado render, esse método terá o objetivo de gerar o código HTML do formulário, baseado nos campos adicionados anteriormente.
