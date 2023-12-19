// Script.js pour le tri des colonnes de tableau
$(document).ready(function () {
  // Rend chaque en-tête de colonne cliquable
  $("#maTable th.sortable").click(function () {
    var table = $(this).parents("table").eq(0);
    var rows = table
      .find("tr:gt(0)")
      .toArray()
      .sort(comparer($(this).index()));
    this.asc = !this.asc;
    if (!this.asc) {
      rows = rows.reverse();
    }
    for (var i = 0; i < rows.length; i++) {
      table.append(rows[i]);
    }

    // Ajoute la classe active à l'en-tête de colonne active et supprime la classe active de tous les autres en-têtes de colonne
    table.find("th.sortable").removeClass("active");
    $(this).addClass("active");
  });

  // Fonction de comparaison pour trier les colonnes
  function comparer(index) {
    return function (a, b) {
      var valA = getCellValue(a, index);
      var valB = getCellValue(b, index);
      return $.isNumeric(valA) && $.isNumeric(valB)
        ? valA - valB
        : valA.localeCompare(valB);
    };
  }

  // Fonction pour obtenir la valeur d'une cellule de tableau
  function getCellValue(row, index) {
    return $(row).children("td").eq(index).text();
  }

  function filterTable(searchTerm) {
    // Supprime les espaces de début et de fin
    searchTerm = $.trim(searchTerm);
    // Ignorer la casse (majuscules / minuscules)
    searchTerm = searchTerm.toLowerCase();
    // Parcours des lignes de la table
    $("#maTable tbody tr").each(function () {
      var currentRow = $(this);
      var cpAgent = currentRow.find("td:eq(1)").text().toLowerCase();
      // Masquer la ligne si la valeur du cp_Agent ne correspond pas à la recherche
      if (cpAgent.indexOf(searchTerm) === -1) {
        currentRow.hide();
      } else {
        currentRow.show();
      }
    });
  }

  // Appeler la fonction de filtrage à chaque changement dans le champ de recherche
  $("#search-input").on("input", function () {
    filterTable($(this).val());
  });
});
