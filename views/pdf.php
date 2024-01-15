	<style>
		th,
		tr,
		td {
			max-width: 100%;
			border: solid 2px black;
			margin-left: 1px;
			text-align: center;
		}

		td {
			color: green;
		}


		h1 {
			text-align: center;
		}
	</style>

	<h1>Récapitulatif des ipad</h1>
	<table>
		<thead>
			<th>CP</th>
			<th>NOM</th>
			<th>Résidence</th>
			<th>inc</th>
			<th>code RG</th>
			<th>Mytem</th>
			<th>date Demande</th>
			<th>type Demande</th>
			<th>type Materiel</th>
			<th>panne</th>
			<th>observation</th>
			<th>icloud</th>
			<th>code Dev</th>
			<th>imei_mat_defec</th>
			<th>imei_remp</th>
		</thead>
		<tbody>
			<?php foreach ($ipads as $ipad) : ?>
				<tr>
					<td><?= $ipad['cp_Agent'] ?></td>
					<td><?= $ipad['nom'] ?></td>
					<td><?= $ipad['residence'] ?></td>
					<td><?= $ipad['inc'] ?></td>
					<td><?= $ipad['Code_RG'] ?></td>
					<td><?= $ipad['mytem'] ?></td>
					<td><?= $ipad['date_demande'] ?></td>
					<td><?= $ipad['type_demande'] ?></td>
					<td><?= $ipad['type_materiel'] ?></td>
					<td><?= $ipad['type_panne'] ?></td>
					<td><?= $ipad['observation'] ?></td>
					<td><?= $ipad['Icloud'] ?></td>
					<td><?= $ipad['CodeDev'] ?></td>
					<td><?= $ipad['imei'] ?></td>
					<td><?= $ipad['imei_remp'] ?></td>
				</tr>

			<?php endforeach;  ?>
		</tbody>
	</table>