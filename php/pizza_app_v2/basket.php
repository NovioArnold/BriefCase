<?php include 'templates/html_template.php' ?>
<body>

    <ul class="bestelling">
        <li class="gegevens">Ordernummer: <?php $orderlijst[0]['Ordernummer']?></li>
        <li class="gegevens">Besteldatum: <?php $orderlijst[0]['Datum']?></li>
        <li class="gegevens">Naam:        <?php $orderlijst[0]['Naam']?></li>
        <li class="gegevens">Adres:       <?php $orderlijst[0]['Adres']?></li>
        <li class="gegevens">Woonplaats:  <?php $orderlijst[0]['Woonplaats']?></li>
        <li class="gegevens">Postcode:    <?php $orderlijst[0]['Postcode']?></li>        
        <li class="gegevens">Bezorgen:    <?php $orderlijst[0]['Bezorgen']?></li>
        
    </ul>
</body>
