 <div class="list-coletas mar-top">
    <div class="panel-group accordion" id="envios">
        <div class="panel">
            <div class="clientes-box panel-heading">
                <div class="panel-body">
                    <div class="col-md-4">
                        <p class="id-coleta"><span class=text-small><i class="fas fa-globe fa-2x"></i> CNPJ</span> 
                        <?php
                        $cnpj = $user->cnpj_cliente;
                        echo esc_html( Mask( '##.###.###/####-##', $cnpj ) );
                        ?>
                        </p>
                        <p class="id-coleta"><span class="text-small"><i class="fas fa-id-card fa-2x"></i> CPF</span> 
                        <?php
                        $cpf = $user->cpf_cliente;
                        echo esc_html( Mask( '###.###.###-##', $cpf ) );
                        ?>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="coleta-text"><span class=text-small><i class="btn-label fas fa-envelope fa-2x"></i> E-mail</span> <?php echo esc_html( $user->user_email ) ?> </p>
                        <p class="coleta-text"><span class=text-small><i class="btn-label fas fa-phone fa-2x"></i> Telefone</span> +55 
                        <?php
                        $telefone = $user->telefone_cliente;
                        echo esc_html( Mask( '(##) #####-####', $telefone ) );
                        ?>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="coleta-text"><span class=text-small><i class="fas fa-map-marker-alt fa-2x"></i> Endereço de coleta</span></p>
                        <p><?php echo esc_html( $user->endereco_cliente ); ?></p>
                        <p><?php echo esc_html( $user->regiao_cliente ); ?></p>
                        <p>
                            <?php
                            $cep = $user->cep_cliente;
                            echo 'CEP : ' . esc_html( Mask( '#####-###', $cep ) );
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>