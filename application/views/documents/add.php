<?php //debug($work);?>

<div class="container py-4">
    <div class="row">
        <div class="mx-auto col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0 text-center">Добавить документ</h4>
                </div>
                <div class="card-body">
                        <div class="form-group">
                            <label for="aosr" class="control-label">Акт освидетельствования скрытых работ:</label>
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#aosr">создать</button>
                        </div>
                        <div class="form-group">
                            <label for="aok" class="control-label">Акт промежуточной приёмки ответственных конструкций:</label>
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#appok">создать</button>
                        </div>
                        <div class="form-group">
                            <label for="r" class="control-label">Реестр:</label>
                            <button type="button" class="btn btn-info btn-sm" data-target="#r">создать</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="aosr" class="modal fade" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">Акт освидетельствования скрытых работ</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

      <div class="modal-body">
        <form class="form" role="form" id="document-form" action="<?=$_SERVER['REQUEST_URI']?>" method="post" >
            <input name='f0' type='hidden' value="aosr"/>
            <input name='objects_id' type='hidden' value="<?=$this->route['id'];?>"/>

          <div class="row">
            <div class="col-lg-12">
              <label>Наименование объекта строительства:</label>
              <input type="text" class="form-control" name="f1" value="<?php echo htmlspecialchars($object['name'], ENT_QUOTES) ?>" required="">
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12" style="margin-top: 15px;">
              <label>Представитель генподрядной строительно-монтажной организации:</label>
              <select class="form-control f2-select" name="f2">
                  <option value="" selected="selected"></option>
                  <?php foreach ($representative as $key=>$val): ?>
                                  <option data-f2-name="<?=htmlspecialchars($val['name_orgs'], ENT_QUOTES);?>"
                                          data-f2-fio="<?=htmlspecialchars($val['fio'], ENT_QUOTES);?>"
                                          value="<?php echo htmlspecialchars($val['name_orgs'], ENT_QUOTES).' '
                                                           .htmlspecialchars($val['position'], ENT_QUOTES).' '
                                                           .htmlspecialchars($val['fio'], ENT_QUOTES) ; ?>">
                                      <?php echo htmlspecialchars($val['name_orgs'], ENT_QUOTES).' '
                                                .htmlspecialchars($val['position'], ENT_QUOTES).' '
                                                .htmlspecialchars($val['fio'], ENT_QUOTES) ; ?></option>
                  <?php endforeach;?>
                              </select>
            </div>
          </div>

            <div class="row">
                <div class="col-lg-12" style="margin-top: 15px;">
                    <label>Представитель субподрядной строительно-монтажной организации:</label>
                    <select class="form-control f3-select" name="f3">
                        <option selected></option>
                        <?php foreach ($representative as $key=>$val): ?>
                            <option data-f3-name="<?=htmlspecialchars($val['name_orgs'], ENT_QUOTES);?>"
                                    data-f3-fio="<?=htmlspecialchars($val['fio'], ENT_QUOTES);?>"
                                    value="<?php echo htmlspecialchars($val['name_orgs'], ENT_QUOTES).' '
                                                    .htmlspecialchars($val['position'], ENT_QUOTES).' '
                                                    .htmlspecialchars($val['fio'], ENT_QUOTES) ; ?>">
                                <?php echo htmlspecialchars($val['name_orgs'], ENT_QUOTES).' '
                                        .htmlspecialchars($val['position'], ENT_QUOTES).' '
                                        .htmlspecialchars($val['fio'], ENT_QUOTES) ; ?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12" style="margin-top: 15px;">
                    <label>Представитель  технического надзора заказчика:</label>
                    <select class="form-control f4-select" name="f4">
                        <option selected></option>
                        <?php foreach ($representative as $key=>$val): ?>
                            <option data-f4-name="<?=htmlspecialchars($val['name_orgs'], ENT_QUOTES);?>"
                                    data-f4-fio="<?=htmlspecialchars($val['fio'], ENT_QUOTES);?>"
                                    value="<?php echo htmlspecialchars($val['name_orgs'], ENT_QUOTES).' '
                                                    .htmlspecialchars($val['position'], ENT_QUOTES).' '
                                                    .htmlspecialchars($val['fio'], ENT_QUOTES) ; ?>">
                                <?php echo htmlspecialchars($val['name_orgs'], ENT_QUOTES).' '
                                        .htmlspecialchars($val['position'], ENT_QUOTES).' '
                                        .htmlspecialchars($val['fio'], ENT_QUOTES) ; ?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>


          <div class="row">
            <div class="col-lg-12" style="margin-top: 15px;">
              <label>Представитель проектной организации:</label>
              <select class="form-control f5-select" name="f5">
                  <option selected></option>
                  <?php foreach ($representative as $key=>$val): ?>
                      <option data-f5-name="<?=htmlspecialchars($val['name_orgs'], ENT_QUOTES);?>"
                              data-f5-fio="<?=htmlspecialchars($val['fio'], ENT_QUOTES);?>"
                              value="<?php echo htmlspecialchars($val['name_orgs'], ENT_QUOTES).' '
                                              .htmlspecialchars($val['position'], ENT_QUOTES).' '
                                              .htmlspecialchars($val['fio'], ENT_QUOTES) ; ?>">
                          <?php echo htmlspecialchars($val['name_orgs'], ENT_QUOTES).' '
                                  .htmlspecialchars($val['position'], ENT_QUOTES).' '
                                  .htmlspecialchars($val['fio'], ENT_QUOTES) ; ?></option>
                  <?php endforeach;?>
                              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6" style="margin-top: 15px;">
              <label>Номер акта:</label>
              <input type="text" class="form-control" name="f6">
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 par" style="margin-top: 30px;">
              <label>1. Наименование скрытых работ:</label>
                <select class="form-control custom-select works-select" id="works-select" name="f7" multiple="multiple">
                    <?php foreach ($work as $key => $val): ?>
                                  <option data-start="<?=$val['date_start']; ?>"
                                          data-end="<?=$val['date_end'];?>"
                                          value="<?php echo htmlspecialchars($val['name_work'], ENT_QUOTES); ?>">
                                      <?php echo htmlspecialchars($val['name_work'], ENT_QUOTES); ?></option>
                    <?php endforeach;?>
                </select>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 par" style="margin-top: 15px;">
              <label>2. Наименование проектной организации, номер чертежей и дата их составления:</label>
                <select class="form-control m-select selectpicker" name="f8[]" multiple title="Выберите чертежи..." data-live-search="true" data-actions-box="true">
                    <?php foreach ($project as $key => $val): ?>
                        <option value="<?php echo htmlspecialchars($val['name_porg'], ENT_QUOTES).' '
                                                .htmlspecialchars($val['cypher'], ENT_QUOTES).' '
                                                .$val['number_list'].' '
                                                .$val['date'] ; ?>">
                            <?php echo htmlspecialchars($val['name_porg'], ENT_QUOTES).' '
                                     .htmlspecialchars($val['cypher'],ENT_QUOTES).' '
                                     .$val['number_list'].' '
                                     .$val['date'] ; ?></option>
                    <?php endforeach;?>
                </select>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 par" style="margin-top: 15px;">
              <label>3. Наименование материалов, конструкций, изделий со ссылкой на сертификаты или другие документы, подтверждающие качество:</label>
                <select class="form-control m-select selectpicker" name="f9[]" multiple title="Выберите материалы..." data-live-search="true" data-actions-box="true">
                  <?php foreach ($material as $key => $val): ?>
                      <option value="<?php echo htmlspecialchars($val['name_material'], ENT_QUOTES).' '
                                              .htmlspecialchars($val['name_document'], ENT_QUOTES).' '
                                              .$val['number'].' '
                                              .$val['date'] ; ?>">
                          <?php echo htmlspecialchars($val['name_material'], ENT_QUOTES).' '
                                   .htmlspecialchars($val['name_document'], ENT_QUOTES).' '
                                   .$val['number'].' '
                                   .$val['date'] ; ?></option>
                  <?php endforeach;?>
                </select>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 par" style="margin-top: 15px;">
              <label>4. При наличии отклонений  указывается, кем согласованы, номер чертежей и дата согласования:</label>
                <textarea type="text" class="form-control" name="f10" onclick="this.select()">Отсутствуют</textarea>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6" style="margin-top: 15px;">
              <label for="date1" class="control-label">5. Дата начала работ:</label>
                  <input id="date1" name="f11" type="date" class="form-control set-works-date" />
           </div>

            <div class="col-lg-6" style="margin-top: 20px;">
              <label for="date2" class="control-label">Дата окончания работ:</label>
                  <input id="date2" name="f12" type="date" class="form-control set-works-date-2" />
            </div>
          
            <div class="col-lg-6" style="margin-top: 20px;">
              <label for="date3" class="control-label">Дата составления акта:</label>
                <input id="date3" name="f13" type="date" class="form-control set-works-date-2" />
           </div>
          </div>

          <div class="row">
            <div class="col-lg-12" style="margin-top: 15px;">
              <label>6. На основании изложенного разрешается производство последующих работ по устройству (монтажу):</label>
                <textarea type="text" class="form-control input-6" name="f14" placeholder="Своё значение" style="width: 100%;"></textarea>
                    <select class="form-control works-select-6" name="f15" multiple="multiple">
                      <?php foreach ($work as $key => $val): ?>
                          <option value="<?php echo htmlspecialchars($val['name_work'], ENT_QUOTES); ?>"><?php echo htmlspecialchars($val['name_work'], ENT_QUOTES); ?></option>
                      <?php endforeach;?>
                  </select>
            </div>
          </div>

            <input id="data-f3-name" name='f16' type='hidden'/>
            <input id="data-f3-fio" name='f17' type='hidden'/>
            <input id="data-f2-fio" name='f18' type='hidden'/>
            <input id="data-f4-fio" name='f19' type='hidden'/>
            <input id="data-f5-fio" name='f20' type='hidden'/>

          <div class="row">
            <div class="col-lg-12" style="margin-top: 20px;">
              <button type="submit" class="btn btn-primary float-right document-button" name="document-button">Создать</button>            </div>
          </div>
        </form>      </div>

      <div class="modal-footer justify-content-between d-flex" style="margin-top: 10px;">
          <button class="btn btn-sm clear-all-inputs">Очистить все</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function() {
        $('#works-select').on('change', function (){
            let current = $('#works-select option:selected');
            let start = current.data("start");
            let end = current.data("end");

            $('.set-works-date').attr('value', start);
            $('.set-works-date-2').attr('value', end);
        } );
        $('.clear-all-inputs').on('click', function () {
            $('.m-select').prop('selected', false);
            $('.m-select option').text("");
            $('#document-form')[0].reset();
            $('.set-works-date').attr('value', "");
            $('.set-works-date-2').attr('value', "");

        });

        $('.f3-select').on('change', function (){
            let current = $('.f3-select option:selected');
            let name = current.data("f3-name");
            let fio = current.data("f3-fio");

            $('#data-f3-name').attr('value', name);
            $('#data-f3-fio').attr('value', fio);
        } );
        $('.f2-select').on('change', function (){
            let current = $('.f2-select option:selected');
            let fio = current.data("f2-fio");
            $('#data-f2-fio').attr('value', fio);
        } );

        $('.f4-select').on('change', function (){
            let current = $('.f4-select option:selected');
            let fio = current.data("f4-fio");
            $('#data-f4-fio').attr('value', fio);
        } );

        $('.f5-select').on('change', function (){
            let current = $('.f5-select option:selected');
            let fio = current.data("f5-fio");
            $('#data-f5-fio').attr('value', fio);
        } );

        $('.works-select-6').on('change', function () {
            $('.input-6').val("");
        });
        $('.input-6').on('keypress', function () {
            $('.works-select-6 option').prop('selected', false);
        });
    })

</script>

<div id="appok" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">Акт промежуточной приёмки ответственных конструкций</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

      <div class="modal-body">
          <form class="form" role="form" id="document-form-k" action="<?=$_SERVER['REQUEST_URI']?>" method="post" >
              <input name='f0' type='hidden' value="appok"/>
              <input name='objects_id' type='hidden' value="<?=$this->route['id'];?>"/>

              <div class="row">
                  <div class="col-lg-12">
                      <label>Наименование объекта строительства:</label>
                      <input type="text" class="form-control" name="f1" value="<?php echo htmlspecialchars($object['name'], ENT_QUOTES) ?>" required="">
                  </div>
              </div>

              <div class="row">
                  <div class="col-lg-12" style="margin-top: 15px;">
                      <label>Представитель строительно-монтажной организации:</label>
                      <select class="form-control f3-select-k" name="f3">
                          <option selected></option>
                          <?php foreach ($representative as $key=>$val): ?>
                              <option data-f3-name-k="<?=htmlspecialchars($val['name_orgs'], ENT_QUOTES);?>"
                                      data-f3-fio-k="<?=htmlspecialchars($val['fio'], ENT_QUOTES);?>"
                                      value="<?php echo htmlspecialchars($val['name_orgs'], ENT_QUOTES).' '
                                          .htmlspecialchars($val['position'], ENT_QUOTES).' '
                                          .htmlspecialchars($val['fio'], ENT_QUOTES) ; ?>">
                                  <?php echo htmlspecialchars($val['name_orgs'], ENT_QUOTES).' '
                                      .htmlspecialchars($val['position'], ENT_QUOTES).' '
                                      .htmlspecialchars($val['fio'], ENT_QUOTES) ; ?></option>
                          <?php endforeach;?>
                      </select>
                  </div>
              </div>

              <div class="row">
                  <div class="col-lg-12" style="margin-top: 15px;">
                      <label>Представитель  технического надзора заказчика:</label>
                      <select class="form-control f4-select-k" name="f4">
                          <option selected></option>
                          <?php foreach ($representative as $key=>$val): ?>
                              <option data-f4-name-k="<?=htmlspecialchars($val['name_orgs'], ENT_QUOTES);?>"
                                      data-f4-fio-k="<?=htmlspecialchars($val['fio'], ENT_QUOTES);?>"
                                      value="<?php echo htmlspecialchars($val['name_orgs'], ENT_QUOTES).' '
                                          .htmlspecialchars($val['position'], ENT_QUOTES).' '
                                          .htmlspecialchars($val['fio'], ENT_QUOTES) ; ?>">
                                  <?php echo htmlspecialchars($val['name_orgs'], ENT_QUOTES).' '
                                      .htmlspecialchars($val['position'], ENT_QUOTES).' '
                                      .htmlspecialchars($val['fio'], ENT_QUOTES) ; ?></option>
                          <?php endforeach;?>
                      </select>
                  </div>
              </div>

              <div class="row">
                  <div class="col-lg-12" style="margin-top: 15px;">
                      <label>Представитель проектной организации:</label>
                      <select class="form-control f5-select-k" name="f5">
                          <option selected></option>
                          <?php foreach ($representative as $key=>$val): ?>
                              <option data-f5-name-k="<?=htmlspecialchars($val['name_orgs'], ENT_QUOTES);?>"
                                      data-f5-fio-k="<?=htmlspecialchars($val['fio'], ENT_QUOTES);?>"
                                      value="<?php echo htmlspecialchars($val['name_orgs'], ENT_QUOTES).' '
                                          .htmlspecialchars($val['position'], ENT_QUOTES).' '
                                          .htmlspecialchars($val['fio'], ENT_QUOTES) ; ?>">
                                  <?php echo htmlspecialchars($val['name_orgs'], ENT_QUOTES).' '
                                      .htmlspecialchars($val['position'], ENT_QUOTES).' '
                                      .htmlspecialchars($val['fio'], ENT_QUOTES) ; ?></option>
                          <?php endforeach;?>
                      </select>
                  </div>
              </div>

              <div class="row">
                  <div class="col-lg-6" style="margin-top: 15px;">
                      <label>Номер акта:</label>
                      <input type="text" class="form-control" name="f6">
                  </div>
              </div>

              <div class="row">
                  <div class="col-lg-12 par" style="margin-top: 30px;">
                      <label>1. Наименование конструкций:</label>
                      <select class="form-control custom-select works-select" id="works-select-k" name="f7" multiple="multiple">
                          <?php foreach ($work as $key => $val): ?>
                              <option data-start-k="<?=$val['date_start']; ?>"
                                      data-end-k="<?=$val['date_end'];?>"
                                      value="<?php echo htmlspecialchars($val['name_work'], ENT_QUOTES); ?>">
                                  <?php echo htmlspecialchars($val['name_work'], ENT_QUOTES); ?></option>
                          <?php endforeach;?>
                      </select>
                  </div>
              </div>

              <div class="row">
                  <div class="col-lg-12 par" style="margin-top: 15px;">
                      <label>2. Наименование проектной организации, номер чертежей и дата их составления:</label>
                      <select class="form-control m-select selectpicker" name="f8[]" multiple title="Выберите чертежи..." data-live-search="true" data-actions-box="true">
                          <?php foreach ($project as $key => $val): ?>
                              <option value="<?php echo htmlspecialchars($val['name_porg'], ENT_QUOTES).' '
                                  .htmlspecialchars($val['cypher'], ENT_QUOTES).' '
                                  .$val['number_list'].' '
                                  .$val['date'] ; ?>">
                                  <?php echo htmlspecialchars($val['name_porg'], ENT_QUOTES).' '
                                      .htmlspecialchars($val['cypher'],ENT_QUOTES).' '
                                      .$val['number_list'].' '
                                      .$val['date'] ; ?></option>
                          <?php endforeach;?>
                      </select>
                  </div>
              </div>


              <div class="row">
                  <div class="col-lg-12 par" style="margin-top: 15px;">
                      <label>3. При наличии отклонений  указывается, кем согласованы, номер чертежей и дата согласования:</label>
                      <textarea type="text" class="form-control" name="f10" onclick="this.select()">Отсутствуют</textarea>
                  </div>
              </div>

              <div class="row">
                  <div class="col-lg-6" style="margin-top: 15px;">
                      <label for="date1" class="control-label">4. Дата начала работ:</label>
                      <input id="date1" name="f11" type="date" class="form-control set-works-date-k" />
                  </div>

                  <div class="col-lg-6" style="margin-top: 20px;">
                      <label for="date2" class="control-label">Дата окончания работ:</label>
                      <input id="date2" name="f12" type="date" class="form-control set-works-date-2-k" />
                  </div>

                  <div class="col-lg-6" style="margin-top: 20px;">
                      <label for="date3" class="control-label">Дата составления акта:</label>
                      <input id="date3" name="f13" type="date" class="form-control set-works-date-2-k" />
                  </div>
              </div>

              <div class="row">
                  <div class="col-lg-12" style="margin-top: 15px;">
                      <label>5. На основании изложенного разрешается производство последующих работ по устройству (монтажу):</label>
                      <textarea type="text" class="form-control input-5" name="f14" placeholder="Своё значение" style="width: 100%;"></textarea>
                      <select class="form-control works-select-5" name="f15" multiple="multiple">
                          <?php foreach ($work as $key => $val): ?>
                              <option value="<?php echo htmlspecialchars($val['name_work'], ENT_QUOTES); ?>"><?php echo htmlspecialchars($val['name_work'], ENT_QUOTES); ?></option>
                          <?php endforeach;?>
                      </select>
                  </div>
              </div>

              <input id="data-f3-name-k" name='f16' type='hidden'/>
              <input id="data-f3-fio-k" name='f17' type='hidden'/>
              <input id="data-f4-fio-k" name='f19' type='hidden'/>
              <input id="data-f5-fio-k" name='f20' type='hidden'/>

              <div class="row">
                  <div class="col-lg-12" style="margin-top: 20px;">
                      <button type="submit" class="btn btn-primary float-right document-button" name="document-button">Создать</button>            </div>
              </div>
          </form>      </div>

        <div class="modal-footer justify-content-between d-flex" style="margin-top: 10px;">
            <button class="btn btn-sm clear-all-inputs-k">Очистить все</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        </div>
    </div>
  </div>
</div>
<script>

    $(document).ready(function() {
        $('#works-select-k').on('change', function () {
            let current = $('#works-select-k option:selected');
            let start = current.data("start-k");
            let end = current.data("end-k");

            $('.set-works-date-k').attr('value', start);
            $('.set-works-date-2-k').attr('value', end);
        });
        $('.clear-all-inputs-k').on('click', function () {
            $('#document-form-k')[0].reset();
            $('.set-works-date-k').attr('value', "");
            $('.set-works-date-2-k').attr('value', "");
        });
        $('.f3-select-k').on('change', function (){
            let current = $('.f3-select-k option:selected');
            let name = current.data("f3-name-k");
            let fio = current.data("f3-fio-k");

            $('#data-f3-name-k').attr('value', name);
            $('#data-f3-fio-k').attr('value', fio);
        } );

        $('.f4-select-k').on('change', function () {
            let current = $('.f4-select-k option:selected');
            let fio = current.data("f4-fio-k");
            $('#data-f4-fio-k').attr('value', fio);
        });

        $('.f5-select-k').on('change', function () {
            let current = $('.f5-select-k option:selected');
            let fio = current.data("f5-fio-k");
            $('#data-f5-fio-k').attr('value', fio);
        });
        $('.works-select-5').on('change', function () {
            $('.input-5').val("");
        });
        $('.input-5').on('keypress', function () {
            $('.works-select-5 option').prop('selected', false);
        });
    })
</script>
<!---->
<!--<div id="r" class="modal fade" role="dialog">-->
<!--  <div class="modal-dialog">-->
<!--    <div class="modal-content">-->
<!--      <div class="modal-header">-->
<!--        <button type="button" class="close" data-dismiss="modal">×</button>-->
<!--        <h4 class="modal-title">Реестр</h4>-->
<!--        <!--<button class="btn btn-sm clear-all-inputs">Очистить все</button>-->-->
<!--      </div>-->
<!---->
<!--      <div class="modal-body">-->
<!--        <form id="document-form" action="" method="post" role="form">-->
<!--<input type="hidden" name="_csrf" value="yZ8AZs3dkdlqnpdhYEgogLruzY_-z9oPx7zzicpYhHrLC3IyDnEx2uFQ6VRkryxSA8AcoLhHGQs2fe6_e-zgXQ==">-->
<!--          <input type="hidden" name="f0" value="6">-->
<!---->
<!--          <div class="row">-->
<!--            <div class="col-lg-12">-->
<!--              <label>Объект капитального строительства:</label>-->
<!--              <input type="text" class="form-control" value="ЧПУП &quot;Моноракурс&quot; пересечение улиц Каменногорской и Казимировской" name="f1" required="">-->
<!--            </div>-->
<!--          </div>-->
<!---->
<!--          <div class="row">-->
<!--            <div class="col-lg-12" style="margin-top: 20px;">-->
<!--              <label>Застройщик или технический заказчик:</label>-->
<!--              <select class="form-control" name="f2">-->
<!--                                  <option value="1">ООО "КЖСК"</option>-->
<!--                              </select>-->
<!--            </div>-->
<!--          </div>-->
<!---->
<!--          <div class="row">-->
<!--            <div class="col-lg-12" style="margin-top: 20px;">-->
<!--              <label>Лицо, осуществляющее строительство:</label>-->
<!--              <select class="form-control" name="f3">-->
<!--                                  <option value="1">ООО "КЖСК"</option>-->
<!--                              </select>-->
<!--            </div>-->
<!--          </div>-->
<!---->
<!--          <div class="row">-->
<!--            <div class="col-lg-12" style="margin-top: 20px;">-->
<!--              <label>Подрядная организация:</label>-->
<!--              <select class="form-control" name="f4">-->
<!--                                  <option value="1">ООО "КЖСК"</option>-->
<!--                              </select>-->
<!--            </div>-->
<!--          </div>-->
<!---->
<!--          <div class="row">-->
<!--            <div class="col-lg-12" style="margin-top: 20px;">-->
<!--              <label>Наименование работ:</label>-->
<!--              <input type="text" class="form-control" name="f5" required="">-->
<!--            </div>-->
<!--          </div>-->
<!---->
<!--          <div class="row">-->
<!--            <div class="col-lg-12 par" style="margin-top: 20px;">-->
<!--              <label>Акты освидетельствования ответственных конструкций:</label>-->
<!--              <span class="copy">-->
<!--                <span class="multiselect-native-select"><select class="form-control" name="f6[]" multiple="multiple">-->
<!--                                                                                                              </select><div class="btn-group"><button type="button" class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="Выберите значение"><span class="multiselect-selected-text">Выберите значение</span> <b class="caret"></b></button><ul class="multiselect-container dropdown-menu"></ul></div></span>-->
<!--              </span>-->
<!---->
<!--              <div class="copy-place"></div>-->
<!--            </div>-->
<!---->
<!--            -->
<!--          </div>-->
<!---->
<!--          <div class="row">-->
<!--            <div class="col-lg-12 par" style="margin-top: 20px;">-->
<!--              <label>Акты освидетельствования скрытых работ, акты испытаний:</label>-->
<!--              <span class="copy">-->
<!--                <span class="multiselect-native-select"><select class="form-control" id="docs-3" name="f7[]" multiple="multiple">-->
<!--                                                                                  <option value="1" data-materials="1" data-blueprints="" data-protocols="">Акт №1 монтаж жб плит</option>-->
<!--                    -->
<!--                                                          -->
<!--                                          <option value="2" data-materials="" data-blueprints="" data-protocols="">22 №2</option>-->
<!--                                                      </select><div class="btn-group"><button type="button" class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="Выберите значение"><span class="multiselect-selected-text">Выберите значение</span> <b class="caret"></b></button><ul class="multiselect-container dropdown-menu"><li class="multiselect-item multiselect-filter" value="0"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span><input class="form-control multiselect-search" type="text" placeholder="Поиск"><span class="input-group-btn"><button class="btn btn-default multiselect-clear-filter" type="button"><i class="glyphicon glyphicon-remove-circle"></i></button></span></div></li><li value="0"><a href="javascript:void(0)" class="btn btn-sm bootstrap-multiselect-clean-all" onclick="multiselectCleanAll($(this))">Очистить все</a></li><li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="1"> Акт №1 монтаж жб плит</label></a></li><li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="2"> 22 №2</label></a></li></ul></div></span>-->
<!--              </span>-->
<!---->
<!--              <div class="copy-place"></div>-->
<!--            </div>-->
<!---->
<!--            -->
<!--          </div>-->
<!---->
<!--          <div class="row">-->
<!--            <div class="col-lg-12" style="margin-top: 20px;">-->
<!--              <label>Исполнительные схемы и чертежи:</label>-->
<!--              <span class="copy">-->
<!--                <span class="multiselect-native-select"><select class="form-control blueprints-select" name="f8[]" id="for-pril-2-3" multiple="multiple">-->
<!--                                      <option value="1">5 5</option>-->
<!--                                  </select><div class="btn-group"><button type="button" class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="Выберите значение"><span class="multiselect-selected-text">Выберите значение</span> <b class="caret"></b></button><ul class="multiselect-container dropdown-menu"><li class="multiselect-item multiselect-filter" value="0"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span><input class="form-control multiselect-search" type="text" placeholder="Поиск"><span class="input-group-btn"><button class="btn btn-default multiselect-clear-filter" type="button"><i class="glyphicon glyphicon-remove-circle"></i></button></span></div></li><li value="0"><a href="javascript:void(0)" class="btn btn-sm bootstrap-multiselect-clean-all" onclick="multiselectCleanAll($(this))">Очистить все</a></li><li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="1"> 5 5</label></a></li></ul></div><a class="btn btn-default pull-right" data-toggle="modal" data-target="#create-blueprint" style="display:inline-block;"><strong>+</strong></a></span>-->
<!--              </span>-->
<!--            </div>-->
<!--          </div>-->
<!---->
<!--          <div class="row">-->
<!--            <div class="col-lg-12" style="margin-top: 20px;">-->
<!--              <label>Результаты экспертиз, обследований, лабораторных и иных испытаний выполненных работ:</label>-->
<!--              <span class="copy">-->
<!--                <span class="multiselect-native-select"><select class="form-control protocols-select" name="f9[]" id="for-pril-3-3" multiple="multiple">-->
<!--                                  </select><div class="btn-group"><button type="button" class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="Выберите значение"><span class="multiselect-selected-text">Выберите значение</span> <b class="caret"></b></button><ul class="multiselect-container dropdown-menu"></ul></div><a class="btn btn-default pull-right" data-toggle="modal" data-target="#create-protocol" style="display:inline-block;"><strong>+</strong></a></span>-->
<!--              </span>-->
<!--            </div>-->
<!--          </div>-->
<!---->
<!--          <div class="row">-->
<!--            <div class="col-lg-12" style="margin-top: 20px;">-->
<!--              <label>Материалы:</label>-->
<!--              <span class="copy">-->
<!--                <span class="multiselect-native-select"><select class="form-control materials-select" name="f10[]" id="for-pril-1-3" multiple="multiple">-->
<!--                                      <option value="1">плита, паспорт, 111</option>-->
<!--                                  </select><div class="btn-group"><button type="button" class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="Выберите значение"><span class="multiselect-selected-text">Выберите значение</span> <b class="caret"></b></button><ul class="multiselect-container dropdown-menu"><li class="multiselect-item multiselect-filter" value="0"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span><input class="form-control multiselect-search" type="text" placeholder="Поиск"><span class="input-group-btn"><button class="btn btn-default multiselect-clear-filter" type="button"><i class="glyphicon glyphicon-remove-circle"></i></button></span></div></li><li value="0"><a href="javascript:void(0)" class="btn btn-sm bootstrap-multiselect-clean-all" onclick="multiselectCleanAll($(this))">Очистить все</a></li><li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="1"> плита, паспорт, 111</label></a></li></ul></div><a class="btn btn-default pull-right" data-toggle="modal" data-target="#create-material" style="display:inline-block;"><strong>+</strong></a></span>-->
<!--              </span>-->
<!--            </div>-->
<!--          </div>-->
<!---->
<!--          <div class="row">-->
<!--            <div class="col-lg-12" style="margin-top: 20px;">-->
<!--              <label>Другие документы:</label>-->
<!--              <span class="copy">-->
<!--                <span class="multiselect-native-select"><select class="form-control projects-select" name="f11[]" multiple="multiple">-->
<!--                                      <option value="1">ЧПУП "Моноракурс" 15/В-46-АР АР</option>-->
<!--                                  </select><div class="btn-group"><button type="button" class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="Выберите значение"><span class="multiselect-selected-text">Выберите значение</span> <b class="caret"></b></button><ul class="multiselect-container dropdown-menu"><li class="multiselect-item multiselect-filter" value="0"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span><input class="form-control multiselect-search" type="text" placeholder="Поиск"><span class="input-group-btn"><button class="btn btn-default multiselect-clear-filter" type="button"><i class="glyphicon glyphicon-remove-circle"></i></button></span></div></li><li value="0"><a href="javascript:void(0)" class="btn btn-sm bootstrap-multiselect-clean-all" onclick="multiselectCleanAll($(this))">Очистить все</a></li><li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="1"> ЧПУП "Моноракурс" 15/В-46-АР АР</label></a></li></ul></div><a class="btn btn-default pull-right" data-toggle="modal" data-target="#create-project" style="display:inline-block;"><strong>+</strong></a></span>-->
<!--              </span>-->
<!--            </div>-->
<!--          </div>-->
<!---->
<!--          <div class="row">-->
<!--            <div class="col-lg-12" style="margin-top: 20px;">-->
<!--              <label>Составил:</label>-->
<!--              <select class="form-control representatives-select" name="f12">-->
<!--                                  <option value="1">ЖУК — ООО "КЖСК"</option>-->
<!--                              </select>-->
<!--            <a class="btn btn-default pull-right" data-toggle="modal" data-target="#create-representative" style="display:inline-block;"><strong>+</strong></a></div>-->
<!--          </div>-->
<!---->
<!--          <div class="row">-->
<!--            <div class="col-lg-12" style="margin-top: 20px;">-->
<!--              <label>Принял:</label>-->
<!--              <select class="form-control representatives-select" name="f13">-->
<!--                                  <option value="1">ЖУК — ООО "КЖСК"</option>-->
<!--                              </select>-->
<!--            <a class="btn btn-default pull-right" data-toggle="modal" data-target="#create-representative" style="display:inline-block;"><strong>+</strong></a></div>-->
<!--          </div>-->
<!---->
<!--          <div class="row">-->
<!--            <div class="col-lg-12" style="margin-top: 20px;">-->
<!--              <label>Тип реестра:</label><br>-->
<!--              <label><input type="radio" name="f14" value="1" checked=""> документы перечисляются за каждым актом по порядку</label>-->
<!--              <label><input type="radio" name="f14" value="2"> документы перечисляются по разделам</label>-->
<!--            </div>-->
<!--          </div>-->
<!---->
<!--          <div class="row">-->
<!--            <div class="col-lg-6" style="margin-top: 20px;">-->
<!--              <button type="submit" class="btn btn-primary" name="document-button">Создать</button>            </div>-->
<!--          </div>-->
<!--        </form>      </div>-->
<!---->
<!--      <div class="modal-footer" style="margin-top: 10px;">-->
<!--        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
<!--<script>-->
<!--  $(document).ready(function() {-->
<!--    $('#docs-3').multiselect({-->
<!--      enableFiltering: true,-->
<!--      enableCaseInsensitiveFiltering: true,-->
<!--      nonSelectedText: "Выберите значение",-->
<!--      onChange: function(option, checked, select) {-->
<!--        var materials  = $(option).attr('data-materials').split(';');-->
<!--        var blueprints = $(option).attr('data-blueprints').split(';');-->
<!--        var protocols  = $(option).attr('data-protocols').split(';');-->
<!---->
<!--        $('#for-pril-1-3').multiselect('select', materials);-->
<!--        $('#for-pril-2-3').multiselect('select', blueprints);-->
<!--        $('#for-pril-3-3').multiselect('select', protocols);-->
<!--      }-->
<!--    });-->
<!--  });-->
<!--</script>-->
<!---->
<!---->
<!---->
<!--<div id="create-material" class="modal fade" role="dialog">-->
<!--  <div class="modal-dialog">-->
<!--    <div class="modal-content">-->
<!--      <div class="modal-header">-->
<!--        <button type="button" class="close" data-dismiss="modal">×</button>-->
<!--        <h4 class="modal-title">Материалы</h4>-->
<!--      </div>-->
<!---->
<!--      <div class="modal-body">-->
<!--        <form id="document-material-form" action="" method="post" role="form">-->
<!--<input type="hidden" name="_csrf" value="yZ8AZs3dkdlqnpdhYEgogLruzY_-z9oPx7zzicpYhHrLC3IyDnEx2uFQ6VRkryxSA8AcoLhHGQs2fe6_e-zgXQ==">-->
<!--        <div class="row">-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listmaterials-types_works_id required">-->
<!--<label class="control-label" for="listmaterials-types_works_id">Вид работ</label>-->
<!--<select id="listmaterials-types_works_id" class="form-control" name="ListMaterials[types_works_id]" aria-required="true">-->
<!--<option value="1">Фундаменты</option>-->
<!--<option value="2">Каркас</option>-->
<!--<option value="3">Кровля</option>-->
<!--<option value="4">Стены</option>-->
<!--<option value="5">Водоснабжение и канализация</option>-->
<!--<option value="6">Отопление и вентиляция</option>-->
<!--<option value="7">Внутренние сети электроснабжения</option>-->
<!--<option value="8">Окна и витражи</option>-->
<!--<option value="9">Двери</option>-->
<!--<option value="10">Фасад</option>-->
<!--<option value="11">Благоустройство территории</option>-->
<!--</select>-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listmaterials-name required">-->
<!--<label class="control-label" for="listmaterials-name">Наименование материалов и конструкций</label>-->
<!--<input type="text" id="listmaterials-name" class="form-control" name="ListMaterials[name]" aria-required="true">-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listmaterials-name_dicument required">-->
<!--<label class="control-label" for="listmaterials-name_dicument">Наименование документа о качестве</label>-->
<!--<input type="text" id="listmaterials-name_dicument" class="form-control" name="ListMaterials[name_dicument]" aria-required="true">-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listmaterials-number_document required">-->
<!--<label class="control-label" for="listmaterials-number_document">Номер документа о качестве</label>-->
<!--<input type="text" id="listmaterials-number_document" class="form-control" name="ListMaterials[number_document]" aria-required="true">-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listmaterials-date_issue required">-->
<!--<label class="control-label" for="listmaterials-date_issue">Дата выдачи документа</label>-->
<!--<div id="listmaterials-date_issue-kvdate" class="input-group date"><span class="input-group-addon kv-date-calendar" title="Выбрать дату"><i class="glyphicon glyphicon-calendar"></i></span><span class="input-group-addon kv-date-remove" title="Очистить поле"><i class="glyphicon glyphicon-remove"></i></span><input type="text" id="listmaterials-date_issue" class="krajee-datepicker form-control" name="ListMaterials[date_issue]" placeholder="Дата..." aria-required="true" data-datepicker-source="listmaterials-date_issue-kvdate" data-datepicker-type="2" data-krajee-kvdatepicker="kvDatepicker_1643d6f1"></div>-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listmaterials-counts">-->
<!--<label class="control-label" for="listmaterials-counts">Кол-во</label>-->
<!--<input type="text" id="listmaterials-counts" class="form-control" name="ListMaterials[counts]">-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listmaterials-supplier">-->
<!--<label class="control-label" for="listmaterials-supplier">Поставщик</label>-->
<!--<input type="text" id="listmaterials-supplier" class="form-control" name="ListMaterials[supplier]">-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12" style="padding-top: 25px;">-->
<!--              <button type="submit" class="btn btn-primary">Добавить</button>          </div>-->
<!--        </div>-->
<!---->
<!--        </form>      </div>-->
<!---->
<!--      <div class="modal-footer" style="margin-top: 10px;">-->
<!--        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
<!---->
<!---->
<!---->
<!--<div id="create-protocol" class="modal fade" role="dialog">-->
<!--  <div class="modal-dialog">-->
<!--    <div class="modal-content">-->
<!--      <div class="modal-header">-->
<!--        <button type="button" class="close" data-dismiss="modal">×</button>-->
<!--        <h4 class="modal-title">Протоколы</h4>-->
<!--      </div>-->
<!---->
<!--      <div class="modal-body">-->
<!--        <form id="document-protocol-form" action="" method="post" role="form">-->
<!--<input type="hidden" name="_csrf" value="yZ8AZs3dkdlqnpdhYEgogLruzY_-z9oPx7zzicpYhHrLC3IyDnEx2uFQ6VRkryxSA8AcoLhHGQs2fe6_e-zgXQ==">-->
<!--        <div class="row">-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listprotocols-type_work_id required">-->
<!--<label class="control-label" for="listprotocols-type_work_id">Вид работ</label>-->
<!--<select id="listprotocols-type_work_id" class="form-control" name="ListProtocols[type_work_id]" aria-required="true">-->
<!--<option value="1">Фундаменты</option>-->
<!--<option value="2">Каркас</option>-->
<!--<option value="3">Кровля</option>-->
<!--<option value="4">Стены</option>-->
<!--<option value="5">Водоснабжение и канализация</option>-->
<!--<option value="6">Отопление и вентиляция</option>-->
<!--<option value="7">Внутренние сети электроснабжения</option>-->
<!--<option value="8">Окна и витражи</option>-->
<!--<option value="9">Двери</option>-->
<!--<option value="10">Фасад</option>-->
<!--<option value="11">Благоустройство территории</option>-->
<!--</select>-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listprotocols-name required">-->
<!--<label class="control-label" for="listprotocols-name"> Наименование документа</label>-->
<!--<input type="text" id="listprotocols-name" class="form-control" name="ListProtocols[name]" aria-required="true">-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listprotocols-document_number required">-->
<!--<label class="control-label" for="listprotocols-document_number">Номер документа</label>-->
<!--<input type="text" id="listprotocols-document_number" class="form-control" name="ListProtocols[document_number]" aria-required="true">-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listprotocols-name_construction required">-->
<!--<label class="control-label" for="listprotocols-name_construction">Наименование конструкции</label>-->
<!--<input type="text" id="listprotocols-name_construction" class="form-control" name="ListProtocols[name_construction]" aria-required="true">-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listprotocols-test_res required">-->
<!--<label class="control-label" for="listprotocols-test_res">Результаты испытаний</label>-->
<!--<input type="text" id="listprotocols-test_res" class="form-control" name="ListProtocols[test_res]" aria-required="true">-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listprotocols-name_organization required">-->
<!--<label class="control-label" for="listprotocols-name_organization">Наименование организации выдавшей</label>-->
<!--<input type="text" id="listprotocols-name_organization" class="form-control" name="ListProtocols[name_organization]" aria-required="true">-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12" style="padding-top: 25px;">-->
<!--              <button type="submit" class="btn btn-primary">Добавить</button>          </div>-->
<!--        </div>-->
<!---->
<!--        </form>      </div>-->
<!---->
<!--      <div class="modal-footer" style="margin-top: 10px;">-->
<!--        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
<!---->
<!---->
<!---->
<!--<div id="create-project" class="modal fade" role="dialog">-->
<!--  <div class="modal-dialog">-->
<!--    <div class="modal-content">-->
<!--      <div class="modal-header">-->
<!--        <button type="button" class="close" data-dismiss="modal">×</button>-->
<!--        <h4 class="modal-title">Проекты</h4>-->
<!--      </div>-->
<!---->
<!--      <div class="modal-body">-->
<!--        <form id="document-project-form" action="" method="post" role="form">-->
<!--<input type="hidden" name="_csrf" value="yZ8AZs3dkdlqnpdhYEgogLruzY_-z9oPx7zzicpYhHrLC3IyDnEx2uFQ6VRkryxSA8AcoLhHGQs2fe6_e-zgXQ==">-->
<!--        <div class="row">-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listproject-project_code required">-->
<!--<label class="control-label" for="listproject-project_code">Шифр проекта</label>-->
<!--<input type="text" id="listproject-project_code" class="form-control" name="ListProject[project_code]" aria-required="true">-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listproject-name_design_organization required">-->
<!--<label class="control-label" for="listproject-name_design_organization">Наименование проектной организации</label>-->
<!--<input type="text" id="listproject-name_design_organization" class="form-control" name="ListProject[name_design_organization]" aria-required="true">-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listproject-project_section required">-->
<!--<label class="control-label" for="listproject-project_section">Раздел проекта</label>-->
<!--<input type="text" id="listproject-project_section" class="form-control" name="ListProject[project_section]" aria-required="true">-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listproject-status">-->
<!--<label class="control-label" for="listproject-status">Статус</label>-->
<!--<select id="listproject-status" class="form-control" name="ListProject[status]">-->
<!--<option value="0">Не выполнено</option>-->
<!--<option value="1">Выполнено</option>-->
<!--</select>-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12" style="padding-top: 25px;">-->
<!--              <button type="submit" class="btn btn-primary">Добавить</button>          </div>-->
<!--        </div>-->
<!---->
<!--        </form>      </div>-->
<!---->
<!--      <div class="modal-footer" style="margin-top: 10px;">-->
<!--        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
<!---->
<!---->
<!---->
<!--<div id="create-blueprint" class="modal fade" role="dialog">-->
<!--  <div class="modal-dialog">-->
<!--    <div class="modal-content">-->
<!--      <div class="modal-header">-->
<!--        <button type="button" class="close" data-dismiss="modal">×</button>-->
<!--        <h4 class="modal-title">Исполнительные схемы и чертежи</h4>-->
<!--      </div>-->
<!---->
<!--      <div class="modal-body">-->
<!--        <form id="document-blueprint-form" action="" method="post" role="form">-->
<!--<input type="hidden" name="_csrf" value="yZ8AZs3dkdlqnpdhYEgogLruzY_-z9oPx7zzicpYhHrLC3IyDnEx2uFQ6VRkryxSA8AcoLhHGQs2fe6_e-zgXQ==">-->
<!--        <div class="row">-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listexecutiveblueprints-type_work required">-->
<!--<label class="control-label" for="listexecutiveblueprints-type_work">Тип работ</label>-->
<!--<select id="listexecutiveblueprints-type_work" class="form-control" name="ListExecutiveBlueprints[type_work]" aria-required="true">-->
<!--<option value="1">Фундаменты</option>-->
<!--<option value="2">Каркас</option>-->
<!--<option value="3">Кровля</option>-->
<!--<option value="4">Стены</option>-->
<!--<option value="5">Водоснабжение и канализация</option>-->
<!--<option value="6">Отопление и вентиляция</option>-->
<!--<option value="7">Внутренние сети электроснабжения</option>-->
<!--<option value="8">Окна и витражи</option>-->
<!--<option value="9">Двери</option>-->
<!--<option value="10">Фасад</option>-->
<!--<option value="11">Благоустройство территории</option>-->
<!--</select>-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listexecutiveblueprints-name required">-->
<!--<label class="control-label" for="listexecutiveblueprints-name">Наименование изображений, помещенных на данном листе</label>-->
<!--<input type="text" id="listexecutiveblueprints-name" class="form-control" name="ListExecutiveBlueprints[name]" aria-required="true">-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listexecutiveblueprints-document_number required">-->
<!--<label class="control-label" for="listexecutiveblueprints-document_number">Номер документа</label>-->
<!--<input type="text" id="listexecutiveblueprints-document_number" class="form-control" name="ListExecutiveBlueprints[document_number]" aria-required="true">-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12" style="padding-top: 25px;">-->
<!--              <button type="submit" class="btn btn-primary">Добавить</button>          </div>-->
<!--        </div>-->
<!---->
<!--        </form>      </div>-->
<!---->
<!--      <div class="modal-footer" style="margin-top: 10px;">-->
<!--        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
<!---->
<!---->
<!---->
<!--<div id="create-representative" class="modal fade" role="dialog">-->
<!--  <div class="modal-dialog">-->
<!--    <div class="modal-content">-->
<!--      <div class="modal-header">-->
<!--        <button type="button" class="close" data-dismiss="modal">×</button>-->
<!--        <h4 class="modal-title">Представители</h4>-->
<!--      </div>-->
<!---->
<!--      <div class="modal-body">-->
<!--        <form id="document-representative-form" action="" method="post" role="form">-->
<!--<input type="hidden" name="_csrf" value="yZ8AZs3dkdlqnpdhYEgogLruzY_-z9oPx7zzicpYhHrLC3IyDnEx2uFQ6VRkryxSA8AcoLhHGQs2fe6_e-zgXQ==">-->
<!--        <div class="row">-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listrepresentatives-fio required">-->
<!--<label class="control-label" for="listrepresentatives-fio">Фамилия И.О.</label>-->
<!--<input type="text" id="listrepresentatives-fio" class="form-control" name="ListRepresentatives[fio]" aria-required="true">-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listrepresentatives-organization_id required">-->
<!--<label class="control-label" for="listrepresentatives-organization_id">Наименование организации</label>-->
<!--<select id="listrepresentatives-organization_id" class="form-control" name="ListRepresentatives[organization_id]" aria-required="true">-->
<!--<option value="1">ООО "КЖСК"</option>-->
<!--</select>-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listrepresentatives-post required">-->
<!--<label class="control-label" for="listrepresentatives-post">Должность</label>-->
<!--<input type="text" id="listrepresentatives-post" class="form-control" name="ListRepresentatives[post]" aria-required="true">-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listrepresentatives-document_representation required">-->
<!--<label class="control-label" for="listrepresentatives-document_representation">Номер в нацреестре, реквизиты документа о представительстве,   реквизиты организации (при необходимости)</label>-->
<!--<input type="text" id="listrepresentatives-document_representation" class="form-control" name="ListRepresentatives[document_representation]" aria-required="true">-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listrepresentatives-note">-->
<!--<label class="control-label" for="listrepresentatives-note">Примечание</label>-->
<!--<textarea id="listrepresentatives-note" class="form-control" name="ListRepresentatives[note]"></textarea>-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12" style="padding-top: 25px;">-->
<!--              <button type="submit" class="btn btn-primary">Добавить</button>          </div>-->
<!--        </div>-->
<!---->
<!--        </form>      </div>-->
<!---->
<!--      <div class="modal-footer" style="margin-top: 10px;">-->
<!--        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
<!---->
<!---->
<!---->
<!--<div id="create-work" class="modal fade" role="dialog">-->
<!--  <div class="modal-dialog">-->
<!--    <div class="modal-content">-->
<!--      <div class="modal-header">-->
<!--        <button type="button" class="close" data-dismiss="modal">×</button>-->
<!--        <h4 class="modal-title">Работы</h4>-->
<!--      </div>-->
<!---->
<!--      <div class="modal-body">-->
<!--        <form id="document-work-form" action="" method="post" role="form">-->
<!--<input type="hidden" name="_csrf" value="yZ8AZs3dkdlqnpdhYEgogLruzY_-z9oPx7zzicpYhHrLC3IyDnEx2uFQ6VRkryxSA8AcoLhHGQs2fe6_e-zgXQ==">-->
<!--        <div class="row">-->
<!--          <div class="col-lg-12">-->
<!--          <div class="form-group field-listworks-date_executed_works required">-->
<!--<label class="control-label" for="listworks-date_executed_works">Дата начала работ</label>-->
<!--<div id="listworks-date_executed_works-kvdate" class="input-group date"><span class="input-group-addon kv-date-calendar" title="Выбрать дату"><i class="glyphicon glyphicon-calendar"></i></span><span class="input-group-addon kv-date-remove" title="Очистить поле"><i class="glyphicon glyphicon-remove"></i></span><input type="text" id="listworks-date_executed_works" class="krajee-datepicker form-control" name="ListWorks[date_executed_works]" placeholder="Дата..." aria-required="true" data-datepicker-source="listworks-date_executed_works-kvdate" data-datepicker-type="2" data-krajee-kvdatepicker="kvDatepicker_7886179e"></div>-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>                        </div>-->
<!--          <div class="col-lg-12">-->
<!--          <div class="form-group field-listworks-date_executed_works_2 required">-->
<!--<label class="control-label" for="listworks-date_executed_works_2">Дата окончания работ</label>-->
<!--<div id="listworks-date_executed_works_2-kvdate" class="input-group date"><span class="input-group-addon kv-date-calendar" title="Выбрать дату"><i class="glyphicon glyphicon-calendar"></i></span><span class="input-group-addon kv-date-remove" title="Очистить поле"><i class="glyphicon glyphicon-remove"></i></span><input type="text" id="listworks-date_executed_works_2" class="krajee-datepicker form-control" name="ListWorks[date_executed_works_2]" placeholder="Дата..." aria-required="true" data-datepicker-source="listworks-date_executed_works_2-kvdate" data-datepicker-type="2" data-krajee-kvdatepicker="kvDatepicker_7886179e"></div>-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listworks-representatives_id required">-->
<!--<label class="control-label" for="listworks-representatives_id">Должность, фамилия, инициалы, уполномоченного представителя лица, осуществляющего строительство</label>-->
<!--<select id="listworks-representatives_id" class="form-control" name="ListWorks[representatives_id]" aria-required="true">-->
<!--<option value="1">прораб ЖУК ООО "КЖСК"</option>-->
<!--</select>-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listworks-name_executed_works required">-->
<!--<label class="control-label" for="listworks-name_executed_works">Наименование выполненных работ</label>-->
<!--<textarea id="listworks-name_executed_works" class="form-control" name="ListWorks[name_executed_works]" aria-required="true"></textarea>-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12" style="padding-top: 25px;">-->
<!--              <button type="submit" class="btn btn-primary">Добавить</button>          </div>-->
<!--        </div>-->
<!---->
<!--        </form>      </div>-->
<!---->
<!--      <div class="modal-footer" style="margin-top: 10px;">-->
<!--        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
<!---->
<!---->
<!---->
<!--<div id="create-regdoc" class="modal fade" role="dialog">-->
<!--  <div class="modal-dialog">-->
<!--    <div class="modal-content">-->
<!--      <div class="modal-header">-->
<!--        <button type="button" class="close" data-dismiss="modal">×</button>-->
<!--        <h4 class="modal-title">Нормативные документы</h4>-->
<!--      </div>-->
<!---->
<!--      <div class="modal-body">-->
<!--        <form id="document-regdoc-form" action="" method="post" role="form">-->
<!--<input type="hidden" name="_csrf" value="yZ8AZs3dkdlqnpdhYEgogLruzY_-z9oPx7zzicpYhHrLC3IyDnEx2uFQ6VRkryxSA8AcoLhHGQs2fe6_e-zgXQ==">-->
<!--        <div class="row">-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listregulatorydocuments-name required">-->
<!--<label class="control-label" for="listregulatorydocuments-name">Название документа</label>-->
<!--<input type="text" id="listregulatorydocuments-name" class="form-control" name="ListRegulatoryDocuments[name]" aria-required="true">-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listregulatorydocuments-snip required">-->
<!--<label class="control-label" for="listregulatorydocuments-snip">Номер документа</label>-->
<!--<input type="text" id="listregulatorydocuments-snip" class="form-control" name="ListRegulatoryDocuments[snip]" aria-required="true">-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12">-->
<!--              <div class="form-group field-listregulatorydocuments-link_snip">-->
<!--<label class="control-label" for="listregulatorydocuments-link_snip">Ссылка на файл или страницу СНИП</label>-->
<!--<input type="text" id="listregulatorydocuments-link_snip" class="form-control" name="ListRegulatoryDocuments[link_snip]">-->
<!---->
<!--<p class="help-block help-block-error"></p>-->
<!--</div>          </div>-->
<!--          <div class="col-lg-12" style="padding-top: 25px;">-->
<!--              <button type="submit" class="btn btn-primary">Добавить</button>          </div>-->
<!--        </div>-->
<!---->
<!--        </form>      </div>-->
<!---->
<!--      <div class="modal-footer" style="margin-top: 10px;">-->
<!--        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
<!---->
<!---->
<!---->
<!--<div id="create-anotherdoc" class="modal fade" role="dialog">-->
<!--  <div class="modal-dialog">-->
<!--    <div class="modal-content">-->
<!--      <div class="modal-header">-->
<!--        <button type="button" class="close" data-dismiss="modal">×</button>-->
<!--        <h4 class="modal-title">Другие документы</h4>-->
<!--      </div>-->
<!---->
<!--      <div class="modal-body">-->
<!--        <form id="document-anotherdoc-form" action="" method="post" role="form">-->
<!--<input type="hidden" name="_csrf" value="yZ8AZs3dkdlqnpdhYEgogLruzY_-z9oPx7zzicpYhHrLC3IyDnEx2uFQ6VRkryxSA8AcoLhHGQs2fe6_e-zgXQ==">-->
<!--        <div class="row">-->
<!--          <input type="hidden" name="f0" value="7">-->
<!---->
<!--          <div class="col-lg-12" style="margin-top: 20px;">-->
<!--            <label>Номер акта:</label>-->
<!--            <input type="number" class="form-control" value="3" name="f1" required="">-->
<!--          </div>-->
<!---->
<!--          <div class="col-lg-12" style="margin-top: 20px;">-->
<!--            <label>Наименование:</label>-->
<!--            <input type="text" class="form-control" name="f2" required="">-->
<!--          </div>-->
<!---->
<!--          <div class="col-lg-12" style="margin-top: 20px;">-->
<!--            <label>Наименование подрядной организации:</label>-->
<!--            <select class="form-control" name="f3">-->
<!--                              <option value="1">ООО "КЖСК"</option>-->
<!--                          </select>-->
<!--          </div>-->
<!--          <div class="col-lg-12" style="padding-top: 25px;">-->
<!--              <button type="submit" class="btn btn-primary">Добавить</button>          </div>-->
<!--        </div>-->
<!---->
<!--        </form>      </div>-->
<!---->
<!--      <div class="modal-footer" style="margin-top: 10px;">-->
<!--        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
