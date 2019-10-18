<?php 
$i = 0; //set up counter variable

if( have_rows('envios_coleta') ): 
?>

    <?php while( have_rows('envios_coleta') ): the_row(); $i++ ?>


        <?php $postobject = get_sub_field('envio_coleta'); ?>

        <div class="envios-box panel-heading">
            <h4 class="panel-title">
                <a data-parent="#envios" data-toggle="collapse" href="#envio-<?php echo esc_html( $i, 'mandabem' ); ?>" class="collapsed" aria-expanded="false">
                    <div class="envio row">
                        <div class="col-md-3">
                            <h4 class="client-name mar-no"><?php echo $postobject->post_title ?></h4>
                        </div>
                        <div class="sending-data col-md-3 text-center"><span class="text-small">Buscador</span> <?php echo $postobject->rastreio_envio ?></div>
                        <div class="sending-price col-md-2">status <span class="btn btn-warning">Em aberto</span></div>
                        <div class="col-md-2">
                            R$ <?php 
                                $valor_envio = $postobject->valor_do_envio;

                                echo $valor_envio;
                                ?>
                        </div>
                        <div class="col-md-2">
                            <div class="sending-plus"><i class="fa fa-plus" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </a>
            </h4>
        </div>

        <div class="panel-collapse collapse" id="envio-<?php echo esc_html( $i, 'mandabem' ); ?>" aria-expanded="false">
            <div class="envio-data panel-body">
                <div class="col-md-4">
                    <p class="id-coleta"><span class=text-small><i class="fas fa-globe fa-2x"></i> Rastreio</span> DM345654345BR</p>
                    <p class="id-coleta"><span class="text-small"><i class="fas fa-envelope fa-2x"></i> E-mail</span> gustavo_souza@gmail.com</p>
                </div>
                <div class="col-md-4">
                    <p class="coleta-text"><span class=text-small><i class="btn-label fas fa-map-marker-alt fa-2x"></i> Enviado</span> 00/00/0000</p>
                    <p class="coleta-text"><span class=text-small><i class="btn-label fas fa-map-marker-alt fa-2x"></i> Recebido</span> 00/00/0000</p>
                </div>
                <div class="col-md-4">
                    <p class="coleta-text"><span class=text-small><i class="far fa-clock fa-2x"></i> Tempo de envio</span> 00 dias</p>
                    <p class="coleta-text"><span class=text-small><i class="fas fa-cube fa-2x"></i> Tipo de pacote</span> Pack</p>
                </div>
            </div>
        </div>

    <?php endwhile; ?>

<?php endif; ?>