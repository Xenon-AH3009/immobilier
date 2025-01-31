<section>    
    <div class="row">
        <?//=$_SESSION['client_habitation'];?>
        <?php foreach($list as $habitation) {?>
            <div class="col-xs-6 col-md-3">
                <a href="<?= $base_url ?>/details/<?= $habitation['id_habitation'];?>" class="thumbnail">
                    <img src="<?=$habitation['photo_url']?>" alt="...">
                </a>
            </div>
        <?php }?>
        <a href="<?=$base_url?>/deconnect">deconnection</a>
    </div>
</section>