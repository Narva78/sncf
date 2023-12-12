<!-- Page de Statistique -->

  <!-- Inclure les bibliothèques de visualisation de données -->
  <!-- lié au style.css -->
    <link rel="stylesheet" href="style/style.css">

    <!-- lié au bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<!-- jQuery UI -->
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/smoothness/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>


	 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js"></script>


<style>
td.table-cell {
    width: 50%;
  }

</style>
<br>
<h1 class="mb-4">Statistique</h1>
  <br>
<div class = "row justify-content-center">
  <div class="col-md-3">
      <div class="card-body table-responsive">
        <table class="table table-striped">
          <!-- Affichage moyenne 3 dernier mois -->
          <tbody class="text-center">
            <tr>
              <td class="table-cell">
                <b><p>Non Réparable</p></b>
              </td>
              <td class="table-cell">
                <p><b><?= $nonRep ?></b></p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card-body table-responsive">
        <table class="table table-striped">
          <!-- Affichage moyenne 3 dernier mois -->
          <tbody class="text-center">
            <tr>
              <td class="table-cell">
                <b><p>En Réparation</p></b>
              </td>
              <td class="table-cell">
                <p><b><?= $enRep ?></b></p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card-body table-responsive">
        <table class="table table-striped">
          <!-- Affichage moyenne 3 dernier mois -->
          <tbody class="text-center">
            <tr>
              <td class="table-cell">
                <b><p>En Attente</p></b>
              </td>
              <td class="table-cell">
                <p><b><?= $att ?></b></p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
</div>
  <br>
  <div class = "row">
    <!-- Le temps moyen de réparation d'un Ipad -->
    <div class="col-md-4">
      <div class="card container">
        <br>
        <h5 class="card-title text-center">Temps moyen de réparation d'un iPad</h5>
        <br>
        <div class="card-body table-responsive">
          <table class="table table-striped">
            <thead class="text-center">
              <tr>
                <td class="table-cell">
                  <p><b>Temps</b></p>
                </td>
                <td class="table-cell">
                  <p><b>Nb jours</b></p>
                </td>
              </tr>
            </thead>

            <!-- Affichage moyenne 3 dernier mois -->
            <tbody class="text-center">
              <tr>
                <td class="table-cell">
                  <p>3 mois</p>
                </td>
                <td class="table-cell">
                  <p><?= $moyenneLast3Months ?> jours</p>
                </td>
              </tr>

              <!-- Affichage moyenne 6 dernier mois -->
              <tr>
                <td class="table-cell">
                  <p>6 mois</p>
                </td>
                <td class="table-cell">
                  <p><?= $moyenneLast6Months ?> jours</p>
                </td>
              </tr>

              <!-- Affichage moyenne 12 dernier mois -->
              <tr>
                <td class="table-cell">
                  <p>1 an</p>
                </td>
                <td class="table-cell">
                  <p><?= $moyenneLast12Months ?> jours</p>
                </td>
              </tr>

              <!-- Affichage moyenne all time -->
              <tr>
                <td class="table-cell">
                  <p>All Time</p>
                </td>
                <td class="table-cell">
                  <p><?= $moyenneAllTime ?> jours</p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>


    <!-- Temps Moyen d'Attribution d'un Ipad -->
    <div class="col-md-4">
      <div class="card container">
        <br>
        <h5 class="card-title text-center">Temps moyen d'attribution d'un iPad</h5>
        <br>
        <!-- tableau moyenne 3 mois en fonction des lignes -->
        <div class="card-body table-responsive">
          <table class="table table-striped">
            <thead class="text-center">
              <tr>
                <td class="table-cell"><b>Temps</b></th>
                <td class="table-cell"><b>Nb jours</b></th>
              </tr>
            </thead>
            
            <!-- Affichage moyenne 3 dernier mois -->
            <tbody class="text-center">
              <tr>
                <td class="table-cell">3 mois</th>
                <td class="table-cell"><?= "$moyenneAttribLast3Months" ?> jours</th>
              </tr>

              <!-- Affichage moyenne 6 dernier mois -->
              <tr>
                <td class="table-cell">6 mois</th>
                <td class="table-cell"><?= "$moyenneAttribLast6Months" ?> jours</th>
              </tr>

              <!-- Affichage moyenne 12 dernier mois -->
              <tr>
                <td class="table-cell">1 an</th>
                <td class="table-cell"><?= "$moyenneAttribLast12Months" ?> jours</th>
              </tr>

              <!-- Affichage moyenne all time -->
              <tr>
                <td class="table-cell">All Time</th>
                <td class="table-cell"><?= "$moyenneAttribAllTime" ?> jours</th>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Le nombre d'iPads réparés/non réparables -->
    <div class="col-md-4">
      <div class="card container">
        <!-- Nombre d'ipads attribués par ligne -->
        <br>
        <h5 class="card-title text-center">Nombre d'Attributions</h5>
      
        <!-- tableau nombre d'ipads attribués par ligne -->
        <div class="card-body table-responsive">
          <table class="table table-striped">
              <thead class="text-center">
                  <tr>
                      <th scope="col">Temps</th>
                      <th scope="col">Ligne C</th>
                      <th scope="col">N&amp;U</th>
                  </tr>
              </thead>
              <tbody class="text-center">
                  <tr>
                      <td>3 mois</td>
                      <td><?= $nbIpad3MonthsLigneC ?></td>
                      <td><?= $nbIpad3MonthsLigneNU ?></td>
                  </tr>
                  <tr>
                      <td>6 mois</td>
                      <td><?= $nbIpad6MonthsLigneC ?></td>
                      <td><?= $nbIpad6MonthsLigneNU ?></td>
                  </tr>
                  <tr>
                      <td>1 an</td>
                      <td><?= $nbIpad12MonthsLigneC ?></td>
                      <td><?= $nbIpad12MonthsLigneNU ?></td>
                  </tr>
                  <tr>
                      <td>All Time</td>
                      <td><?= $nbIpadAllTimeLigneC ?></td>
                      <td><?= $nbIpadAllTimeLigneNU ?></td>
                  </tr>
              </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>

