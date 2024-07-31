<div id="equipment-fields">
    @if ($type === 'ordinateur')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="libelle_materiel" class="form-label">Libellé matériel</label>
                <input type="text" class="form-control" id="libelle_materiel" name="libelle_materiel" placeholder="Libellé matériel">
            </div>
            <div class="col-md-6 mb-3">
                <label for="nom_ordinateur" class="form-label">Nom Ordinateur</label>
                <input type="text" class="form-control" id="nom_ordinateur" name="nom_ordinateur" placeholder="Nom Ordinateur">
            </div>
            <div class="col-md-6 mb-3">
                <label for="compte_utilisateur" class="form-label">Compte utilisateur</label>
                <input type="text" class="form-control" id="compte_utilisateur" name="compte_utilisateur" placeholder="Compte utilisateur">
            </div>
            <!-- Ajoutez d'autres champs spécifiques aux ordinateurs -->
        </div>
    @elseif ($type === 'imprimante')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="modele_imprimante" class="form-label">Modèle Imprimante</label>
                <input type="text" class="form-control" id="modele_imprimante" name="modele_imprimante" placeholder="Modèle Imprimante">
            </div>
            <div class="col-md-6 mb-3">
                <label for="type_impression" class="form-label">Type d'impression</label>
                <input type="text" class="form-control" id="type_impression" name="type_impression" placeholder="Type d'impression">
            </div>
            <!-- Ajoutez d'autres champs spécifiques aux imprimantes -->
        </div>
    @elseif ($type === 'scanner')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="modele_scanner" class="form-label">Modèle Scanner</label>
                <input type="text" class="form-control" id="modele_scanner" name="modele_scanner" placeholder="Modèle Scanner">
            </div>
            <div class="col-md-6 mb-3">
                <label for="resolution_optique" class="form-label">Résolution Optique</label>
                <input type="text" class="form-control" id="resolution_optique" name="resolution_optique" placeholder="Résolution Optique">
            </div>
            <!-- Ajoutez d'autres champs spécifiques aux scanners -->
        </div>
    @elseif ($type === 'autre')
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="autre_description" class="form-label">Description</label>
                <textarea class="form-control" id="autre_description" name="autre_description" placeholder="Description"></textarea>
            </div>
            <!-- Ajoutez d'autres champs spécifiques aux autres équipements -->
        </div>
    @endif
</div>
