<section>
    <div class="row">
        <?php foreach($list as $habitation){?>
            <img src="<?=$habitation['photo_url']?>" alt="...">
        <?php }?>
        <?= $list[0]['description'];?>
        <?= $list[0]['nomtype'];?>
        <?= $list[0]['nomquartier'];?>
        <?= $list[0]['nbre_chambre'];?>
        <?= $list[0]['loyer_par_jour'];?>
    </div>
    <div class="reservation">
        <?php if(isset($feedback)) {echo $feedback;}?>
        <form action="<?= $base_url ?>/insertionReservation/<?= $list[0]['id_habitation']?>" method="post">
            <input type="date" name="datedebut" id="">
            <input type="date" name="datefin" id="">
            <button type="submit">Reserver</button>
        </form>
    </div>
</section>