<?php include('header.php') ?>
<div class="ubicaciones">
	<div class="container">
		<div class="row productos title-margin">
			<div class="col-sm-4 v-mid"><hr></div>
			<div class="col-sm-4"><h1 class="section-heading center">Ubicaciones</h1></div>
			<div class="col-sm-4 v-mid"><hr></div>
		</div>
		<div class="row center spacing">
			<?php $ubicacionesArray = CFS()->get('ubicaciones_array'); ?>			  
			<?php $arrayLength = count($ubicacionesArray); ?>
			<?php $addborder = 1;			
			$rows = floor($arrayLength/3);			
			$residual = $arrayLength%3;
			//echo $arrayLength.' '.$rows.' '.$residual;
			if($residual==0&&$rows>1){
				//echo 'enter';
				$cities=($arrayLength-3);
				//echo $cities;
			} ?>
			<?php for($i = 0; $i < $arrayLength; $i++) { ?>
			<?php if(($i == $cities) && ($i == $addborder)) { $cities+=1; ?>
				<div class="col-sm-4 item borders">
			<?php } else if ($i == $cities) { $cities+=1; ?>
				<div class="col-sm-4 item">
			<?php } else if($i == $addborder) { $addborder+=3; ?> 
			<div class="col-sm-4 item borders border-bottom">
			<?php } else { ?>
			<div class="col-sm-4 item border-bottom">
			<?php } ?>	
				<img src="<?php echo $ubicacionesArray[$i]['imagen_ciudad'] ?>" alt="<?php echo $ubicacionesArray[$i]['nombre_ciudad'] ?>">
				<h4 class="city"><?php echo $ubicacionesArray[$i]['nombre_ciudad'] ?></h4>
				<p><?php echo $ubicacionesArray[$i]['info_ciudad'] ?></p>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php include('footer.php') ?>