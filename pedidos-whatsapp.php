<?php
/** 
 * Plugin Name: Pedidos
 * Plugin Url: #
 * Description: Esse plugin possibilita o cliente fazer um pedido via formulario em seguinda é redirecionado para o whatsapp
 * Version:1.0
 * Author: Bruno Nascimento
 * Author url: #
*/

#Função para enviar o pedido via whatsapp.
function pedido(){ 
    $pedido = $_POST['pedido'];
    $local = $_POST['local'];
    $orcamento = $_POST['valor'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];


    
    echo "Tela de pedidos";
     
    $texto_whatsapp = "Olá meu nome é *" . $nome . "*, desejo fazer um pedido:"."\n " .$pedido . "o local de entre é: *". $local. "* *Tentativas*: "." *O prestado *:".".Tenho um orçamento de:*".$orcamento. "* meu telefone é: *".$telefone."*" ;

    $mgs_whats = str_replace (' ','%20',$texto_whatsapp);

    $action_url = "https://api.whatsapp.com/send?phone=5521974561726&text=$mgs_whats";
   

    ?>
 

    <?php if(isset($_POST['submit'])){?>

    <script type="text/javascript">
    window.location = "<?php echo $action_url;?>";
    </script>
    <?php }  ?>
    


    <form action="" method="post">

		
		<label for="story">Detalhe o seu pedido</label>

       <textarea id="story" name="pedido"
          rows="5" cols="33"> Ex: Quero uma pizza.
       </textarea>
       <br>


        <label for="">Qual o local de entrega do seu pedido? </label>
        <input type="text" name="local">
        <br>
             
        

         
        <br>

        <label for="">Qual o orçamento disponível para o pedido? (R$)  </label>
        <input type="number" name="valor" id="">
        <br>
        
        <label for="" > Qual o seu nome ? </label>
        <input type="text" name="nome">  
        <br>

        <label> Através de qual whatsapp podemos entrar em contato?</label>
        <input type="tel" name="telefone" size="40" placeholder="(00)00000-0000" data-mask="(__)_____-____">
        <br>
        <input type="submit" name="submit" value="Enviar o pedido">

    </form>

  <?php 

}
add_shortcode('solicitar_pedido','pedido'); 