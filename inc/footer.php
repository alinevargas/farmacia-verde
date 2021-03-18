<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<div class="footer">


    <?php
        include_once "classes/sobre_nos.class.php";
        $sobre = new Sobre_nos;
        $sobrenos= array();
        $id= 3;

        echo"<p class='titulo' style='color:white;font-size: 25px;' align='center'>Farmácia Verde Cuidado Natural </p>";

        $sobrenos=$sobre->selecionar($id);
        echo"<div class='icon'align='center'>";
        echo"<p class='titulo' style='color:white; margin-right:10 px; font-size: 22px;'align='center'>Siga nossas redes sociais</p>";

        if(!empty($sobrenos)){
            foreach ($sobrenos as $nos) {
                
                
                if($nos->getYoutube()!= null){
                    echo"<i class='fab fa-youtube'> ".$nos->getYoutube()." </i><br>";
                }
                if($nos->getFace()!= null){
                    echo"<i class='fab fa-facebook'>".$nos->getFace()."</i><br>";            
                }
            
                echo"<i class='fab fa-instagram'>".$nos->getInsta()."</i><br></div>";
            }
        }
    ?>
</div>
</body>
</html>