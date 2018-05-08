<?php 
setlocale( LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese' );
date_default_timezone_set( "America/Sao_paulo" );
$cStatus        = array("AGENDADO","CONFIRMADO","FALTOU","DESMARCOU","CONCLUIDO");
?>

<ul class="nav nav-tabs">
    <?php 
    if($_GET['user']){
        $user ="&user=".$_GET['user'];
    }
    if($tipoUser->permissoes_id==1 && $this->permission->checkPermission($this->session->userdata('permissao'), 'eAgenda')){?>
    <div class="col-lg-2"  >
        <select class="form-control form-control-sm" name="usuarios_id" id="link" onchange="javascript:handleSelect(this)">
            
            <option ></option>
            <?php 
            foreach ($usuarios as $usuario) {
               
                $dateAtual = date('Y-m-d');
                $base=base_url();
                $idUser=$usuario->idUsuarios+1234;
    	        echo "<option value='{$base}index.php/agenda?filial={$filial}&data={$dateAtual}&user={$idUser}' $s>{$usuario->nome}</option>" . PHP_EOL;
            } ?>
        </select>
    </div>

    <?php }?>
    
    <li class="nav-item" id="tabDia"><a href="#dia"  class="nav-link active" data-toggle="tab"><i class="icon-list-alt"></i> Dia</a></li>
    <li class="nav-item"  >  <a href="#semana"  class="nav-link" data-toggle="tab"> Semana</a></li>
	
     
  <?php if($usuarios){
        foreach ($usuarios as $usuario) {
            if($usuario->idUsuarios+1234 == $_GET['user']){
                echo "<div class='col-lg-5'><center><h3 style='color: #fff;'>{$usuario->nome}</h3></center></div>";
            }
        }
    }
    ?>
    
</ul>


  <div class="tab-content" >
   <!-- Início de Tab dia -->
    <div role="tabpanel" class="tab-pane  active" id="dia">
       <?php if($userAgendas==true){?>  
       <div class="row">
       
       <div class="col-12">
        	<h1>
        		<center>	
        		  <?php if ($custom_error != '') {
                    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
                } ?>
        		<?php  if($_GET['data']==false){
        		   $dataC = $data;
        		   echo  utf8_encode(strftime('%a, %d de %b de %Y', strtotime($dataC)));   
        		      
        		}else{  
        		        $dataC = $_GET['data'];
        		         echo  utf8_encode(strftime('%a, %d de %b de %Y', strtotime($dataC))); 
        		        
        		} 
        			   
        	             if( utf8_encode(strftime('%a', strtotime($dataC)))== $userAgendas->domingo){
            		        //hora inicial
            				$horaInicial = new DateTime( $userAgendas->domHrIni  );
            				//hora final
            				$horaFinal = new DateTime( $userAgendas->domHrTer );
            			    $tempo = "PT" . $userAgendas->domTempoAtendimento. "M";
            			    $t =$userAgendas->domTempoAtendimento;
            			 	$h = $horaInicial->format( 'H:i' );
            	        }
            	         if( utf8_encode(strftime('%a', strtotime($dataC)))== $userAgendas->segunda){
            		        //hora inicial
            				$horaInicial = new DateTime( $userAgendas->segHrIni  );
            				//hora final
            				$horaFinal = new DateTime( $userAgendas->segHrTer );
            			    $tempo = "PT" . $userAgendas->segTempoAtendimento. "M";
            			    $t =$userAgendas->segTempoAtendimento;
            			 	$h = $horaInicial->format( 'H:i' );
            	        }
            	         if( utf8_encode(strftime('%a', strtotime($dataC)))== $userAgendas->terca){
            		        //hora inicial
            				$horaInicial = new DateTime( $userAgendas->terHrIni  );
            				//hora final
            				$horaFinal = new DateTime( $userAgendas->terHrTer );
            			    $tempo = "PT" . $userAgendas->terTempoAtendimento. "M";
            			    $t =$userAgendas->terTempoAtendimento;
            			 	$h = $horaInicial->format( 'H:i' );
            	        }
            	         if( utf8_encode(strftime('%a', strtotime($dataC)))== $userAgendas->quarta){
            		        //hora inicial
            				$horaInicial = new DateTime( $userAgendas->quaHrIni  );
            				//hora final
            				$horaFinal = new DateTime( $userAgendas->quaHrTer );
            			    $tempo = "PT" . $userAgendas->quaTempoAtendimento. "M";
            			    $t =$userAgendas->quaTempoAtendimento;
            			 	$h = $horaInicial->format( 'H:i' );
            	        }
            	         if( utf8_encode(strftime('%a', strtotime($dataC)))== $userAgendas->quinta){ 
            		        //hora inicial
            				$horaInicial = new DateTime( $userAgendas->quiHrIni  );
            				//hora final
            				$horaFinal = new DateTime( $userAgendas->quiHrTer );
            			    $tempo = "PT" . $userAgendas->quiTempoAtendimento. "M";
            			    $t =$userAgendas->quiTempoAtendimento;
            			 	$h = $horaInicial->format( 'H:i' );
            	        }
                        if( utf8_encode(strftime('%a', strtotime($dataC)))== $userAgendas->sexta){ 
            		        //hora inicial
            				$horaInicial = new DateTime( $userAgendas->sexHrIni  );
            				//hora final
            				$horaFinal = new DateTime( $userAgendas->sexHrTer );
            			    $tempo = "PT" . $userAgendas->sexTempoAtendimento. "M";
            			    $t =$userAgendas->sexTempoAtendimento;
            			 	$h = $horaInicial->format( 'H:i' );
            	        }
            	        if( utf8_encode(strftime('%a', strtotime($dataC)))== $userAgendas->sabado){ 
            		        //hora inicial
            				$horaInicial = new DateTime( $userAgendas->sabHrIni  );
            				//hora final
            				$horaFinal = new DateTime( $userAgendas->sabHrTer );
            			    $tempo = "PT" . $userAgendas->sabTempoAtendimento. "M";
            			    $t =$userAgendas->sabTempoAtendimento;
            			 	$h = $horaInicial->format( 'H:i' );
            	        }
        		
        			    ?>
        		</center>
        	  </h1>
        	  </div>
                <div class="col-lg-4 col-sm-12">
                    <?php 
                    if($_GET['h']==true){
                        $on= 'active';
                    }
                    if($horaInicial==false){
                        $on= 'active';
                    }
                    ?>

        		
                    <div  id="my-calendar"></div>
                    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aAgenda')) { ?>
   

                    	<ul class="nav nav-tabs col-lg-8 " role="tablist"> 
        		
                    <li class="nav-item <?php echo $on;?>" id="tabDia"><a class="nav-link" href="#dados" data-toggle="tab">Adicionar</a></li>  
                  
                    </ul>
                    <?php } ?>
                     <script type="application/javascript">
                        $(document).ready(function () {
                        $("#my-calendar").zabuto_calendar({
                        year: <?php echo date("Y", strtotime($dataC)) ;?>,
        			    month: <?php echo date("m", strtotime($dataC)) ;?>,
        			    show_previous: true,
        			    cell_border: true,
        			    today: true,
        			    nav_icon: {
            				prev: '<i class="icon-chevron-left"></i>',
            				next: '<i class="icon-chevron-right"></i>'
        			    },
        			    language: "pt"
                        });
                        });
                    </script>
                
                </div> 
            
           
<!-- inicio buscar nome auto complete-->
                <script type="text/javascript">
                    $(document).ready(function(){
                        $(document).on('keydown', '.username', function() {
                            var id = this.id;
                            var splitid = id.split('_');
                            var index = splitid[1];
                            $( '#'+id ).autocomplete({
                                source: function( request, response ) {
                                    $.ajax({
                                        url: "<?php echo base_url();?>index.php/agenda/getDetalhes",
                                        type: 'post',
                                        dataType: "json",
                                        data: {
                                            search: request.term,request:1
                                        },
                                        success: function( data ) {
                                            response( data );
                                        }
                                    });
                                },
                            select: function (event, ui) {
                            $(this).val(ui.item.label); // display the selected text
                            var userid = ui.item.value; // selected id to input
                            // AJAX
                            $.ajax({
                            url: "<?php echo base_url();?>index.php/agenda/getDetalhes",
                            type: 'post',
                            data: {userid:userid,request:2},
                            dataType: 'json',
                            success:function(response){
                                
                                var len = response.length;

                                if(len > 0){
                                    var id = response[0]['id'];
                                    var name = response[0]['name'];
                                    var email = response[0]['email'];
                                    var tel1 = response[0]['tel1'];
                                    var tel2 = response[0]['tel2'];
                                    var mat = response[0]['mat'];

                                    document.getElementById('id_'+index).value = id;
                                   // document.getElementById('name_'+index).value = name;
                                    document.getElementById('email_'+index).value = email;
                                    document.getElementById('tel1_'+index).value = tel1;
                                    document.getElementById('tel2_'+index).value = tel2;
                            
                                }
                                
                            }
                        });

                        return false;
                    }
                });
            });
            
            // Add more
          /*  $('#addmore').click(function(){

                // Get last id 
                var lastname_id = $('.tr_input input[type=text]:nth-child(1)').last().attr('id');
                var split_id = lastname_id.split('_');

                // New index
                var index = Number(split_id[1]) + 1;

                // Create row with input elements
                var html = "<tr class='tr_input'><td><input type='text' class='username' id='username_"+index+"' placeholder='Enter username'></td><td><input type='text' class='name' id='name_"+index+"' ></td><td><input type='text' class='age' id='age_"+index+"' ></td><td><input type='text' class='email' id='email_"+index+"' ></td><td><input type='text' class='salary' id='salary_"+index+"' ></td></tr>";

                // Append data
                $('tbody').append(html);
                
            });*/
        });

    </script>
<!-- fim buscar nome auto complete-->
                
    		    <div class="col-lg-8 col-sm-12">
    		    <?php  if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aAgenda')) { ?>
                    <div  class="tab-pane  <?php echo $on;?>" id="dados">
                        <form id="formAgenda" action="#" method="post">
                            <?php echo($user->idUsuarios);?>
                    			<input type="hidden" name="idAgenda"  value="<?php echo $_GET['idAg']; ?>" >
                    			<input type="hidden" name="idPac" id="id_1" class="id"value="<?php if($_GET['idAg']==true){echo $agendaInfo->idPac;}else{ echo $retorno['idPac'];}?>" >
                    			<input type="hidden"  name="idUsuario" value="<?php echo $_GET['user']-1234; ?>">
                				    
                				    <div class="row" >
                				        <div class="col-sm-2 " >	
                    						    <label for="title">Status</label>
                    						    <select  class="form-control form-control-sm" name="descri">
                    							<?php
                    								echo "<option> $agendaInfo->descri</option>".PHP_EOL;
                    								foreach ($cStatus as $v){
                    									//$s = ($retorno['status'] == $v) ? "selected='selected'":"";
                    									echo "<option value='{$v}' {$s}>{$v}</option>".PHP_EOL;
                    								}
                    							?>
                    					    	</select>
            							</div>
                        				<div class="col-sm-6" >
                    						<label for="title">Cliente</label>
                    						<input type="text" required autocomplete="off"  name="cliente" id='username_1' class="username form-control form-control-sm"  placeholder="Cliente" value="<?php if($_GET['idAg']==true){echo $agendaInfo->cliente;} ?>"  >
                        				</div>
                        				<div class="col-sm-4">
                                            <label for="convenio">Convênio</label>
                                            <input id="convenio" type="text" class="form-control form-control-sm" name="convenio" value="<?php if($_GET['idAg']==true){echo $agendaInfo->convenio;}else{ echo $retorno['convenio'];}?>">
                                        </div>
                			        </div>
                        		    <div class="row" >
                            		    <?php if($_GET['data']==false){
                    					$data;
                    					}else{
                    					$data = $_GET['data'];
                    					}?>
                    					<div class="col-lg-3">	
                        					<label for="from">Data</label>
                        					<input  type='date' required name="dataEv"  class="form-control form-control-sm" value="<?php echo $data;?>"/>
                    					</div>
                    						
                    					<div class="col-lg-2">
                        					<label for="from">Hora</label>
                        					<input type='time' required name="HrIni"  class="form-control form-control-sm" value="<?php echo $_GET['h'];?>">
                    					</div>
                    					<div class="col-lg-7" >	
                							<label for="email">Email</label>
                							<input type="text" required name="email" class="form-control form-control-sm email"  id='email_1'  placeholder="Email" value="<?php if($_GET['idAg']==true){echo $agendaInfo->email;}else{ echo $retorno['email'];}?>">
                
                						</div>
            							
                                    </div>
                				    <div class="row" >
                    				    <div class="col-lg-5">
                                            <label for="cartao">N° Cartão</label>
                                            <input id="cartao" type="text" class="form-control form-control-sm" name="cartao" value="<?php if($_GET['idAg']==true){echo $agendaInfo->convenio;} ?>">
                                        </div>
                    					<div class="col-lg-3" >
                        					<label for="tel1">Telefone 1</label>
                        					<input type="text" required name="tel1" id="tel1_1" class="form-control form-control-sm" placeholder="Telefone 1" value="<?php if($_GET['idAg']==true){echo $agendaInfo->tel1;}else{ echo $retorno['tel1'];}?>">
                    					</div>
        						        <div class="col-lg-3" >	
                    						<label for="tel2">Telefone 2</label>
                    						<input type="text" required autocomplete="off" name="tel2" class="form-control form-control-sm" id="tel2_1" placeholder="Telefone 2" value="<?php if($_GET['idAg']==true){echo $agendaInfo->tel2;} ?>">
                					    </div>
        				            </div>	
    			
    			<div class="col-lg-9" style="margin-top: 2%;"><center>
    	
    			 <button type="submit" class="btn btn-success" id="btnAdicionarProduto" ><i class="icon-ok"></i> Agendar</button>
    			
    				<button type="button" class="btn btn-default btn-sm" onclick="reveal('.panel-body')"><i class="fa fa-times"></i> Cancelar</button>
    				<?php 
    		        if($_GET['idAg']==true){
       					$rest = $_GET['h'];
    					$rest2 = substr( $rest, -1 );
    					$rest3 = $rest2 + 1;
    					$temp = substr( $rest, 0, -1 ) . $rest3;
    					$b=base_url();
    	    	        $link4="{$b}index.php/agenda?filial={$_GET['filial']}&data={$_GET['data']}&h={$temp}{$user}";
    		?>
    				<a class="btn btn-default btn-sm" href="<?php echo $link4 ;?>"><i class="fa fa-plus"></i> Encaixe</a>
    
    				<?php
    				}
    				?></center></div>
					
        		    </form>
    		    </div>
    		    <?php } ?>
            </div>
        </div>
        <?php if($horaInicial!=false){ ?>
        <div class="row" >
            <style type="text/css">
.table td, .table th {
    padding: 5px !important;
}
</style>
            <table class="table table-bordered table-hover  table-striped">
			<thead>
				<tr>
					<th  style=" color: #2A2E67; ">Horário</th>
					<th class="">Descrição</th>
					<th class="">Cliente</th>
					<th class="">Telefone 1 | Telefone 2</th>
					<th class="">Convênio</th>
					<th class="">Controle</th>
				</tr>
			</thead>
			<tbody>
			    <?php 
			    
    		if ( $agenda ) {
    		    	$link4="{$b}index.php/agenda?filial={$_GET['filial']}&data={$_GET['data']}&h={$agenda->HrIni}{$user}&idAg={$agenda->idAgenda}";
	    	        $link5="";
	    	        $link6="location.href=";
	    	        $style = "style='cursor:pointer;'";
	    	        $style1 = "";
    		       if($agenda->idPac==false){
    		            $ageS = serialize($agenda);
    		            $codi = base64_encode($ageS);
		    	        $b=base_url();
		    	        $link="{$b}index.php/clientes/adicionar?cod={$codi}";
		    	        $link2=",'mywindow','location=1,status=1,scrollbars=1,width=960,height=700'";
		    	        $link3="window.open";
		    	        $link4="{$b}index.php/agenda?filial={$_GET['filial']}&data={$_GET['data']}&h={$agenda->HrIni}{$user}&idAg={$agenda->idAgenda}";
		    	        $link5="";
		    	        $link6="location.href=";
		    	        $style = "style='cursor:pointer;'";
		    	     }else{
		    	        if($this->permission->checkPermission($this->session->userdata('permissao'), 'eAgenda')){
		                $link="{$b}index.php/clientes/editar/{$agenda->idPac}";
            			}elseif($this->permission->checkPermission($this->session->userdata('permissao'), 'vAgenda')){
            			    $link="{$b}index.php/clientes/visualizar/{$agenda->idPac}";
            			}
		    	        $b=base_url();
		    	        
		    	        $link2=",'mywindow','location=1,status=1,scrollbars=1,width=960,height=700'";
		    	        $link3="window.open";
		    	        $link4="{$b}index.php/agenda?filial={$_GET['filial']}&data={$_GET['data']}&h={$agenda->HrIni}{$user}&idAg={$agenda->idAgenda}";
		    	        $link5="";
		    	        $link6="location.href=";
		    	        $style = "style='cursor:pointer;'";
		    	    }
	        
			    	  
			    	    ?>

						<tr  onclick="<?php echo   $link6;?>('<?php echo   $link4;?>'<?php echo   $link5;?>); " <?php echo   $style;?>>
			<td style='background-color: #1EABA9; color: #ffffff;'><center><?php  echo $agenda->HrIni;?></center></td>
			<td style=' max-width: 10px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;'><center><?php  echo $agenda->descri;?></center></td>
			<td style='max-width: 10px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;'><center><?php  echo $agenda->cliente;?></center></td>
			<td><center><?php  echo $agenda->tel1." | ".$agenda->tel2;?></center></td>
			<td><center><?php  echo $agenda->convenio;?></center></td>
			<td><center><a <?php echo $style1;?> onclick="<?php echo   $link3;?>('<?php echo   $link;?>'<?php echo   $link2;?>); "><i title="Ir para cadastro do Paciente" class="icon icon-edit"></i></a>
			
			
			
			</center></td>
		</tr>
		<?php
				if ( !empty( $agenda1 ) ) {
				   
							foreach ( $agenda1 as $w ) {
							 
							    	$link4="{$b}index.php/agenda?filial={$_GET['filial']}&data={$_GET['data']}&h={$w->HrIni}{$user}&idAg={$w->idAgenda}";
            		    	        $link5="";
            		    	        $link6="location.href=";
            		    	        $style = "style='cursor:pointer;'";
            		    	        $style1 = "";
							         if($w->idPac==false){
							            $ageS = serialize($w);
    		                            $codi = base64_encode($ageS);
            			    	        $b=base_url();
            			    	        $link="{$b}index.php/clientes/adicionar?codA={$codi}";
            			    	        $link2=",'mywindow','location=1,status=1,scrollbars=1,width=960,height=700'";
            			    	        $link3="window.open";
            			    	        $link4="{$b}index.php/agenda?filial={$_GET['filial']}&data={$_GET['data']}&h={$w->HrIni}{$user}&idAg={$w->idAgenda}";
            			    	        $link5="";
            			    	        $link6="location.href=";
            			    	        $style = "style='cursor:pointer;'";
            			    	     }else{
            			    	         if($this->permission->checkPermission($this->session->userdata('permissao'), 'eAgenda')){
		                $link="{$b}index.php/clientes/editar/{$w->idPac}";
            			}elseif($this->permission->checkPermission($this->session->userdata('permissao'), 'vAgenda')){
            			    $link="{$b}index.php/clientes/visualizar/{$w->idPac}";
            			}
            			    	        $b=base_url();
            			    	        $link2=",'mywindow','location=1,status=1,scrollbars=1,width=960,height=700'";
            			    	        $link3="window.open";
            			    	        $link4="{$b}index.php/agenda?filial={$_GET['filial']}&data={$_GET['data']}&h={$w->HrIni}{$user}&idAg={$w->idAgenda}";
            			    	        $link5="";
            			    	        $link6="location.href=";
            			    	        $style = "style='cursor:pointer;'";
            			    	    }
			    	     
			    	   
							   	    ?>

						<tr  onclick="<?php echo   $link6;?>('<?php echo   $link4;?>'<?php echo   $link5;?>); "<?php echo   $style;?>>
			<td style='background-color: #FFFFFF; color: #f00;'><center><?php  echo $w->HrIni;?></center></td>
			<td style=' max-width: 10px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;'><center><?php  echo $w->descri;?></center></td>
			<td style='max-width: 10px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;'><center><?php  echo $w->cliente;?></center></td>
			<td><center><?php  echo $w->tel1." | ".$w->tel2;?></center></td>
			<td><center><?php  echo $w->convenio;?></center></td>
			<td><center><a <?php echo $style1;?> onclick="<?php echo   $link3;?>('<?php echo   $link;?>'<?php echo   $link2;?>); "><i  title="Ir para cadastro do Paciente" class="icon icon-edit"></i></a>
			
			
			
			</center></td>
		</tr>
		<?php
							}
				}
						//echo 'Hora intermediária: '.$horaInicial->format('H:i')."<br />";
					} else {
					    
					    
			    	        $b=base_url();
			    	        $link="{$b}index.php/agenda?filial={$_GET['filial']}&data={$_GET['data']}&h={$horaInicial->format( 'H:i' )}{$user}";
			    	        $style = "style='cursor:pointer;'";
			    	  
			    	    ?>
						<tr  onclick="location.href=('<?php echo   $link;?>'); " <?php echo   $style;?>>
			<td scope="row" style='background-color: #1EABA9; color: #ffffff;'><center><?php  echo $horaInicial->format( 'H:i' );?></center></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		
		</tr>
		<?php
				} 
                    //print_r($test); echo"   .... ...... .... ";
                    //print_r($agendaEnc);
			    	foreach ( $test as $w ) {
			    	    if($w['idAgenda']==false){
			    	        $b=base_url();
			    	        $link4="{$b}index.php/agenda?filial={$_GET['filial']}&data={$_GET['data']}&h={$w['HrIni']}{$user}";
			    	        $link5="";
			    	        $link6="location.href=";
			    	        $style = "style='cursor:pointer;'";
			    	        $style1 = "style='display: none;' ";
			    	    }else{
			    	         if($w['idPac']==false){
			    	                $ageS = serialize($w);
		                            $codi = base64_encode($ageS);
        			    	        $b=base_url();
        			    	        $link="{$b}index.php/clientes/adicionar?codA={$codi}";
        			    	        $link2=",'mywindow','location=1,status=1,scrollbars=1,width=960,height=700'";
                            		$link3="window.open";
                            		$link4="{$b}index.php/agenda?filial={$_GET['filial']}&data={$_GET['data']}&h={$w['HrIni']}{$user}&idAg={$w['idAgenda']}";
        			    	        $link5="";
        			    	        $link6="location.href=";
        			    	        $style = "style='cursor:pointer;'";
        			    	        $style1 = "";
            			     }else{
            			          if($this->permission->checkPermission($this->session->userdata('permissao'), 'eAgenda')){
		                $link="{$b}index.php/clientes/editar/{$w['idPac']}";
            			}elseif($this->permission->checkPermission($this->session->userdata('permissao'), 'vAgenda')){
            			    $link="{$b}index.php/clientes/visualizar/{$w['idPac']}";
            			}
            			    
        			    	        $b=base_url();
        			    	        $link2=",'mywindow','location=1,status=1,scrollbars=1,width=960,height=700'";
        			    	        $link3="window.open";
        			    	        $link4="{$b}index.php/agenda?filial={$_GET['filial']}&data={$_GET['data']}&h={$w['HrIni']}{$user}&idAg={$w['idAgenda']}";
        			    	        $link5="";
        			    	        $link6="location.href=";
        			    	        $style = "style='cursor:pointer;'";
        			    	        $style1 = "";
            			     }
			    	        
			    	    }
				?>	
					   <tr onclick="<?php echo   $link6;?>('<?php echo   $link4;?>'<?php echo   $link5;?>); " <?php echo   $style;?>>
                		    <td style='background-color: #1EABA9; color: #ffffff;'><center>	<?php	echo $w['HrIni'];?></center></td>
                    			<td><center><?php	echo $w['descri'];?></center></td>
                    			<td><center><?php	echo $w['cliente'];?></center></td>
                    			<td><center><?php	echo $w['tel1']; if($w['tel1']==true && $w['tel2']==true){ echo " / ";}	echo $w['tel2'];?></center></td>
                    			<td><center><?php	echo $w['convenio'];?></center></td>
                    			<td ><center><a <?php echo $style1;?> onclick="<?php echo   $link3;?>('<?php echo   $link;?>'<?php echo   $link2;?>); "><i  title="Ir para cadastro do Paciente" class="icon icon-edit"></i></a>
                    			
                    			
                    			</center></td>
                		    </tr>
				<?php			
			    


                    $hora = $w['HrIni'];
                    $t1=$t-1;
                    $rest2 = substr( $hora, -1 );
                    $rest3 = $rest2 + 1;
                    $temp = $hora;
                    $temp2 = date('H:i', strtotime('+'.$t1.' minute', strtotime($hora)));
                    while ( $temp < $temp2 ) {
                    	$temp = date('H:i', strtotime('+1 minute', strtotime($temp)));
                    	
                    	if($agendaEnc){
                    	    foreach ( $agendaEnc as $ee ) {
                    	        foreach (  $ee as $e ) {
                        	        if($e->HrIni==$temp){
                                 	    if($e->idAgenda==false){
                        		    	        $b=base_url();
                        		    	        $link4="{$b}index.php/agenda?filial={$_GET['filial']}&data={$_GET['data']}&h={$e->HrIni}{$user}";
                        		    	        $link5="";
                        		    	        $link6="location.href=";
                        		    	        $style = "style='cursor:pointer;'";
                        		    	    }else{
                        		    	         if($e->idPac==false){
                            			    	        $ageS = serialize($ee);
                    		                            $codi = base64_encode($ageS);
                            			    	        $b=base_url();
                            			    	        $link="{$b}index.php/clientes/adicionar?codAb={$codi}";
                            			    	        $link2=",'mywindow','location=1,status=1,scrollbars=1,width=960,height=700'";
                            			    	        $link3="window.open";
                            			    	        $link4="{$b}index.php/agenda?filial={$_GET['filial']}&data={$_GET['data']}&h={$e->HrIni}{$user}&idAg={$e->idAgenda}";
                            			    	        $link5="";
                            			    	        $link6="location.href=";
                            			    	        $style = "style='cursor:pointer;'";
                                			     }else{
                            			    	        $b=base_url();
                            			    	            if($this->permission->checkPermission($this->session->userdata('permissao'), 'eAgenda')){
		                $link="{$b}index.php/clientes/editar/{$e->idPac}";
            			}elseif($this->permission->checkPermission($this->session->userdata('permissao'), 'vAgenda')){
            			    $link="{$b}index.php/clientes/visualizar/{$e->idPac}";
            			}
                            			    	         $link2=",'mywindow','location=1,status=1,scrollbars=1,width=960,height=700'";
                            			    	        $link3="window.open";
                            			    	        $link4="{$b}index.php/agenda?filial={$_GET['filial']}&data={$_GET['data']}&h={$e->HrIni}{$user}&idAg={$e->idAgenda}";
                            			    	        $link5="";
                            			    	        $link6="location.href=";
                            			    	        $style = "style='cursor:pointer;'";
                                			     }
                        		    	        
                        		    	    }
                        			?>	
                        				   <tr onclick="<?php echo   $link6;?>('<?php echo   $link4;?>'<?php echo   $link5;?>); "<?php echo   $style;?>>
                                    		    <td style='background-color: #FFFFFF; color: #f00;'><center>	<?php	echo $e->HrIni;?></center></td>
                                        			<td><center><?php	echo $e->descri;?></center></td>
                                        			<td><center><?php	echo $e->cliente;?></center></td>
                                        			<td><center><?php	echo $e->tel1; if($e->tel1==true && $e->tel2==true){ echo " / ";}	echo $e->tel2;?></center></td>
                                        			<td><center><?php	echo $e->convenio;?></center></td>
                                        			<td><center><a  onclick="<?php echo   $link3;?>('<?php echo   $link;?>'<?php echo   $link2;?>); "><i title="Ir para cadastro do Paciente" class="icon icon-edit"></i></a>
                                        			
                                        			
                                        			</center></td>
                                    		    </tr>
                        			<?php	
                        	        }
                        	    }
                        	    
                        	}
                    	}
                    }
		        }	
		?>
			
				
			</tbody>
		</table>
        </div> 	
        <?php }else{ ?>
       	<center>
       	    <div class="col-lg-12" >
			<h2>Sem agendamento neste dia!</h2><br>
			</div>
			</center>
      <?php  }
            
        }	else{		
			?>
			<center>
			<h2>Atenção adicione os dias de atendimento!</h2><br>
			<h4>Usuarios > Editar > Agenda</h4>
			<a href="<?php echo base_url() ?>index.php/usuarios"><button ><i class=" icon-share-alt"></i> Usuários</button></a>    
			</center>
			<?php }?>
    </div> 
    
    <div role="tabpanel" class="tab-pane" id="semana">
        <div style="padding-top: 15px;">
            <div style="width: 100%" >
                <h1>
        		    <center>	
                		<?php  if($_GET['data']==false){
                		   $dataC = $data;
                		   echo  utf8_encode(strftime('%a, %d de %b de %Y', strtotime($data)));   
                		      
                		}else{  
                		        $dataC = $_GET['data'];
                		         echo  utf8_encode(strftime('%a, %d de %b de %Y', strtotime($dataC))); 
                		        
                		} 
                			   
        	          
        		
        			    ?>
            		</center>
            	 </h1>

            </div> 
			 
					    <table class="table table-bordered table-hover">
					        <tr>
                                <?php
                                $dias		= " days";
                                
                                
                                $hojedia = date('d');
                                $hojemes = date('n');
                                $hojeano = date('Y');
                                $hoje	 = date('d-m-Y');
                                
                                $contagem 	= + 1;
                                $x = 1;
                                $d = -1;
                                	echo "<th style='background-color: #1EABA9; color: #ffffff; width: 60px; '>GMT-03</th>";
                                while ($x <= 7) {
                                   
                                	$x = $x + 1;
                                	$d = $d + 1;
                                $timestamp = strtotime("$d days");
                                $data = date('d-m-Y', $timestamp);
                                $dia = date('d', $timestamp);
                                $diaWrite = date('N', $timestamp);
                                $mes = date('n', $timestamp);
                                $ano = date('Y', $timestamp);
                                 if($data == $hoje){
                                	$st= 'style= "background-color: lightblue; color: #ffffff;"'; 
                                }else{
                                    	$st="";
                                }
                                
                                		echo "<th ".$st.">";
                                if($data == $hoje){
                                	echo "Hoje";
                                }else{
                                	if($diaWrite == 1){
                                		echo "Seg";
                                	}
                                	if($diaWrite == 2){
                                		echo "Ter";
                                	}
                                	if($diaWrite == 3){
                                		echo "Qua";
                                	}
                                	if($diaWrite == 4){
                                		echo "Qui";
                                	}
                                	if($diaWrite == 5){
                                		echo "Sex";
                                	}
                                	if($diaWrite == 6){
                                		echo "Sab";
                                	}
                                	if($diaWrite == 7){
                                		echo "Dom";
                                	}
                                	echo ", $dia/";
                                	if($mes == 1){
                                		echo "Jan";
                                	}
                                	if($mes == 2){
                                		echo "Fev";
                                	}
                                	if($mes == 3){
                                		echo "Mar";
                                	}
                                	if($mes == 4){
                                		echo "Abr";
                                	}
                                	if($mes == 5){
                                		echo "Mai";
                                	}
                                	if($mes == 6){
                                		echo "Jun";
                                	}
                                	if($mes == 7){
                                		echo "Jul";
                                	}
                                	if($mes == 8){
                                		echo "Ago";
                                	}
                                	if($mes == 9){
                                		echo "Set";
                                	}
                                	if($mes == 10){
                                		echo "Out";
                                	}
                                	if($mes == 11){
                                		echo "Nov";
                                	}
                                	if($mes == 12){
                                		echo "Dez";
                                	}
                                }echo "  </th>";
                                }
                                
                                ?>
                            </tr>
                         
						<?php
    						$horaInicial1= 1;
    						$horaFinal1 =24;
    						$temp2 = "00:00";
    						while ( $horaInicial1<= $horaFinal1 ) {
    							$horaInicial1++;
    							 $temp2 = date('H:i', strtotime('+60 minute', strtotime($temp2)));
    
        						echo "<tr  >
        						<td  style='background-color: #1EABA9; color: #ffffff; width: 02%; '>{$temp2}</td>
        						<td></td>
        						<td></td>
        						<td></td>
        						<td></td>
        						<td></td>
        						<td></td>
        						<td></td>
        					
        					    </tr>";
    
                            }
    ?>
    					

				</table> 
        </div> 
    </div>  
</div>    

<script src="<?php echo base_url() ?>js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript">
//ler valor e tornar link no option
    function handleSelect(elm)
    {
    window.location = elm.value;
    }
//----------------
    $(document).ready(function () {

     
  
        $("#formAgenda").validate({
     
            submitHandler: function (form) {
                var dados = $(form).serialize();

              
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>index.php/agenda/adicionarAgenda",
                    data: dados,
                    dataType: 'json',
                    success: function (data) {
                   <?php
                   if($_GET['data']){
                  $link1="?filial={$_GET['filial']}&data={$_GET['data']}{$user}";
                   }
                   ?>
                            //alert('ok');
                            window.location.replace('<?php echo base_url();?>index.php/agenda<?php echo $link1;?>');
                           
                      
                    }
                });
                return false;
            }
        });

        $(document).on('click', 'span', function (event) {

            
            var idVeiculo = $(this).attr('idAcao');
            var idAcaoEditar = $(this).attr('idAcaoEditar');
            
            

            if ((idVeiculo % 1) === 0) {
                $("#divVeiculos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>index.php/clientes/excluirVeiculo",
                    data: "idVeiculo=" + idVeiculo,
                    dataType: 'json',
                    success: function (data) {
                        if (data.result === true) {
                            $("#divVeiculos").load("<?php echo current_url();?> #divVeiculos");
                            $("#marca").val('');
                            $("#placa").val('');
                            $("#tipoVeiculo").val('');
                            $('#tipoveiculo_id').val('');
                            $("#cor").val('');
                            $("#ano").val('');
                            $('#idVeiculo').val('');
                            $('#chassi').val('');
                            $('#observacao').val('');
                            $("#modelo").val('').focus();
                        }
                        else {
                            alert('Ocorreu um erro ao tentar excluir o veiculo.');
                        }
                    }
                });
                return false;
            } else if (idAcaoEditar != '') {

                var marca           = $(this).attr('marca');
                var placa           = $(this).attr('placa');
                var tipoVeiculo     = $(this).attr('tipoVeiculo');
                var tipoveiculo_id  = $(this).attr('tipoveiculo_id');
                var cor             = $(this).attr('cor');
                var ano             = $(this).attr('ano');
                var modelo          = $(this).attr('modelo');
                var chassi          = $(this).attr('chassi');
                var observacao      = $(this).attr('observacao');

                $("#marca").val(marca);
                $("#placa").val(placa);
                $("#tipoVeiculo").val(tipoVeiculo);
                $("#cor").val(cor);
                $("#ano").val(ano);
                $('#idVeiculo').val(idAcaoEditar);
                $('#tipoveiculo_id').val(tipoveiculo_id);
                $("#modelo").val(modelo).focus();
                $("#chassi").val(chassi).focus();
                $("#observacao").val(observacao).focus();
            }
        });
    });
</script>
