<div class="row">
    <div class="col-md-12">
        <?php echo form_open_multipart($cname . '/action_pdf_upload', ['id' => 'form-pdf', 'class' => '']) ?>
        <input type="hidden" name="id" value="<?php echo $coop->id ?>">

        <?php if ($coop->pdf_file != "") : ?>
            <object data="<?php echo base_url("/data_storage/pdf/" . $coop->pdf_file) ?>" type="application/pdf" width="100%" height="800px">
                <p>Alternative text - include a link <a href="<?php echo base_url("/data_storage/pdf/" . $coop->pdf_file) ?>">to the PDF!</a></p>
            </object>
        <?php else : ?>
            <div class="alert alert-warning">PDF Not Found</div>
        <?php endif ?>


        <div class="form-group">
            <label for="input-pdf_file" class="col-md-12 control-label">PDF</label>
            <div class="col-sm-12">
                <input type="file" name="pdf_file" class="form-control" id="input-pdf_file" value="<?php echo $coop->pdf_file ?>" placeholder="input pdf_file">
            </div>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>