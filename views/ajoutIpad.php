<title>Formulaire D'ajout D'Ipad</title>

<!-- Formulaire d'ajout d'un iPad -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-8 col-10 my-5 p-4 bg-white rounded-lg shadow-lg">
            <h1 class="text-center mb-4">Formulaire d'Ajout d'Ipad</h1>
            <form action="index.php?uc=historique&action=ajouterIpad" method="POST">
                <br><br>

                <!-- Cp de l'agent Obligatoire-->
                <div class="form-group">
                    <input type="text" class="form-control" id="cp" name="cp" maxlength="11" placeholder="Cp de l'Agent" required>
                </div>

                <!-- Nom de l'agent Obligatoire-->
                <div class="form-group">
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom de l'Agent" required>
                </div>

                <!-- Prenom de l'agent Obligatoire-->
                <div class="form-group">
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom de l'Agent" required>
                </div>

                <!-- Affectation de l'Agent Obligatoire -->
                <div class="form-group">
                    <label for="affectation">Affectation :</label>
                    <select class="form-control" id="affectation" name="affectation" required>
                        <option value="LigneN&U">Ligne N&U</option>
                        <option value="LigneC">Ligne C</option>
                    </select>
                </div>

                <!-- Checkbox si l'Ipad est tjr lié a un comte ICloud -->
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="icloud" name="icloud">
                        <label class="form-check-label" for="icloud">
                            Cochez si l'iPad est lié à un compte iCloud
                        </label>
                    </div>
                </div>

                <!-- Checkbox si l'Ipad possède un code de Déverouillage -->
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="codeDev" name="codeDev">
                        <label class="form-check-label" for="codeDev">
                            Cochez si l'iPad possède un code de dévérouillage
                        </label>
                    </div>
                </div>

                <!-- Date Reception (Obligatoire) et Date Attribution de l'Ipad -->
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="dateReception">Date de réception :</label>
                        <input type="date" class="form-control" id="dateReception" name="dateReception" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="dateAttribution">Date d'attribution :</label>
                        <input type="date" class="form-control" id="dateAttribution" name="dateAttribution">
                    </div>
                </div>

                <!-- Date de début et de fin de réparation -->
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="debutRep">Début de réparation :</label>
                        <input type="date" class="form-control" id="debutRep" name="debutRep" placeholder="jj/mm/aaaa">
                    </div>
                    <div class="col-sm-6">
                        <label for="finRep">Fin de réparation :</label>
                        <input type="date" class="form-control" id="finRep" name="finRep" placeholder="jj/mm/aaaa">
                    </div>
                </div>

                <!-- Checkbox si l'Ipad est réparable -->
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="nonReparable" name="nonReparable" value="1">
                    <label class="form-check-label" for="nonReparable">Non réparable</label>
                </div>

                    <button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button>
                
            </form>
        </div>
    </div>
</div>



                    



