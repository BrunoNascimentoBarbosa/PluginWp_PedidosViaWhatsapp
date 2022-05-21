<?php
/** 
 * Plugin Name: Pedidos
 * Plugin Url: #
 * Description: Esse plugin possibilita o cliente fazer um pedido via formulário em seguinda é redirecionado para o whatsapp
 * Version:1.0
 * Author: Bruno Nascimento
 * Author url: #
*/

#Função para enviar o pedido via whatsapp.

 
function pedido(){ 
   $produto = $_POST['produto'];
   $obs = $_POST['pedido'];
   $local = $_POST['local'];
   $nome = $_POST['nome'];
   $telefone = $_POST['telefone'];
   $telefoneDesdino = 21974561726;
    
   
        
   echo "<h3>Faça o seu pedidos via whatsapp é simple e rápido.</h3>";
     
   $texto_whatsapp = "Olá meu nome é " .$nome. "Meu telefone é: ".$telefone.".Quero fazer um pedido do *produto*: " .$produto. ". Entrega é no endereço: " .$local. "  *Observação*: " .$obs ;

   $mgs_whats = str_replace (' ','%20',$texto_whatsapp);
 

   $action_url = "https://api.whatsapp.com/send?phone=" .$telefoneDesdino. "&text=$mgs_whats";
                    

    ?>
 

    <?php if(isset($_POST['submit'])){?>

    <script type="text/javascript">
    window.location = "<?php echo $action_url; ?>";
    </script>
    <?php }  ?>
    


    <form action="" method="post">

		<label for="">Qual produto você deseja? </label>
    <select name="produto" id="">
      <option value="Produto 1">Produto 1 </option>
      <option value="Produto 2">Produto 2 </option>
      <option value="Produto 3">Produto 3 </option>
      <option value="Produto 4">Produto 4 </option>
    </select>
		<label for="story">Alguma observação no pedido?</label>

       <input type="text"id="story" name="pedido"
          rows="4" cols="50" placeholder="Ex: Preciso da entrega com urgência." >  
    </input>
       <br>

 
        <label for="">Qual o local de entrega do seu pedido? </label>
        <input type="text" name="local" placeholder="Rua Dr Andre Barbosa N 35">
        <br>
             
      
        
        <label for="" > Qual o seu nome ? </label>
        <input type="text" name="nome">  
        <br>

        <label> Qual o seu whatsapp?</label>
        <input type="tel" name="telefone" size="40" placeholder="(00)00000-0000" data-mask="(__)_____-____">
        <br>
        <input type="submit" name="submit" value="Enviar o pedido">

    </form>

  <?php 
 
}

add_shortcode('solicitar_pedido','pedido'); 
 
