<div id="gallery-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <?php if ($image == FALSE) { ?>
                    <br>
                    <h4 class="text-center">Data Image kosong. Klik 'Upload' untuk menambahkan halaman</h4>
                <?php } else { ?>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class = "col-xs-12 col-sm-12">
                                <div style="max-height: 500px; overflow-y: auto">
                                    <table class="table table-hover table-responsive" id="dtable" style="max-height: 100px; overflow: auto">
                                        <thead>
                                            <tr>
                                                <th class="">No</th>
                                                <th class="text-center">Image</th>
                                                <th class="text-center">Diupload oleh</th>
                                                <th class="text-center no-sort">Image Source</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($image as $i) {
                                                ?>

                                                <tr>
                                                    <td class=""><?php echo $no ?></td>
                                                    <td class=""><img style="width: 40%" class="img-thumbnail img-responsive" src="<?php echo base_url() . $i['dir'] . 'thumbnail/' . $i['name'] ?>"></td>
                                                    <td class="text-center"><?php echo $i['first_name'] . " " . $i['last_name'] ?></td>
                                                    <td class="text-center">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" readonly="" id="source-img<?php echo $no?>" value="<?php echo base_url() . $i['dir'] . $i['name'] ?>">
                                                                <a onclick="copyText(this)" data-id="<?php echo $no?>" tabindex="0" class="input-group-addon btn btn-primary" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Copied"><i class="fa fa-fw fa-copy"></i></a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                $no+=1;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>
                <div class="text-center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>           
                </div>
            </div>
        </div>
    </div>
</div>