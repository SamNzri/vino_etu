<div class="cellier">
  <?php foreach ($data as $cle => $bouteille) { ?>
    
    <div class="bouteille" data-quantite="">
      <div class="img">
        <img src="https:<?php echo $bouteille['image'] ?>">
      </div>
      <div class="description">
      <form method="POST" action="?requete=modifierBouteilleCellier&id_bouteille_cellier=<?php echo $bouteille['id_bouteille_cellier'] ?>">
        <p class="nom">Nom : <?php echo $bouteille['nom'] ?></p>
        <p class="quantite">Quantité : <?php echo $bouteille['quantite'] ?></p>
        <p class="pays">Pays : <?php echo $bouteille['pays'] ?></p>
        <p class="type">Type : <?php echo $bouteille['type'] ?></p>
        <p class="millesime">Millesime : <?php echo $bouteille['millesime'] ?></p>
        <p><a href="<?php echo $bouteille['url_saq'] ?>">Voir SAQ</a></p>
      </div>
      <div class="options" data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>">
      <button class='btnModifier' type="submit">Modifier</button>
        <button class='btnAjouter'>Ajouter</button>
        <button class='btnBoire'>Boire</button>
        <input type="hidden" name="id_bouteille_cellier" value="<?php echo $bouteille['id_bouteille_cellier'] ?>">
        </form>
      </div>
    </div>
  <?php } ?>	
</div>
