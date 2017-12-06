<?php
    if(isset($_SESSION['user']) && $_SESSION['user']!=null){
        ?>
        <div id="title-card" class="content card">
            <h1 class="title wide"> Benvenuto</h1>
        </div>
        <?php
	}
	else{
		
		header("Location: http://". $_SERVER['HTTP_HOST']."/error.php");
		exit();
	}

?>