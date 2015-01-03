<?php include"head.php"; ?>

<header class="mainHeader">
    <div class="siteTitle">
        <?php if ( is_home() ){ echo"<h1>"; } else { echo"<h3>"; }?>
            <a href="/" title="Eaten by Monsters homepage" rel="home">Eaten by Monsters</a>
        <?php if ( is_home() ){ echo"</h1>"; } else { echo"</h3>"; }?>
    </div>
</header>