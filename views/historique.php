<title>Informations iPad</title>

<script src = "https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
  th.sortable.active {
    background-color: #f8f9fa;
 }   
    th.sortable {
  cursor: pointer;
  padding: 8px 8px;
  background-color: #fff;
  border: 1px solid #ddd;

}
th.sortable:hover {
  background-color: #f8f9fa;
} 

.icloud.zero,
.code-dev.zero {
  background-color: red;
}
.icloud.one,
.code-dev.one {
  background-color: green;
}

.nonRep.one {
    background-color: red;
}
.nonRep.zero{
    background-color: green;
}
</style>

<script type="text/javascript">
$(function() {
    // Tableau des options de l'autocomplétion
    var availableTags = [
        
    ];
    // Initialisation de l'autocomplétion
    $( "#tags" ).autocomplete({
        source: availableTags,
    });
    // Filtrage dynamique de la table
    $("#tags").on("input", function() {
        var filter = $("#tags").val().toLowerCase();
        $('.list_treatment > tbody > tr').each(function() {
            var cp = $(this).find(".cp_Agent").html().toLowerCase();
            if (cp.includes(filter)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});

 // Script.js pour le tri des colonnes de tableau
 $(document).ready(function() {
    // Rend chaque en-tête de colonne cliquable
    $('#maTable th.sortable').click(function() {
      var table = $(this).parents('table').eq(0)
      var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
      this.asc = !this.asc
      if (!this.asc) {rows = rows.reverse()}
      for (var i = 0; i < rows.length; i++) {table.append(rows[i])}
      
      // Ajoute la classe active à l'en-tête de colonne active et supprime la classe active de tous les autres en-têtes de colonne
      table.find('th.sortable').removeClass('active');
      $(this).addClass('active');
    })
    
    // Fonction de comparaison pour trier les colonnes
    function comparer(index) {
      return function(a, b) {
        var valA = getCellValue(a, index)
        var valB = getCellValue(b, index)
        return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.localeCompare(valB)
      }
    }
    
    // Fonction pour obtenir la valeur d'une cellule de tableau
    function getCellValue(row, index) {
      return $(row).children('td').eq(index).text()
    }

    function filterTable(searchTerm) {
      // Supprime les espaces de début et de fin
      searchTerm = $.trim(searchTerm);
      // Ignorer la casse (majuscules / minuscules)
      searchTerm = searchTerm.toLowerCase();
      // Parcours des lignes de la table
      $('#maTable tbody tr').each(function() {
          var currentRow = $(this);
          var cpAgent = currentRow.find('td:eq(1)').text().toLowerCase();
          // Masquer la ligne si la valeur du cp_Agent ne correspond pas à la recherche
          if(cpAgent.indexOf(searchTerm) === -1) {
              currentRow.hide();
          } else {
              currentRow.show();
          }
      });
  }

  // Appeler la fonction de filtrage à chaque changement dans le champ de recherche
  $('#search-input').on('input', function() {
      filterTable($(this).val());
  });

})


</script>

<div class="card container cover w-100">
    <br>
    <h1 class="mb-4">Informations iPad</h1>

    <br><br>
    <table class="search">
        <tbody>
            <div class="form-group row">
                <!-- Formulaire de sélection du nombre d'iPad à afficher -->
                <div class="col-md-4">
                    <form action="index.php?uc=historique&action=historique" method="POST" id="ipp-form">
                        <select class="form-control w-auto" name="ipp" onchange="document.getElementById('ipp-form').submit()">
                            <option value="5" <?= ($ipp == 5) ? "selected" : "" ?>>5</option>
                            <option value="10" <?= ($ipp == 10) ? "selected" : "" ?>>10</option>
                            <option value="20" <?= ($ipp == 20) ? "selected" : "" ?>>20</option>
                            <option value="50" <?= ($ipp == 50) ? "selected" : "" ?>>50</option>
                            <option value="100" <?= ($ipp == 100) ? "selected" : "" ?>>100</option>
                        </select>
                    </form>
                </div>

                <!-- Formulaire de recherche par cp dynamique -->
                <div class="col-md-4">
                    <input id="tags" type="text" name="text" class="form-control" placeholder="CP...">
                </div>

                <!-- Bouton d'ajout d'un iPad -->
                <div class="col-md-4 d-flex justify-content-end">
                    <a href="index.php?uc=historique&action=ajouterIpad" class="btn btn-primary">Ajouter un IPad</a>
                </div>
            </div>
        </tbody>
    </table>

    <!-- Tableau des iPads -->
    <form action="index.php?uc=historique&action=supprimerIpad" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer les iPad sélectionnés ?');">   
        <table id="maTable" class="table list_treatment table-striped">
            <thead>
                <tr>
                    <th><input type="checkbox" id="check-all"></th>
                    <th class="sortable">CP</th>
                    <th class="sortable">Affectation</th>
                    <th class="sortable icloud">Compte ICloud</th>
                    <th class="sortable code-dev">Code de Dévérouillage</th>
                    <th class="sortable">Date Réception</th>
                    <th class="sortable">Date Attribution</th>
                    <th class="sortable">Début Réparation</th>
                    <th class="sortable">Fin Réparation</th>
                    <th class="sortable nonRep">Non Réparable</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lesIpad as $ipad):?>
                    <tr>
                        <!-- Checkbox pour sélectionner les iPad à supprimer -->
                        <td><input type="checkbox" class="check-ipad" name="idsIpad[]" value="<?= $ipad['id_ipad'] ?>"></td>
                        <td class="cp_Agent"><?= $ipad['cp_Agent'] ?></td>
                        <td><?= $ipad['affectation'] ?></td>
                        <td class="<?php echo $ipad['Icloud'] == 0 ? 'icloud zero' : 'icloud one'; ?>"><?php echo $ipad['Icloud']; ?></td>
                        <td class="<?php echo $ipad['CodeDev'] == 0 ? 'code-dev zero' : 'code-dev one'; ?>"><?php echo $ipad['CodeDev']; ?></td>
                        <td><?= $ipad['date_Reception'] ?></td>
                        <td><?= $ipad['date_Attribution'] ?></td>
                        <td><?= $ipad['debut_Rep'] ?></td>
                        <td><?= $ipad['fin_Rep'] ?></td>
                        <td class="<?php echo $ipad['non_reparable'] == 0 ? 'nonRep zero' : 'nonRep one'; ?>"><?= $ipad['non_reparable'] ?></td>
                        <!-- bouton qui permet de modifier l'information de l'ipad et assimiler ceci à un logo -->
                        <td><a href="index.php?uc=historique&action=modifierIpad&id=<?= $ipad['id_ipad'] ?>" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a></td>
                    </tr>
            

                <?php endforeach; ?>
            </tbody>
        </table>
        <script>
            // Cocher/décocher toutes les checkbox, JS vanilla
            const checkAll = document.querySelector('#check-all');
            const checkIpad = document.querySelectorAll('.check-ipad');
            checkAll.addEventListener('click', () => {
                checkIpad.forEach(check => check.checked = checkAll.checked);
            });
        </script>
            
        <!-- Bouton de suppression des iPad sélectionnés -->
        <div class="d-flex justify-content-end">
            <input type="submit" class="btn btn-danger" name="supprimer" value="Supprimer">
        </div>
    </form>

    <!-- Pagination -->
    <!-- Ici, nous utilisons http_build_query() pour générer une chaîne de requête à partir de la combinaison des paramètres GET actuels avec le nouveau paramètre page. 
    Cela permet de conserver les autres paramètres GET (par exemple, uc=historique et action=historique) lors de la navigation entre les pages.
    Le array_merge() est utilisé pour ajouter le nouveau paramètre page à la liste des paramètres GET existants, en écrasant la valeur de page s'il est déjà présent. -->
    <nav>
        <ul class="pagination justify-content-center">
            <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
            <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                <a href="./?<?= http_build_query(array_merge($_GET, array("page" => $currentPage - 1))) ?>" class="page-link">Précédente</a>
            </li>

            <?php for ($page = 1; $page <= $pages; $page++): ?>
                <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                    <a href="./?<?= http_build_query(array_merge($_GET, array("page" => $page))) ?>" class="page-link"><?= $page ?></a>
                </li>
            <?php endfor ?>


            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                <a href="./?<?= http_build_query(array_merge($_GET, array("page" => min($currentPage + 1, $pages)))) ?>" class="page-link">Suivante</a>
            </li>


        </ul>
    </nav>
</div>

       

